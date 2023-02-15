<?php

namespace App\Http\Services;


use App\Models\question;

use Cookie;

class QuestionService{
    public function __construct(question $question){
        $this->question = $question;
    }

    public function getAll(){
        return $this->question->orderBy('id','asc')->paginate();
    }

    public function paginate($limit, $keywords){
        $question = $this->question;
        $question = $question->orderBy('created_at','desc');
        if (!empty($keywords)) {
            $question->where('name', 'like', '%'. $keywords.'%');
            
        }
        return $question->paginate($limit)->withQueryString();
    }

    public function update($id, $data){
        $this->question->where('id',$id)->update($data);
        return $this->question->find($id);
    }

    public function find($id){
        return $this->question->find($id);
    }

    // public function add($role_name){
    //     $role = new Role();
    //     $role->name = $role_name;
    //     $role->save();
    // }
    public function delete($id){
        $this->question->find($id)->delete();
       
    }
}

?>