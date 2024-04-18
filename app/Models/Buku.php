<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $table = 'buku';

    public function kategori () {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function detail_buku () {
        return $this->hasMany(Detailbuku::class);
    }
}
