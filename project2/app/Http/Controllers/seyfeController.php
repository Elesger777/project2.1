<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\seyfeRequest;
use App\Models\seyfe;
use Illuminate\Support\Facades\Auth;


class seyfeController extends Controller
{
    public function gonder(seyfeRequest $post)
    {
        $say = seyfe::where('email','=', $post->email)->where('user_id','=',Auth::id())->count();

        if($say==0)        
         {
            $con = new seyfe();

            $con->user_id = Auth::id();
            $con->ad = $post->ad;
            $con->soyad = $post->soyad;
            $con->email = $post->email;

            $con->save();

            return redirect()->route('seyfe1')->with('mesaj','Melumat ugurla bazaya elave olundu');
         }
         else
         return redirect()->route('seyfe1')->with('mesaj','Bu gmail artiq  qeydiyyatdan kecib');
    }


    public function siyahi()
    {
        $say = seyfe::where('user_id','=',Auth::id())->count();

        return view('seyfe',[
            'data'=>seyfe::where('user_id','=',Auth::id())->orderBy('id','desc')->get(),
            'say'=>$say
        ]);
    }


    public function sil($id)
    {
        $say = seyfe::where('user_id','=',Auth::id())->count();

        return view('seyfe',[
            'data'=>seyfe::where('user_id','=',Auth::id())->orderBy('id','desc')->get(),
            'say'=>$say,
            'sil_id'=>$id
        ]);
    }


    public function delete($id)
    {   
        seyfe::find($id)->delete();
         return redirect()->route('seyfe1')->with('mesaj','Qeyd ugurla silindi!');
    }


    public function edit($id)
    {
        $say = seyfe::where('user_id','=',Auth::id())->count();

        return view('seyfe',[
            'data'=>seyfe::where('user_id','=',Auth::id())->orderBy('id','desc')->get(),
            'editdata'=>seyfe::find($id),
            'say'=>$say
        ]);
    }


    public function update(seyfeRequest $post)
    {     
        $con = seyfe::find($post->id);

        $con->ad = $post->ad;
        $con->soyad = $post->soyad;
        $con->email = $post->email;

        $con->save();

        return redirect()->route('seyfe1')->with('mesaj','Melumat ugurla yenilendi!');     
    }
}
