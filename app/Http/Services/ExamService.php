<?php

namespace App\Http\Services;


use App\Models\Exam;

use Cookie;

class ExamService{
    public function __construct(Exam $exam){
        $this->exam = $exam;
    }

    public function getAll(){
        return $this->exam->orderBy('id','asc')->paginate();
    }

    public function paginate($limit, $keywords){
        $exam = $this->exam;
        $exam = $exam->orderBy('created_at','desc');
        if (!empty($keywords)) {
            $exam->where('name', 'like', '%'. $keywords.'%');
            
        }
        return $exam->paginate($limit)->withQueryString();
    }

    public function update($id, $data){
        $this->exam->where('id',$id)->update($data);
        return $this->exam->find($id);
    }

    public function find($id){
        return $this->exam->find($id);
    }

    // public function add($role_name){
    //     $role = new Role();
    //     $role->name = $role_name;
    //     $role->save();
    // }
    public function delete($id){
        $this->exam->find($id)->delete();
       
    }

    public function add($user_id, $name, $time_start, $time_end){
        $exam = new exam();
        $exam->user_id = $user_id;
        $exam->name = $name;
        $exam->time_start = $time_start;
        $exam->time_end = $time_end;
        $exam->save();
    }
}

?>