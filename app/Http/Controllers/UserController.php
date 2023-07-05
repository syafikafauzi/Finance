<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index ()
    {
        $users = User::orderBy ('name','ASC')->paginate(10);

        return view('users.index', compact('users'));
    }
}
