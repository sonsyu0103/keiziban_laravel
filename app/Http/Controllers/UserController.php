<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexUser(Request $request)
    { 
        $users=User::where('id',\Auth::user()->id)->get();
        
        return view('mypage',[
        'users'=>$users
        ]);
    }

    public function editUser(Request $request)
    { 
        $users=User::where('id',\Auth::user()->id)->get();
        
        return view('edit',[
        'users'=>$users
        ]);
    }

    public function storeUser(Request $request)
    {
        $this->validate($request,[
            'u_name'=>'required|max:100',
            'email'=>'required|email',
            'pass'=>'confirmed'
        ]);

        $user=User::find(\Auth::User()->id);
        $user->name=$request->u_name;
        $user->email=$request->email;
        $hash=password_hash($request->pass,PASSWORD_BCRYPT);
        $user->password=$hash;
        $user->save();

        return redirect('edited/');
    }

}
