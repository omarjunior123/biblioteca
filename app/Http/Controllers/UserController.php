<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function ViewCadastro()
    {
        return view('cadastro');
    }

    public function Store(Request $request){
        //dd($request->password);
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Campo (E-mail) é obrigatório.',
            'password.required' => 'Campo (Senha) é obrigatório.',
        ]);

        $user = new User();
        $user->name = $request->email;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            return redirect()->route(route:'view.index');
        else
            return redirect()->route(route:'view.index');
    }

    public function ViewLogin()
    {
        return view('login');
    }

    public function Auth(Request $request)
    {
        $this->validate($request,[
            'email' => 'required', 
            'password' => 'required' 
        ],[
            'email.required' => 'E-mail obrigatório.',
            'password.required' => 'Senha obrigatório.'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            return redirect()->route(route:'view.index');
        else
            return redirect()->back()->withInput()->with('danger','E-mail ou senha inválidos');
    }


    public function Logout()
    {
        auth::logout();
        return redirect()->route(route:'view.index');
    }
}
