<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "/config/Database.php";

echo "<h2>Debug Koneksi Database</h2>";

try {
    $database = new Database();
    $db = $database->getConnection();

    // Info server & database yang benar-benar terpakai
    $stmt = $db->query("SELECT DATABASE() AS db_aktif, @@port AS port_mysql, @@hostname AS host_mysql");
    $info = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<p><strong>Database aktif:</strong> " . htmlspecialchars($info['db_aktif']) . "</p>";
    echo "<p><strong>Port MySQL:</strong> " . htmlspecialchars($info['port_mysql']) . "</p>";
    echo "<p><strong>Host MySQL:</strong> " . htmlspecialchars($info['host_mysql']) . "</p>";

    // Cek isi tabel sejarah_naga langsung
    $stmt2 = $db->query("SELECT COUNT(*) AS jumlah FROM sejarah_naga");
    $jumlah = $stmt2->fetch(PDO::FETCH_ASSOC);
    echo "<p><strong>Jumlah baris di tabel sejarah_naga:</strong> " . htmlspecialchars($jumlah['jumlah']) . "</p>";

    $stmt3 = $db->query("SELECT id, nama_naga FROM sejarah_naga");
    echo "<p><strong>Daftar isi tabel:</strong></p><ul>";
    foreach ($stmt3->fetchAll(PDO::FETCH_ASSOC) as $row) {
        echo "<li>ID " . $row['id'] . " - " . htmlspecialchars($row['nama_naga']) . "</li>";
    }
    echo "</ul>";
} catch (Exception $e) {
    echo "<p style='color:red'><strong>ERROR:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
}
