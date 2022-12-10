<?php

// Мобильная часть (mobile)
Route::prefix('mobilePartApp')->group(function () {
    // Для автороизованных
    Route::middleware('auth')->namespace('\App\Http\Controllers')->group(function() {
        // Для всех
        Route::get('/main', 'LoginController@MainMobileGet')->name('mainMobile');
        Route::get('/logout', 'LoginController@LogoutMobileGet')->name('logoutMobile');
        Route::get('/settings', 'SettingsController@SettingsMobileGet')->name('settingsMobile');

        Route::get('/tickets', 'TicketsController@TicketsMobileGet')->name('ticketsMobile');
        Route::get('/ticketsajax', 'TicketsController@TicketsAjax')->name('ticketsAjaxMobile');
        Route::post('/createTicket', 'TicketsController@TicketsMobileCreate')->name('ticketsCreateMobile');
        Route::get('/cancelTicket/{id}', 'TicketsController@TicketsMobileCancel')->name('ticketsCancelMobile');
        Route::get('/completeTicket/{id}', 'TicketsController@TicketsMobileComplete')->name('ticketsCompleteMobile');

        // Для поваров
        Route::get('/dishesTypes', 'DishController@TypeListGet')->name('typesMobile');
        Route::get('/dishesTypes_ajax', 'DishController@TypeListAjax')->name('typesCardMobile');
        Route::get('/dishesTypes/dishes/{id}', 'DishController@DishesListGet')->name('dishesMobile');
        Route::get('/dishesTypes/dishes_ajax/{id}', 'DishController@DishesListAjax')->name('dishesCardMobile');
        Route::get('/basket', 'DishController@BasketGet')->name('basketMobile');
        Route::get('/basket_ajax', 'DishController@BasketAjax')->name('basketAjaxMobile');
    });

    // Для не автороизованных
    Route::middleware('guest')->namespace('\App\Http\Controllers')->group(function() {
        Route::get('/login', 'LoginController@LoginMobileGet')->name('loginMobile');;
        Route::post('/login', 'LoginController@LoginMobilePost')->name('loginMobile');

        Route::get('/register', 'LoginController@RegisterMobileGet')->name('registerMobile');
        Route::post('/register', 'LoginController@RegisterMobilePost')->name('registerMobile');
    });
});

// Компьютерная часть (computer) только для админа
Route::prefix('computerPartApp')->group(function () {
    // Для не автороизованных
    Route::middleware('guest')->namespace('\App\Http\Controllers')->group(function() {
        Route::get('/login', 'LoginController@LoginComputerGet')->name('loginComp');
        Route::post('/login', 'LoginController@LoginComputerPost')->name('loginComp');
    });

    // Для автороизованных
    Route::middleware('auth')->namespace('\App\Http\Controllers')->group(function() {
        Route::get('/logout', 'LoginController@LogoutComputerGet')->name('logoutComp');
        Route::get('/main', 'LoginController@MainCompGet')->name('mainComp');

        Route::get('/accounts', 'AccountsController@ListCompGet')->name('accountsComp');
        Route::get('/accountsAjax', 'AccountsController@ListCompAjax')->name('accountsCompAjax');
        Route::post('/accounts/changeAccountRoleAjax', 'AccountsController@ChangeAccountRoleAjax')->name('changeAccountRoleAjax');

        Route::get('/types', 'DishController@TypesCompGet')->name('typesComp');
        Route::get('/typesAjax', 'DishController@TypesCompAjax')->name('typesCompAjax');
        Route::get('/types/add', 'DishController@TypesCompEditGet')->name('typesCompEdit');
        Route::post('/types/create', 'DishController@TypesCompEditPost')->name('typesCompEditPost');
        Route::get('/types/archiving', 'DishController@TypeCompArchiving')->name('typeCompArchiving');

        Route::get('/dishes', 'DishController@DishesCompGet')->name('dishesComp');
        Route::get('/dishesAjax', 'DishController@DishesCompAjax')->name('dishesCompAjax');
        Route::get('/dishes/add', 'DishController@DishesCompEditGet')->name('dishesCompEdit');
        Route::post('/dishes/create', 'DishController@DishesCompEditPost')->name('dishesCompEditPost');

        Route::get('/analytics', 'DishController@AnalyticsComputerGet')->name('Analytics');
        Route::get('/analytics_ajax', 'DishController@AnalyticsAjax')->name('AnalyticsAjaxComputer');
        Route::get('/expenses', 'DishController@expenses')->name('expenses');
        Route::get('/expensesAjax', 'AccountsController@ExpensesAjax')->name('expensesAjax');
        //создание расхода
        Route::get('/createexpenses', 'DishController@createexpenses')->name('createexpenses');
        Route::post('/processcreateexpenses', 'DishController@processcreateexpenses')->name('processcreateexpenses');
        //редактирования расхода
        Route::get('/expenses/{id}/update', 'DishController@updateexpenses')->name('updateexpenses');
        Route::post('/expenses/{id}/update', 'DishController@processupdateexpenses')->name('processupdateexpenses');
         //удаление расхода
        Route::get('/expenses/{id}/delexpenses', 'DishController@delexpenses')->name('delexpenses');

    });
});

// Сайт (web)
Route::get('/', 'LoginController@WebGet');
