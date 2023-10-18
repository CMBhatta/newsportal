<?php

namespace App\Http\Controllers;

use App\Models\Newsdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class FrontendController extends Controller
{
    public function index(){
        $details= Newsdetail::all();
        return view('frontend.index',compact('details'));
    }
     public function categori(){
        return view('frontend.categori');
     }

     public function about(){
        return view('frontend.about');
     }
     public function latest_news(){
        return view('frontend.latest_news');
     }
     public function contact(){
        return view('frontend.contact');
     }
     public function details(){
        $details= Newsdetail::all();
        return view('frontend.details', compact('details'));
     }

     public function showLogin(){
      return view('frontend.login');
   }

   public function login(Request $request)
   { 

       $credentials = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required'],
       ]);
      
       if (Auth::attempt($credentials)) {
           $request->session()->regenerate();

           return redirect('/dashboard');
       }else{
           dd('password not match');
       }

       return back()->withErrors([
           'email' => 'The provided credentials do not match our records.',
       ])->onlyInput('email');
   }
//dashbaord backend index.blade.php file
public function dashboard(){
    return view('backend.index');
 }
 public function logout(Request $request): RedirectResponse
 {
     Auth::logout();
 
     $request->session()->invalidate();
 
     $request->session()->regenerateToken();
 
     return redirect('/');
}

     
}
