<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    //lista
    public function lista()
    {
    	$role=Role::find(1);
    	$pri=Role::first();
    	$todo=Role::all();
    	$ult=Role::OrderBy('id','desc')->first();
    	//dd($role);
    	return view('Tags', compact(['role' , 'todo', 'pri', 'ult'] ));
    }
    public function listatodo()
    {

    	$todo=Role::all();
    	//dd($role);
    	return view('Tags', compact('todo'));
    }
}
