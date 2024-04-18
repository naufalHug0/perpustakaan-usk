<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use App\Models\Anggota;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    private $validation = [
        'rules'=>[
            'tanggal-peminjaman' => 'required|date|after_or_equal:today',
            'anggota' => 'required',
            'admin' => 'required',
            'buku' => 'required'
        ], 
        'error_messages'=>[
            'tanggal-peminjaman.required' => 'Kolom ini harus diisi!',
            'tanggal-peminjaman.after_or_equal' => 'Tanggal harus hari ini atau berikutnya!',
            'anggota.required' => 'Kolom ini harus diisi!',
            'admin.required' => 'Kolom ini harus diisi!',
            'buku.required' => 'Kolom ini harus diisi!',
        ]
    ];
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // "SELECT 
        //         peminjaman.f_id as id_peminjaman,
        //         peminjaman.f_tanggalpeminjaman,
        //         peminjaman.f_expireddate,
        //         detailpeminjaman.f_tanggalkembali,
        //         admin.f_nama as nama_admin,
        //         anggota.f_nama as nama_anggota,
        //         buku.f_judul as judul,
        //         kategori.f_kategori as kategori,
        //         buku.f_gambar as gambar
        //         FROM peminjaman 
        //         INNER JOIN detailpeminjaman ON peminjaman.f_id = detailpeminjaman.f_idpeminjaman
        //         INNER JOIN admin ON peminjaman.f_idadmin = admin.f_id
        //         INNER JOIN anggota ON peminjaman.f_idanggota = anggota.f_id
        //         INNER JOIN detailbuku ON detailpeminjaman.f_iddetailbuku = detailbuku.f_id
        //         INNER JOIN buku ON buku.f_id = detailbuku.f_idbuku
        //         INNER JOIN kategori ON buku.f_idkategori = kategori.f_id
        //         ";
        $guard = explode('/', $request->path())[0];
        $user = Auth::guard($guard)->user();

        $peminjamans = Peminjaman::with([
            'detailpeminjaman',
            'admin',
            'anggota',
            'detailpeminjaman.detailbuku',
            'detailbuku.buku',
            'buku.kategori'
        ])->orderBy('peminjaman.tanggal_peminjaman');
            // ->select('peminjaman.id as peminjaman_id',
            // 'peminjaman.tanggal_peminjaman',
            // 'peminjaman.expired_at',
            // 'detailpeminjaman.tanggal_kembali',
            // 'admin.nama as nama_admin',
            // 'anggota.f_nama as nama_anggota',
            // 't_buku.f_judul as judul',
            // 't_kategori.f_kategori as kategori',
            // 't_buku.f_gambar as gambar')
            // ->join('admin', 'peminjaman.admin_id', '=', 'admin.id')
            // ->join('anggota', 'peminjaman.anggota_id', '=', 'anggota.id')
            // ->join('detailbuku', 'detailpeminjaman.detailbuku_id', '=', 'detailbuku.id')
            // ->join('buku', 'buku.id', '=', 'detailbuku.buku_id')
            // ->join('kategori', 'buku.kategori_id', '=', 'kategori.id')
            // ->orderBy('peminjaman.tanggal_peminjaman');

        if ($guard !== 'admin') {
            $peminjamans = $peminjamans->where('peminjaman.'.($guard == 'pustakawan'?'admin':'anggota').'_id', $user->id);
        }

        return view('pages.dashboard.peminjaman.index', [
            'user' => Auth::guard($guard)->user(),
            'peminjamans'=>$peminjamans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $guard = explode('/', $request->path())[0];

        return response()->json(Buku::selectRaw('buku.*,max(detailbuku.id) as detailbuku_id')->join('detailbuku','buku.id','=','detailbuku.buku_id')->where('status', 'Tersedia')->groupBy('buku.id')->get());

        // return view('pages.dashboard.peminjaman.create', [
        //     'user' => Auth::guard($guard)->user(),
        //     'anggotas'=>Anggota::select(['id','nama'])->get(),
        //     'bukus'=>Buku::with(['detail_buku' => function ($q) {
        //         $q->where('status','Tersedia')->first();
        //     }])->get(),
        //     'title'=>'tambah peminjaman',
        //     'page'=>'peminjaman',
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->validation['rules'], $this->validation['error_messages']);

        dd($validatedData);
        // Kategori::create($validatedData);

        // return redirect('/admin/kategori')->with('notification', [
        //     'type'=>'success',
        //     'message'=>'Kategori berhasil ditambah!',
        //     'options'=>[
        //         [ 'text'=>'Lanjut', 'type'=>'primary' ]
        //     ]
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeminjamanRequest $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
