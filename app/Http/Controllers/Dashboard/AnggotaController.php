<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Anggota;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.users.anggota.index', [
            'anggotas' => Anggota::all(),
            'user' => Auth::guard('admin')->user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.users.anggota.create', [
            'user' => Auth::guard('admin')->user(),
            'page'=>'anggota'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnggotaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnggotaRequest $request, Anggota $anggota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggota)
    {
        //
    }
}
