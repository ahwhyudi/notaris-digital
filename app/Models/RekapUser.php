<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'divisi_id',
        'ots_selesai',
        'rekap_divisi_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function divisi(){
        return $this->belongsTo(Divisi::class);
    }
}
