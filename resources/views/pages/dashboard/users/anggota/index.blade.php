@extends('pages.dashboard.layouts.dashboard')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-berry uppercase bg-slate-100 border-b border-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tempat Lahir
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Lahir
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggotas as $anggota)
                    <tr class="border-b bg-white transition">
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $anggota->id }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-purple">
                            {{ $anggota->nama }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $anggota->username }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $anggota->tempat_lahir }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $anggota->tanggal_lahir }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium bg-blue-600 text-white px-2 py-1 rounded-md">Edit</a>
                            <a href="#" class="font-medium bg-red-600 text-white px-2 py-1 rounded-md">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/admin/anggota/add" class="w-full transition hover:bg-purple hover:text-white duration-300 rounded-b-md text-purple font-medium text-[28px] bg-white shadow-md py-3 flex justify-center items-center">
            <i class="bi bi-plus-circle-fill"></i>
        </a>
    </div>
    
@endsection