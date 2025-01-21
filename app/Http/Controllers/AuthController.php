<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\user as ModelsUser;
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

            $email = $resquest->input('email');
            $password = $resquest->input('password');
            // Check if users exits
            $user = User::where('username', $email)
                        ->where('deleted_at', NULL)
                        ->first();
            if (!$user){
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'Email ou password incorretos');
                }

            //check if password is correct
            if(!password_verify($password, $user->password)){
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'Email ou password incorretos');
            }

            // update last_login
            $user->last_login = date('Y-m-d H:i:s');
            $user->save();

            //login user
            session([
                'user' => [
                    'id' => $user->id,
                    'username' => $user->email
                ]
            ]);

            echo 'login com sucesso';
}

public function logout(){
    // logout from application
    session()->forget('user');
    return redirect()->to('/');

}
}
