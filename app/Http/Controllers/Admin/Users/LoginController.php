<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class LoginController extends Controller
{
    
    public function index(){
        return view('admin.users.login',[
            'title'=> 'Đăng nhập'               
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[ //Kiem tra thong bao loi
            'email'=>'required',
            'pass'=>'required'
        ]);
        
        if (Auth::attempt(['email'=>$request->input('email'),
            'password'=>$request->input('pass') //Kiem tra thong tin dang nhap
        ],$request->input('remember'))){
            Session::flash('success','Login success');
            return redirect()->route('admin');//Chuyen trang sang admin
        }
        Session::flash('error','Login failed');
        return redirect()->back();//van o trang cu
       
    }
}
