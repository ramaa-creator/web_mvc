<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Naga</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f1ea; padding: 20px; }
        .container { max-width: 700px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; }
        a { color: #7a1f1f; text-decoration: none; }
        h1 { color: #7a1f1f; }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php">&larr; Kembali</a>
        <?php if ($naga): ?>
            <h1><?= htmlspecialchars($naga['nama_naga']) ?></h1>
            <p><strong>Asal Negara:</strong> <?= htmlspecialchars($naga['asal_negara']) ?></p>
            <p><strong>Era:</strong> <?= htmlspecialchars($naga['era']) ?></p>
            <?php if (!empty($naga['warna'])): ?>
                <p><strong>Warna:</strong> <?= htmlspecialchars($naga['warna']) ?></p>
            <?php endif; ?>
            <?php if (!empty($naga['ciri_ciri'])): ?>
                <p><strong>Ciri-ciri:</strong> <?= nl2br(htmlspecialchars($naga['ciri_ciri'])) ?></p>
            <?php endif; ?>
            <p><?= nl2br(htmlspecialchars($naga['deskripsi'])) ?></p>
        <?php else: ?>
            <p>Data tidak ditemukan.</p>
        <?php endif; ?>
    </div>
</body>
</html>
