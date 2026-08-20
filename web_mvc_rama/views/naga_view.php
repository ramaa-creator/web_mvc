<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sejarah Naga - Aplikasi MVC</title>
    <style>
        * { box-sizing: border-box; }
        html, body { height: 100%; margin: 0; padding: 0; }
        body {
            font-family: Arial, sans-serif;
            color: #fff;
            background: #000;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Background video MP4 */
        .background-video {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -2;
            background: #000;
        }

        .background-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            z-index: -1;
            pointer-events: none;
        }

        header {
            background: #000;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.5);
            position: sticky;
            top: 0;
            z-index: 10;
        }
        header .logo { color: #fff; font-size: 22px; font-weight: bold; margin: 0; }
        header form { display: flex; gap: 8px; }
        header input[type=text] { padding: 8px; width: 220px; border-radius: 5px; border: none; }
        header button { padding: 8px 15px; background: #f4c542; color: #000; font-weight: bold; border: none; border-radius: 5px; cursor: pointer; }

        .container { max-width: 900px; margin: auto; padding: 20px; }

        /* Glass box */
        .card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 14px;
            padding: 15px 20px;
            margin-bottom: 18px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.35);
            display: flex;
            gap: 15px;
            align-items: flex-start;
        }
        .card video { width: 140px; height: 140px; object-fit: cover; border-radius: 10px; flex-shrink: 0; background: rgba(255,255,255,0.1); }
        .card-content { flex: 1; }
        .card h2 { margin: 0 0 5px 0; color: #f4c542; text-shadow: 0 1px 3px rgba(0,0,0,0.6); }
        .card .info { font-size: 14px; color: #eee; margin-bottom: 8px; }
        .card .ciri { font-size: 14px; color: #f4c542; margin: 0 0 8px 0; line-height: 1.4; }
        .card p { margin: 0; line-height: 1.5; color: #f5f5f5; }
        .empty { text-align: center; color: #eee; margin-top: 40px; }

        .biodata {
            max-width: 900px;
            margin: 20px auto 30px auto;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.35);
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .biodata video { width: 100px; height: 100px; object-fit: cover; border-radius: 50%; border: 3px solid #f4c542; background: #000; }
        .biodata h3 { margin: 0 0 8px 0; color: #f4c542; text-shadow: 0 1px 3px rgba(0,0,0,0.6); }
        .biodata table { border-collapse: collapse; }
        .biodata table td { padding: 2px 8px; font-size: 14px; color: #f5f5f5; }
        .biodata table td:first-child { font-weight: bold; width: 110px; }
    </style>
</head>
<body>
    <video class="background-video" autoplay muted loop playsinline preload="metadata" aria-hidden="true">
        <source src="assets/img/background.mp4" type="video/mp4">
    </video>
    <div class="background-overlay"></div>

    <header>
        <p class="logo">🐉 Sejarah Naga</p>
        <form method="GET" action="index.php">
            <input type="text" name="keyword" placeholder="Cari naga (nama/negara)..." value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>">
            <button type="submit">Cari</button>
        </form>
    </header>

    <div class="container">
        <?php if (!empty($naga)): ?>
            <?php foreach ($naga as $item): ?>
                <div class="card">
                    <video autoplay muted loop playsinline preload="metadata" title="<?= htmlspecialchars($item['nama_naga']) ?>">
                        <source src="assets/img/<?= htmlspecialchars($item['gambar'] ?? 'default.mp4') ?>" type="video/mp4">
                        Browser kamu tidak mendukung video MP4.
                    </video>
                    <div class="card-content">
                        <h2><?= htmlspecialchars($item['nama_naga']) ?></h2>
                        <div class="info">
                            Asal: <?= htmlspecialchars($item['asal_negara']) ?> |
                            Era: <?= htmlspecialchars($item['era']) ?>
                            <?php if (!empty($item['warna'])): ?>
                                | Warna: <?= htmlspecialchars($item['warna']) ?>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($item['ciri_ciri'])): ?>
                            <p class="ciri"><strong>Ciri-ciri:</strong> <?= htmlspecialchars($item['ciri_ciri']) ?></p>
                        <?php endif; ?>
                        <p><?= htmlspecialchars($item['deskripsi']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="empty">Data naga tidak ditemukan.</p>
        <?php endif; ?>
    </div>

    <div class="biodata">
        <img src="assets/img/pembuat.jpg"class="pembuat-image"alt="Pembuat"style="width: 145px; height: 200px;">
        <div>
            <h3>Biodata Pembuat</h3>
            <table>
                <tr><td>Nama</td><td>: Rama septiansyah</td></tr>
                <tr><td>Sekolah</td><td>: SMKS MAHARDHIKA</td></tr>
                <tr><td>Kelas</td><td>: XII RPL 3</td></tr>
                <tr><td>instagram</td><td>: 7_ramaaa</td></tr>
                <tr><td>Email</td><td>: septiansyahrama99@email.com</td></tr>
            </table>
        </div>
    </div>
</body>
</html>
