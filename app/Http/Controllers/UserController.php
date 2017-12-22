<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        if(request()->has('empty')){
            $users = [];
        } else {
            $users = [
                'Joel', 'Ellie', 'Tess', 'Tommy', 
            ];
        }
        

        $title = 'lista de usuarios';

        //dd(compact('title', 'users'));
    	return view('users.index', compact('title', 'users'));
    }
   /* public function show($id)
    {
    	return "mostrando detalle del usuario: {$id}";
    }*/
    //con vista el mismo show
    public function show($id)
    {
        return view('users.show', compact('id'));
    }
    public function create()
    {
    	return 'Crear nuevo usuario';
    }
}
