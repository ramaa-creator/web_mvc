# Aplikasi MVC - Sejarah Naga (PHP + MySQL)

Aplikasi sederhana bertema **Sejarah Naga** menggunakan pola **MVC (Model-View-Controller)** dengan PHP native dan database **MySQL**.

## Struktur Folder

```
mvc-naga/
├── config/
│   └── Database.php        # Koneksi ke MySQL (PDO)
├── models/
│   └── NagaModel.php       # Query CRUD ke tabel sejarah_naga
├── controllers/
│   └── NagaController.php  # Menghubungkan Model & View
├── views/
│   ├── naga_view.php       # Daftar & pencarian naga
│   ├── naga_detail.php     # Detail satu naga
│   └── naga_form.php       # Form tambah data
├── index.php               # Entry point (routing utama)
├── tambah.php               # Entry point form tambah
└── database.sql            # Skema + data awal MySQL
```

## Cara Menjalankan

1. **Buat database**
   Import file `database.sql` ke MySQL (lewat phpMyAdmin, atau CLI):
   ```bash
   mysql -u root -p < database.sql
   ```

2. **Atur koneksi database**
   Edit `config/Database.php` sesuai kredensial MySQL kamu (host, username, password).

3. **Jalankan server PHP**
   Pastikan sudah ada PHP terpasang, lalu di dalam folder `mvc-naga`:
   ```bash
   php -S localhost:8000
   ```

4. **Buka di browser**
   - Daftar naga: `http://localhost:8000/index.php`
   - Detail naga: `http://localhost:8000/index.php?action=detail&id=1`
   - Tambah data: `http://localhost:8000/tambah.php`

## Fitur

- **Model (`NagaModel.php`)**: `getAll()`, `getById()`, `create()`, `update()`, `delete()`, `search()` — semua query ke MySQL pakai PDO + prepared statement (aman dari SQL Injection).
- **View**: tampilan daftar naga bergaya kartu lengkap dengan gambar (GIF) dan biodata pembuat di bagian bawah halaman.
- **Controller**: mengatur alur — menerima request, memanggil Model, mengirim data ke View.

## Menambahkan Gambar (GIF)

1. Siapkan file GIF, beri nama sesuai kolom `gambar` di database (lihat `assets/img/README.txt`).
2. Taruh file tersebut di folder `assets/img/`.
3. Untuk foto di bagian Biodata Pembuat, tambahkan file bernama `pembuat.gif` di folder yang sama.

## Mengisi Biodata Pembuat

Buka `views/naga_view.php`, cari bagian `<div class="biodata">` di bagian paling bawah,
lalu ganti isi tabel (Nama, NIM/NPM, Kelas, Kampus, Email) sesuai data kamu.

## Catatan

- Data awal (5 naga dari berbagai budaya: Tiongkok, Wales, Nordik, Indonesia/Komodo, Aztek) sudah disediakan di `database.sql`.
- Fitur pencarian sudah dihapus dari tampilan utama sesuai permintaan.
- Bisa dikembangkan lagi dengan fitur edit/hapus, upload gambar, atau autentikasi admin.
