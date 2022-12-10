<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DishTypesModel;
use App\DishModel;
use App\ExpensesModel;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class DishController extends Controller
{
    public $dishes;
    public $dishTypes;

    public function __construct()
	{
		parent::__construct();
		$this->middleware(function ($request, $next) {
			$this->dishes = DishModel::query();
			$this->dishTypes = DishTypesModel::query();
			return $next($request);
		});
	}

    // mobile types
    public function TypeListAjax(){
        $types = DishTypesModel::all();

        return view('mobile.dish.typesAjax', [
            'types' => $types
        ]);
    }
    public function TypeListGet(){
        return view('mobile.dish.types');
    }

    // comp types
    public function TypesCompGet() {
        return view('computer.dishes.types');
    }
    public function TypesCompAjax(Request $request) {
        if ($request->data){
            $this->filterTypes($request->data);
        }

        return view('computer.dishes.typesAjax', [
            'types' => $this->dishTypes->get()
        ]);
    }
    public function filterTypes($json_filter) {
        $filters = array_filter(json_decode($json_filter, true),
            function ($value) { return !is_null($value[1]) && $value[1] !== ''; });

        foreach ($filters as $filter) {
            $iName = $filter[0];
            $iVal = $filter[1];

            switch ($iName) {
                case "name":
                    $this->dishTypes->whereRaw(
                            "TRIM(name) like '%{$iVal}%'"
                        );
                    break;
                case "status":
                    if ($iVal == "archived") {
                        $this->dishTypes->whereNotNull('archived_at');
                    }
                    else if ($iVal == "not_archived") {
                        $this->dishTypes->whereNull('archived_at');
                    }
                    break;
            }
        }
    }
    public function TypeCompArchiving(Request $request) {
        $type = DishTypesModel::find($request->type);

        if ($type->archived_at == null)
            $type->archived_at = Carbon::now();
        else
            $type->archived_at = null;

        $type->save();
    }
    public function TypesCompEditGet(Request $request) {
        if ($request->type) {
            return view('computer.dishes.typeEdit', [
                'type' => DishTypesModel::find($request->type),
            ]);
        }
        else {
            return view('computer.dishes.typeEdit');
        }
    }
    public function TypesCompEditPost(Request $request){
        $dataValidation = [
            'name' => 'required',
            'image' => 'required',
        ];
        Validator::make($request->all(), $dataValidation)->validate();

        if ($request->type) {
            $type = DishTypesModel::find($request->type);
        }
        else{
            $type = new DishTypesModel;
        }
        $type->name = $request->name;
        $type->img = $request->image;
        $type->save();

        return redirect()->route('typesComp');
    }

    // comp dishes
    public function DishesCompGet(Request $request) {
        $filterSend = '';
        $type = null;

        if (isset($request->type)) {
            $type = DishTypesModel::find($request->type);
            $filterSend = json_encode([['type', $request->type]]);
        }

        return view('computer.dishes.dishes', [
            'types' => $this->dishTypes->get(),
            'filterSend' => $filterSend,
            'selectedType' => $type
        ]);
    }
    public function DishesCompAjax(Request $request) {
        if ($request->data){
            $this->filterDishes($request->data);
        }

        return view('computer.dishes.dishesAjax', [
            'dishes' => $this->dishes->get()
        ]);
    }
    public function filterDishes($json_filter) {
        $filters = array_filter(json_decode($json_filter, true),
            function ($value) { return !is_null($value[1]) && $value[1] !== ''; });

        foreach ($filters as $filter) {
            $iName = $filter[0]; $iVal = $filter[1];

            switch ($iName) {
                case "type":
                    $this->dishes->where('idexpensesType', $iVal);
                    break;
                case "name":
                    $this->dishes->whereRaw(
                            "TRIM(name) like '%{$iVal}%'"
                        );
                    break;
            }
        }
    }
    public function DishesCompEditGet(Request $request) {
        if ($request->type) {
            return view('computer.dishes.dishEdit', [
                'types' => DishTypesModel::get(),
            ]);
        }
        else {
            return view('computer.dishes.dishEdit', [
                'types' => DishTypesModel::get(),
            ]);
        }
    }
    public function DishesCompEditPost(Request $request) {
        $dataValidation = [
            'name' => 'required',
            // 'image' => 'required',
            'type' => 'required'
        ];
        Validator::make($request->all(), $dataValidation)->validate();

        // if ($request->type) {
        //     $type = DishTypesModel::find($request->type);
        // }
        // else{
            $dish = new DishModel;
        // }
        $dish->name = $request->name;
        $dish->desc = $request->desc;
        $dish->img = $request->image;
        $dish->idexpensesType = $request->type;
        // dd($request->all());

        $price = array();
        for ($i = 0; $i < count($request->price); $i++){
            $buf =
                array('price' => $request->price[$i], 'mass' => $request->mass[$i]);

            array_push($price, $buf);
        }

        $dish->price = json_encode($price);

        $dish->save();

        return redirect()->route('dishesComp');
    }

    // dish types mobile
    public function DishesListGet($id) {
        $typeModel = DishTypesModel::find($id);
        $dishesList = $typeModel->dishes;

        return view('mobile.dish.dishes', [
            'typeModel' => $typeModel
        ]);
    }
    public function DishesListAjax($id) {

        $typeModel = DishTypesModel::find($id);
        $dishesList = $typeModel->dishes;

        return view('mobile.dish.dishesAjax', [
            'dishesList' => $dishesList
        ]);
    }

    // basket mobile
    public function BasketGet() {
        return view('mobile.basket.basket');
    }
    public function BasketAjax(Request $request) {

        if ($request->get('data') == "null" || $request->get('data') == "[]") {
            return view('mobile.basket.basketAjax');
        }

        $mem = json_decode($request->get('data'));

        $data = array();
        foreach ($mem as $item) {
            $newItem = array();
            array_push($newItem, DishModel::find($item[0]));
            array_push($newItem, $item[1]);
            array_push($newItem, $item[2]);
            array_push($newItem, $item[3]);

            array_push($data, $newItem);
        }

        return view('mobile.basket.basketAjax', [
            'data' => $data
        ]);
    }

    //Analytics
    public function AnalyticsComputerGet() {
        return view('computer.analytics.analytics');
    }
    public function AnalyticsAjax(Request $request) {

        if ($request->get('data') == "null" || $request->get('data') == "[]") {
            return view('computer.analytics.analyticsAjax');
        }

        $mem = json_decode($request->get('data'));

        $data = array();
        foreach ($mem as $item) {
            $newItem = array();
            array_push($newItem, DishModel::find($item[0]));
            array_push($newItem, $item[1]);
            array_push($newItem, $item[2]);
            array_push($newItem, $item[3]);

            array_push($data, $newItem);
        }

        return view('computer.analytics.analyticsAjax', [
            'data' => $data
        ]);
    }
    //expenses
    //взятие данных с бд меню
public function expenses(){
    $expenses = new ExpensesModel();
     return view('computer.analytics.expenses', ['expenses'=>ExpensesModel::all()]);
    }

    public function createexpenses() {
        return view('computer.analytics.createexpenses');
    }

    public function processcreateexpenses(Request $expen){
        $expenses = new ExpensesModel();
        $expenses->name = $expen->input('name');
       // $expenses = base64_encode(file_get_contents($request->file('img')));
       // $expenses->img = $expensess->input('img');
        //$expenses->idexpensesType = $expen->input('idexpensesType');
        $expenses->price = $expen->input('price');
       // $expenses->desc = $expen->input('desc');
    
        $expenses->save();
    
        return redirect()->route('expenses');
    }
    
     //удаление данных определенного id
     public function delexpenses($id){
        ExpensesModel::find($id)->delete();
        return redirect()->route('expenses')->with('success','Данные удалены');
    }
    //открытие данных определенного id для редактирования
    public function updateexpenses($id){
        $expenses = new ExpensesModel();
        return view('computer.analytics.updateexpenses', ['expenses'=>$expenses->find($id)]);
    }
    public function processupdateexpenses($id, Request $expen){
        $expenses = ExpensesModel::find($id);
        $expenses->name = $expen->input('name');
        //$expenses->img = $expen->input('img');
        //$expenses->idexpensesType = $expen->input('idexpensesType');
        $expenses->price = $expen->input('price');
        //$expenses->desc = $expen->input('desc');
    
        $expenses->save();
    
        return redirect()->route('expenses');
    }

}
