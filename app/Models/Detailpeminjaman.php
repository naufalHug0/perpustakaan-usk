<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailpeminjaman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $table = 'detailpeminjaman';

    public function peminjaman () {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }

    public function detail_buku () {
        return $this->belongsTo(Detailbuku::class, 'detailbuku_id');
    }
}
