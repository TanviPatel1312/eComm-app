<?php
namespace App\Repositories;

use App\Interfaces\registerInterface;
use App\Models\User;
use PHPUnit\Util\Test;

class registerRepository implements registerInterface{
    public function all(){
        return User::get();
    }
    public function get($id)
    {
        return User::find($id);
    }
    public function store(array $data){
        return User::create($data);
    }

}
