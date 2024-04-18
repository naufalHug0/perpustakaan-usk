<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Illuminate\Database\QueryException;
use PDOException;

class KategoriController extends Controller
{
    private $validation = [
        'rules'=>[
            'kategori' => 'required|unique:kategori,kategori'
        ], 
        'error_messages'=>[
            'kategori.required' => 'Kolom ini harus diisi!',
            'kategori.unique' => 'Nama kategori sudah ada!'
        ]
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.kategori.index', [
            'kategoris' => Kategori::all(),
            'user' => Auth::guard('admin')->user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.kategori.create', [
            'user' => Auth::guard('admin')->user(),
            'page'=>'kategori',
            'title'=>'tambah kategori'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->validation['rules'], $this->validation['error_messages']);

        Kategori::create($validatedData);

        return redirect('/admin/kategori')->with('notification', [
            'type'=>'success',
            'message'=>'Kategori berhasil ditambah!',
            'options'=>[
                [ 'text'=>'Lanjut', 'type'=>'primary' ]
            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('pages.dashboard.kategori.edit', [
            'user' => Auth::guard('admin')->user(),
            'page'=>'kategori',
            'title'=>'detail kategori',
            'kategori'=> Kategori::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, Request $request)
    {
        $validatedData = $request->validate($this->validation['rules'], $this->validation['error_messages']);

        Kategori::find($id)->update([
            'kategori' => $validatedData['kategori']
        ]);

        return redirect()->back()->with('notification', [
            'type'=>'success',
            'message'=>'Kategori berhasil diubah!',
            'options'=>[
                [ 'text'=>'Lanjut', 'type'=>'primary' ]
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        return redirect('/admin/kategori')->with('notification', [
            'type'=>'warning',
            'message'=>'Yakin mau hapus data?',
            'options'=>[
                [ 'text'=>'Hapus', 'type'=>'danger', 'post'=> [
                    'path'=>"/admin/kategori/delete/$request->id"
                ] ],
                [ 'text'=>'Batal', 'type'=>'secondary' ]
            ]
        ]);
    }
    public function destroy(int $id)
    {
        try {
            Kategori::find($id)->delete();

            $message = "Kategori berhasil dihapus!";
            $type = 'success';
            $buttonText = 'Lanjut';
            $buttonType = 'primary';

        } catch (QueryException $e) {
            $message = "Tindakan tidak dapat dilakukan (RESTRICT)";
            $type = 'error';
            $buttonText ='Kembali';
            $buttonType = 'danger';
        }

        return redirect('/admin/kategori')->with('notification', [
            'type' => $type,
            'message' => $message,
            'options' => [
                ['text' => $buttonText, 'type' => $buttonType]
            ]
        ]);


    }
}
