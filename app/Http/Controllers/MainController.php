<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        //load users notes
        $id = session('user.id');
        $notes = user::find($id)->notes()->get()->toArray();


        //show home view
        return view('home', ['notes' => $notes]);
    }

    public function newNote(){

    }
}
