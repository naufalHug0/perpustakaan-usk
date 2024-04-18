@extends('pages.dashboard.layouts.form')

@section('form')
    <form action="" method="post">
        @csrf
        <div class="flex flex-col gap-2">
            <label class="font-light" for="nama">Nama</label>
            <input type="text" placeholder="Nama" name="nama" id="nama" class="border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-berry focus:border-berry transition">
        </div>
        <div class="mt-4 flex flex-col gap-2">
            <label class="font-light" for="username">Username</label>
            <input type="text" placeholder="Username" name="username" id="username" class="border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-berry focus:border-berry transition">
        </div>
        <div class="mt-4 flex flex-col gap-2">
            <label class="font-light" for="password">Password</label>
            <input type="password" placeholder="Password" name="password" id="password" class="border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-berry focus:border-berry transition">
        </div>
        <div class="mt-4 flex flex-col gap-2">
            <label class="font-light" for="status">Status</label>
            <select name="status" id="status" class="appearance-none border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-berry focus:border-berry transition ">                
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>
        <div class="mt-4 flex flex-col gap-2">
            <label class="font-light" for="level">Level</label>
            <select name="level" id="level" class="appearance-none border-[0.5px] rounded-md py-2 px-3 focus:outline-none border-[rgba(0,0,0,.3)] placeholder:font-light font-bold text-berry focus:border-berry transition ">                
                <option value="Admin">Admin</option>
                <option value="Pustakawan">Pustakawan</option>
            </select>
        </div>
        <button type="submit" class="py-3 w-full mt-8 rounded-md bg-berry text-white font-bold transition hover:bg-purple">Tambah</button>
    </form>
@endsection