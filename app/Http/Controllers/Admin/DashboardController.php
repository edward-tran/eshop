<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showUsers(){
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function showUserDetail($id){
        $user = User::find($id);
        return view('admin.user.user_detail', compact('user'));
    }
}
