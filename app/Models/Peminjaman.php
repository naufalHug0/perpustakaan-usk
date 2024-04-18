<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $table = 'peminjaman';

    public function admin () {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function anggota () {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function detail_peminjaman()
    {
        return $this->hasOne(Detailpeminjaman::class);
    }
}
