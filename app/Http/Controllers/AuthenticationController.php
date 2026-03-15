<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\Person;
use App\Models\Role;
use App\Models\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Output\ConsoleOutput;

class AuthenticationController extends Controller
{
    public function getRegistration(Request $request){
        return View('authentication.registration');
    }

    public function postRegistration(RegistrationRequest $request){
        $person = Person::create([
           'surname' => $request->surname,
           'name' => $request->name,
           'patronymic' => $request->patronymic,
           'passport' => $request->passport,
        ]);

        $user = UserAccount::create([
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'person_id' => $person->id,
            'role_id' => Role::where('name', 'guest')->first()->id,
        ]);

        return redirect()->route('login');
    }

    public function getLogin(Request $request){
        return View('authentication.login');
    }

    public function postLogin(LoginRequest $request){
        $credentials = $request->only('login', 'password');

        if(auth()->attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->route('main');
        }
        else{
            return back()->withErrors([$request]);
        }
    }

    public function logout(Request $request){
        auth()->logout();
        return redirect()->route('main');
    }
}
