<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $fillable = ['nama'];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function rekapDivisi(){
        return $this->hasMany(RekapDivisi::class);
    }

    public function rekapUser(){
        return $this->hasMany(RekapUser::class);
    }

    // public function getRouteKeyName(){
    //     return 'name';
    // }
}
