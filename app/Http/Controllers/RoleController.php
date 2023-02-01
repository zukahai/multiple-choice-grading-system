<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $data = [];
    protected $limit = 5;
    public function __construct(RoleService $roleService){
        $this->roleService = $roleService;
    }
    public function index(Request $request)
    {
        $keyword = $request->keywords;
        $listRole = $this->roleService->paginate($this->limit, $keyword);
        $this->data['roles'] = $listRole;
        return view('admin.pages.role.index', $this->data);
    }
    public function showEdit($id){
        $this->data['role']= $this->roleService->find($id);
        return view('admin.pages.role.edit',$this->data);
    }
    public function edit($id, Request $request){
        $data = ['name'=>$request->role_name];
        $this->roleService->update($id,$data);
        return redirect(route('admin.role.index'))->with('info','Cập nhật thành công');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->roleService->add($request->role_name);
        return redirect(route('admin.role.index'))->with('info','Thêm role thành công');
    }

    public function delete($id = null){
        if($id==null){
            return redirect(route('admin.role.index'))->with('error','Không tìm thấy role cần xóa');
        }else{
            $this->roleService->delete($id);
            return redirect(route('admin.role.index'))->with('info','Xóa thành công');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function showCreate()
    {
        return view('admin.pages.role.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
