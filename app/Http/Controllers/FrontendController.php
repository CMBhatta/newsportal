<?php

namespace App\Http\Controllers;

use App\Models\Newsdetail;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class FrontendController extends Controller
{
    public function index(){
        $details= Newsdetail::all();
        $categories= Category::where('status',1)->get();
        $videos= Video::all();
        // dd($videos);
        return view('frontend.index',compact('details', 'categories','videos'));
    }
     public function categori(){
        $details= Newsdetail::all();
        $categories= Category::where('status',1)->get();
        return view('frontend.categori',compact('categories','details'));
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
     public function details($id){
        $details= Newsdetail::all();
        $categories= Category::all();
        $news= Newsdetail::findOrFail($id);
        return view('frontend.details', compact('details','categories','news'));
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
