<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapDivisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'divisi_id', 
        'ots_masuk',
        'ots_selesai',
        'ots_sisa',
        'jbd_baru'
    ];

    public function divisi(){
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function rekapUsers(){
        return $this->hasMany(RekapUser::class, 'divisi_id');
    }
}
