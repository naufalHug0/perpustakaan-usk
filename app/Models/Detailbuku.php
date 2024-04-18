<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailbuku extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $table = 'detailbuku';

    public function buku () {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    public function detail_peminjaman()
    {
        return $this->hasMany(Detailpeminjaman::class);
    }
}
