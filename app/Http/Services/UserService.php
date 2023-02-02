<?php

namespace App\Http\Services;


use App\Models\User;
// use App\Models\RoleAccount;
use Cookie;

class UserService{
    public function __construct(User $User){
        $this->User = $User;
    }

    public function getAll(){
        return $this->User->orderBy('id','asc')->paginate();
    }

    public function paginate($limit, $keywords){
        $User = $this->User;
        $User = $User->orderBy('created_at','desc');
        if (!empty($keywords)) {
            $User->where('name', 'like', '%'. $keywords.'%');
            
        }
        return $User->paginate($limit)->withQueryString();
    }

    public function update($id, $data){
        $this->User->where('id',$id)->update($data);
        return $this->User->find($id);
    }

    public function find($id){
        return $this->User->find($id);
    }

    public function add($User_name){
        $User = new User();
        $User->name = $User_name;
        $User->save();
    }
    public function delete($id){
        $this->User->find($id)->delete();
       
    }
}

?>