<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone'
    ];

    public function index(){
        $admins = DB::table('admins')
            ->get();
        return $admins;
    }

    public function store() {
        DB::table('admins')
        ->insert([
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'password' => $this->password,
            'phone' => $this->phone,
        ]);
    }

    public function edit(){
        DB::table('admins')
        ->where('id', $this->id)
        ->update([
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'password' => $this->password,
            'phone' => $this->phone,
        ]);
    }

    public function delete(){
        DB::table('admins')
        ->where('id', $this->id)
        ->delete();
    }
}
