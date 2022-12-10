<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Authorize;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\MsgsModel;

class SettingsController extends Controller
{
    // Computer

    // Mobile
    public function SettingsMobileGet() {
        return view('mobile.settings.settings');
    }

    // Web
}
