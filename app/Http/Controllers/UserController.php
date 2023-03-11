<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserService;


class UserController extends Controller
{

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
     
    public function index(){
        auth()->logout();
        return View('Login.login');
    }

    public function login(Request $request){
        $user = $this->userService->checkLogin($request->username, $request->password);
        if($user != null){
            
            //Login authencation
            auth()->login($user);
            if($user->getRole->name == "teacher")
                return redirect(route('teacher.question.index'))->with('info','Đăng nhập thành công');
            else{
                return redirect(route('admin.role.index'))->with('info','Đăng nhập thành công');
            }
        }else{
            return redirect(route('login'))->with('error','Đăng nhập thất bại');
        }
    }
}
