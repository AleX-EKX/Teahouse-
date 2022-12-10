<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AccountsController extends Controller
{
    public $accounts;

    public function __construct()
	{
		parent::__construct();
		$this->middleware(function ($request, $next) {
			$this->accounts = User::query();
			return $next($request);
		});
	}

    public function ListCompGet() {
        return view('computer.accounts.accounts', [
            'roles'     => User::RU_SELECT_ROLES
        ]);
    }

    public function ListCompAjax(Request $request) {
        if ($request->data){
            $this->filter($request->data);
        }

        return view('computer.accounts.accountsAjax', [
            'accounts'  => $this->accounts->get(),
            'roles'     => User::RU_SELECT_ROLES
        ]);
    }

    public function filter($json_filter) {
        $filters = array_filter(json_decode($json_filter, true),
            function ($value) { return !is_null($value[1]) && $value[1] !== ''; });

        foreach ($filters as $filter) {
            $iName = $filter[0];
            $iVal = $filter[1];

            switch ($iName) {
                case "role":
                        $this->accounts->where('type', $iVal);
                    break;
                case "fullName":
                        $this->accounts->whereRaw(
                            "TRIM(CONCAT(surname, ' ', name, ' ', patr)) like '%{$iVal}%'"
                        );
                    break;
            }
        }
    }

    public function ChangeAccountRoleAjax(Request $request) {
        try {
            if ($request->role == 'dev') {
                return response()->json(['message' => 'Нельзя сделать сотрудника разработчиком!'], 500);
            }
            else {
                $user = User::find($request->id);
                $user->type = $request->role;
                $user->save();

                return response('ok');
            }
        } catch(Exception $e) {
            return response($e->getMessage());
        }
    }


    public function ExpensesAjax(Request $request) {
        if ($request->data){
            $this->filter($request->data);
        }

        return view('computer.analytics.expensesAjax');
    }
}
