<?php
namespace App\Http\Services;
use App\Models\Request_teacher;
use App\Models\User;

class RequestTeacherService{
    public function __construct(Request_teacher $requestTeacher, User $user){
        $this->requestTeacher = $requestTeacher;
        $this->user = $user;
    }

    public function getAll(){
        return $this->requestTeacher->orderBy('id','asc')->paginate();
    }

    public function find($id){
        return $this->requestTeacher->find($id);
    }

    public function update($id, $data){
        $this->requestTeacher->where('id',$id)->update($data);
        return $this->requestTeacher->find($id);
    }

    public function updateRole($id,$data){
        $this->user->where('id',$id)->update($data);
        return $this->user->find($id);
    }



}
?>
