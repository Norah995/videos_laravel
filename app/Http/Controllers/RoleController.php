<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    //lista
    public function lista()
    {
    	$role=Role::all();
    	return view('lista', compact('role'));
    }
}
