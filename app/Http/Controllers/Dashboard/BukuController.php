<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Detailbuku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        SELECT 
        t_buku.f_id,
        t_buku.f_judul,
        t_buku.f_gambar,
        t_buku.f_pengarang,
        t_buku.f_penerbit,
        t_kategori.f_kategori,
        COUNT(CASE WHEN t_detailbuku.f_status = 'Tersedia' THEN 1 END) AS f_stok
        FROM t_buku INNER JOIN t_kategori ON t_buku.f_idkategori = t_kategori.f_id
        INNER JOIN t_detailbuku ON t_buku.f_id = t_detailbuku.f_idbuku
        group by t_buku.f_id
        */
        
        $books = Buku::selectRaw("
        buku.*,
        kategori.kategori,
        COUNT(CASE WHEN detailbuku.status = 'Tersedia' THEN 1 END) AS stok
        ")
        ->join('kategori', 'kategori.id', '=', 'buku.kategori_id')
        ->join('detailbuku', 'buku.id', '=', 'detailbuku.buku_id')
        ->groupBy('buku.id')->get();

        return view('pages.dashboard.buku.index', [
            'books'=>$books,
            'user' => Auth::guard('admin')->user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'judul'=>'required',
        //     'pengarang'=>'required',
        //     'penerbit'=>'required',
        //     'kategori_id'=>'required',
        //     'desc'=>'required',
        //     'stok'=>'required|integer'
        // ]);

        // if ($validator->fails()) {
        //     //
        // }

        // if ($related_book = Buku::whereRaw('lower(judul) = ?', [strtolower($request->judul)])->first()) {
        //     if ($request->stok < $related_book->stok) {
        //         // 
        //     }

        //     Detailbuku::insert(collect(range($related_book->stok + 1, $request->stok))->map(function () use ($related_book) {
        //         return [
        //             'buku_id' => $related_book->id,
        //             'status' => 'Tersedia',
        //             'created_at' => date('Y-m-d H:i:s'),
        //             'updated_at' => date('Y-m-d H:i:s')
        //         ];
        //     })->toArray());
        // }
        return view('pages.dashboard.buku.create', [
            'user' => Auth::guard('admin')->user(),
            'kategoris'=> Kategori::all(),
            'page'=>'buku'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBukuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBukuRequest $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        //
    }
}
