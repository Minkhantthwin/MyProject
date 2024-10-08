<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
      return view('auth.register');
    }
//Register-Start
    public function store()
    {
      $formData=request()->validate([
        'name'=>'required|max:255|min:3',
        'email'=>['required','email', Rule::unique('users', 'email')],
        'username'=>['required','max:255','min:3',Rule::unique('users', 'username')],
        'password'=>['required','min:8']
      ]);

     $user=User::create($formData);

     auth()->login($user);

     return redirect('/index')->with('success', 'Welcome Dear, '.$user->name);
    }
//Register-End

//Logout
    public function logout(){
      auth()->logout();
      return redirect('/index')->with('success', 'Goodbye');
    }
//Logout-End

    public function login(){

       return view("auth.login");
    }
    public function post_login(){

        $formData=request()->validate([
        'email'=>['required','email', 'max:255', Rule::exists('users', 'email')],
        'password'=>['required','min:8','max:255']
      ], [
        'email.required'=>'we need your email address',
        'password.min'=>'Password should be more than 8 characters'
      ]);
      
      if(auth()->attempt($formData)){
        if (auth()->user()->is_admin) 
        {
          return redirect('/admin/index');
        }
         else 
        {
          return redirect('/index');
        }
        
      }
      else{
        return redirect()->back()->withErrors([
            'email'=>'User Credentials are wrong'
        ]);
      }
   }

}
