<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\userRequest;
use App\Http\Requests\loginRequest;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; //Bu userde ki,parolu koda qoyur,shifrelemeni edir,
use Illuminate\Support\Facades\Auth; //Bu istifadecinin login parolunu daxil etmezden evvel yoxluyur

class userController extends Controller
{
    public function logindaxilet(loginRequest $post)
    {
      if(!Auth::attempt(['email'=>$post->email, 'password'=>$post->password]))
        {
         return redirect()->back()->with('mesaj','Daxil etdiyiniz login və ya parol yanlışdır!');
        }
    
      return redirect()->route('seyfe1');
    } 


    public function logout(){
        auth()->logout();
        return redirect()->route('login');//Bu anbardan cixmaq ucundur,seni logine atacaq.
    }


    public function daxilet(userRequest $post)
     {
        $con = new User();
        $yoxla = $con->where('email','=', $post->email)->count();

        if($yoxla==0)
        {

            $con->ad = $post->ad;
            $con->soyad = $post->soyad;
            $con->email = $post->email;
            $con->password = Hash::make($post->password);

            $con->save();

           return redirect()->route('qeydiyyat')->with('mesaj','Qeydiyyat uğurla bazaya əlavə edildi!');
        }
        return redirect()->route('qeydiyyat')->with('mesaj','Bu gmail artıq əlavə olunub!');     
     } 
}
