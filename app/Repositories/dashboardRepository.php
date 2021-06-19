<?php
namespace App\Repositories;

use App\Interfaces\dashboardInterface;
use App\Models\User;
use PHPUnit\Util\Test;

class dashboardRepository implements dashboardInterface{
    public function all(){
        return User::get();
    }

}
