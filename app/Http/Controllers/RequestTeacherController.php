<?php

namespace App\Http\Controllers;

use App\Models\Request_teacher;
use App\Http\Requests\StoreRequest_teacherRequest;
use App\Http\Requests\UpdateRequest_teacherRequest;
use App\Http\Services\RequestTeacherService;
use Illuminate\Http\Request;
use App\Http\Services\RoleService;
use App\Http\Services\UserService;

class RequestTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $data = [];
    public function __construct(RequestTeacherService $requestTeacherService, UserService $userService){
        $this->requestTeacherService = $requestTeacherService;
        $this->userService = $userService;
        
    }
    public function index()
    {
        $this->data['requestTeachers'] = $this->requestTeacherService->getAll();
        return view('admin.pages.requestTeacher.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRequest_teacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest_teacherRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request_teacher  $request_teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Request_teacher $request_teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request_teacher  $request_teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = ['status' => "Đã duyệt"];
        $data2 = ['role_id' => 2];
        $id = $this->requestTeacherService->find($request->id)->getUser->id;
        
        if($this->userService->find($id)){
            $this->userService->update($id,$data2);
        }
        $this->requestTeacherService->update($request->id, $data);
        return redirect(route('admin.requestTeacher.index'))->with('info','Duyệt thành công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRequest_teacherRequest  $request
     * @param  \App\Models\Request_teacher  $request_teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest_teacherRequest $request, Request_teacher $request_teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request_teacher  $request_teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request_teacher $request_teacher)
    {
        //
    }
}
