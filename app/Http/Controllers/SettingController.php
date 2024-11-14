<?php

namespace App\Http\Controllers;

use App\Models\CardMember;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function index() {
        $listCardMember = CardMember::all();
        return view('pages.setting', ['listCardMember' => $listCardMember]);
    }
}
