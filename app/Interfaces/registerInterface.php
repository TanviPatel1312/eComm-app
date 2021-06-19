<?php
namespace App\Interfaces;

interface registerInterface{
    public function all();
    public function get($id);
    public function store(array $data);

}
