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
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Level
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr class="border-b bg-white transition">
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $admin->id }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-purple">
                            {{ $admin->nama }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $admin->username }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="admin-status px-2 py-1 @if($admin->status == 'Aktif') success @else danger @endif rounded-md text-white w-max">
                                {{ $admin->status }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ $admin->level }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium bg-blue-600 text-white px-2 py-1 rounded-md">Edit</a>
                            <a href="#" class="font-medium bg-red-600 text-white px-2 py-1 rounded-md">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/admin/admin/add" class="w-full transition hover:bg-purple hover:text-white duration-300 rounded-b-md text-purple font-medium text-[28px] bg-white shadow-md py-3 flex justify-center items-center">
            <i class="bi bi-plus-circle-fill"></i>
        </a>
    </div>
@endsection