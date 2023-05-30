<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\UserService;
use App\Http\Services\RequestTeacherService;


class UserController extends Controller
{

    public function __construct(UserService $userService, RequestTeacherService $requestTeacherService){
        $this->userService = $userService;
        $this->requestTeacherService = $requestTeacherService;
    }

    public function home(){
        return View('welcome');
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

    public function showRegister(){
        return View('Login.register');
    }

    public function register(RegisterRequest $request){
        $user = $this->userService->add($request->fullname,$request->username,$request->password,'4');
        if($request->role =='2'){
            $this->requestTeacherService->addRequest($this->userService->getID($request->username));
            return redirect(route('user.home.index'))->with('success','Đăng ký thành công, chờ admin duyệt quyền');
        }
        return redirect(route('user.home.index'))->with('success','Đăng ký thành công');
    }
}
