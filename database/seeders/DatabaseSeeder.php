<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Admin;
use App\Models\Anggota;
use App\Models\Detailbuku;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Anggota::factory(5)->create();

        collect([
            'Majalah',
            'Komik',
            'Buku Pelajaran',
            'Biografi',
            'Novel'
        ])->each(function ($cat) {
            Kategori::create([
                "kategori"=>$cat
            ]);
        });

        collect([
            [
                'level' => 'Admin',
                'status' => [
                    'Aktif',
                    'Tidak Aktif'
                ]
            ],
            [
                'level' => 'Pustakawan',
                'status' => [
                    'Aktif',
                    'Aktif',
                    'Tidak Aktif'
                ]
            ]
        ])->each(function ($user) {
            $level = $user['level'];
            collect($user['status'])->each(function ($status) use ($level) {
                Admin::create([
                    'nama' => fake()->name(),
                    'username' => fake()->unique()->userName(),
                    'password'=> Hash::make('12345'),
                    'status' => $status,
                    'level' => $level
                ]);
            });
        });

        collect([
            [
                'judul' => 'Educomics Plant vs Zombie Komik Sains Robot 1: Labirin Robot',
                'gambar' => 'books/65d9b54fa11e5.jpeg',
                'pengarang' => 'Xiao Jiang Nan',
                'penerbit' => 'Bhuana Ilmu Populer',
                'deskripsi' => 'Green Shadow dan Solar Flare diusir dari Kota Plant. Mereka juga harus membayar ganti rugi atas kehancuran Kota Plant. Kota Plant dilanda kegaduhan karena mereka tiba-tiba diserang oleh pasukan robot pembersih. Seri ini berisikan informasi mengenai robot dan kegunaannya yang disukai anak-anak.',
                'kategori_id' => 2
            ],
            [
                'judul' => 'Tempo : Selap-Selip Ganjar',
                'gambar' => 'books/655dfcfc98e89.jpeg',
                'pengarang' => 'Firli Bahuri',
                'penerbit' => 'Tempo',
                'deskripsi' => 'Megawati Soekarnoputri memilih Ganjar Pranowo sebagai calon presiden awal tahun ini. Menimbang persepsi soal pemimpin perempuan.',
                'kategori_id' => 1
            ],
            [
                'judul' => 'Matematika SMA/MA Wajib Kelas XII',
                'gambar' => 'books/655dfdf908b82.jpeg',
                'pengarang' => 'B.K. NOORMANDIRI',
                'penerbit' => 'Erlangga',
                'deskripsi' => 'Buku Matematika SMA/MA Wajib ini disusun berdasarkan Kurikulum 2013 Edisi Revisi 2016. Materi dalam buku ini dirancang sedemikian rupa sehingga mengarah ke model pembelajaran peserta didik aktif dan pembelajaran kontekstual.',
                'kategori_id' => 3
            ],
            [
                'judul' => 'Tan Malaka : Biografi Singkat 1897 - 1949',
                'gambar' => 'books/65d9b57e1e6eb.jpeg',
                'pengarang' => 'Taufik Adi Susilo',
                'penerbit' => 'Garasi',
                'deskripsi' => 'Tan Malaka adalah teladan tokoh revolusi militan, radikal, dan revolusioner. Namun sayang, nama dan perannya dalam kemerdekaan indonesia sengaja dikaburkan dan dihilangkan oleh rezim Orde Baru dari catatan sejarah dan album pahlawan nasional.',
                'kategori_id' => 4
            ],
            [
                'judul' => '5cm',
                'gambar' => 'books/65d9fc2bc6d0e.jpeg',
                'pengarang' => 'Donny Dhirgantoro',
                'penerbit' => 'Gramedia Indonesia',
                'deskripsi' => 'Ia di sini sekarang, perjalanan pulang setelah Mahameru—Perjalanan Hati—puncak tertinggi Jawa, dan segala tentangnya. Alih pandangnya sekarang melihat jendela kereta',
                'kategori_id' => 5
            ],
            [
                'judul' => 'Laskar Pelangi',
                'gambar' => 'books/655d64ed620cf.jpeg',
                'pengarang' => 'Andrea Hirata',
                'penerbit' => 'Bentang Pustaka',
                'deskripsi' => 'Laskar Pelangi adalah novel yang pertama kali diterbitkan oleh penulis kenamaan, Andrea Hirata. Tepatnya, novel ini berhasil dirilis pada tahun 2015 oleh Penerbit Bentang Pustaka. Dalam peradabannya, Andrea Hirata pun mengeluarkan tiga novel sekuel lanjutan dari Laskar Pelangi, di antaranya Sang Pemimpi, Edensor, dan Maryamah Karpov.',
                'kategori_id' => 5
            ],
            [
                'judul' => 'Dragon Ball Super : Universe ke-6',
                'gambar' => 'books/655d67db38478.jpg',
                'pengarang' => 'Akira Toriyama',
                'penerbit' => 'Elex Media Komputindo',
                'deskripsi' => 'After waking up from decades of slumber, Beerus, the god of destruction, wants to defeat Goku, the Super Saiyan God, whom he had seen in his sleep. Goku fights with him to save earth.',
                'kategori_id' => 2
            ],
            [
                'judul' => 'Ir. Soekarno : Biografi Singkat 1897 - 1949',
                'gambar' => 'books/655dfbb12dab7.jpeg',
                'pengarang' => 'Taufik Adi Susilo',
                'penerbit' => 'Garasi',
                'deskripsi' => 'Ir.Soekarno, Pahlawan Nasional Indonesia yang merupakan presiden pertama Republik Indonesia. Perjuangan dan jasanya untuk bangsa Indonesia tidak terhitung jumlah, bahkan kehebatannya tidak hanya terkenal di dalam negeri namun sampai internasional. Itulah sebabnya biografi Ir. Soekarno sangat menarik untuk dibahas dan diketahui oleh generasi bangsa Indonesia.',
                'kategori_id' => 4
            ],
        ])->each(function ($book) {
            $buku = Buku::create($book);
            // storage/...

            Detailbuku::create([
                'status' => 'Tersedia',
                'buku_id' => $buku->id
            ]);
        });
    }
}
