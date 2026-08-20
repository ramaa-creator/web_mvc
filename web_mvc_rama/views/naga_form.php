<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Sejarah Naga</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f1ea; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; box-sizing: border-box; margin-top: 4px; }
        button { margin-top: 15px; padding: 10px 20px; background: #7a1f1f; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Data Sejarah Naga</h1>
        <form method="POST" action="tambah.php">
            <label>Nama Naga</label>
            <input type="text" name="nama_naga" required>

            <label>Asal Negara</label>
            <input type="text" name="asal_negara" required>

            <label>Era</label>
            <input type="text" name="era">

            <label>Warna</label>
            <input type="text" name="warna" placeholder="Contoh: Merah, Emas, Hijau">

            <label>Ciri-ciri</label>
            <textarea name="ciri_ciri" rows="3" placeholder="Contoh: bersisik, bertanduk, bersayap, dsb."></textarea>

            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="5" required></textarea>

            <label>Nama File Video MP4 (opsional)</label>
            <input type="text" name="gambar">

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
