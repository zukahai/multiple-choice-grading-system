<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckTeacher
{
    public function __construct(){
        // echo "Middleware CheckTeacher";
    }
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()==null)
            return redirect(route('login'))->with('error', 'Bạn cần login');
        if(auth()->user()->getRole->name != 'teacher')
            return redirect(route('login'))->with('error', 'Bạn không phải giáo viên');
        return $next($request);
    }
}

?>