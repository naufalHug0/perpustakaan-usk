<div class="w-max p-2 rounded-md flex justify-between bg-white shadow-sm gap-3">
    @if($user->level =='Admin' ?? false) 
        <a href="/admin/kategori" class="tabs-item @if(Request::is('*/kategori')) active @endif">Kategori</a>
        <a href="/admin/buku" class="tabs-item @if(Request::is('*/buku')) active @endif">Buku</a>
        <a href="/admin/anggota" class="tabs-item @if(Request::is('*/anggota')) active @endif">Anggota</a>
        <a href="/admin/admin" class="tabs-item @if(Request::is('*/admin')) active @endif">Admin</a>
    @endif
    <a href="/{{ $user->level ? strtolower($user->level) : 'anggota' }}/peminjaman" class="tabs-item @if(Request::is('*/peminjaman')) active @endif">Peminjaman</a>
    @if(in_array($user->level,['Admin','Pustakawan']) ?? false)
        <a href="/{{ strtolower($user->level) }}/laporan" class="tabs-item @if(Request::is('*/laporan')) active @endif">Laporan</a>
    @endif
</div>