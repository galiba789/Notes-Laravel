<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index(){
        return view('index');
    }

    public function loginSubmit(Request $resquest){
        $resquest->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required', 'min:6', 'max:16'],
            ],

            [
                'email.required' => 'O email e obrigatorio',
                'email.email' => 'Deve ser um email. Ex: example@example.com',
                'password.required' => 'A senha e obrigatoria',
                'password.min' => 'A senha deve ter no minimo :min caracteres',
                'password.max' => 'A senha deve ter no maximo :max caracteres'
            ],
            );

            try{
                DB::connection()->getPdo();
                echo 'Connectio is Ok!';
            } catch(\PDOException $e){
                echo 'Connectio Falied: '. $e->getMessage();
            };

            echo "fim";
}
}