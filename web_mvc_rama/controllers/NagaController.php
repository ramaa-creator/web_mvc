<?php
require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../models/NagaModel.php";

/**
 * Controller: NagaController
 * Mengatur alur data antara Model (NagaModel) dan View
 */
class NagaController
{
    private $model;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->model = new NagaModel($db);
    }

    // Tampilkan semua data (default action)
    public function index()
    {
        if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
            $naga = $this->model->search($_GET['keyword']);
        } else {
            $naga = $this->model->getAll();
        }
        require __DIR__ . "/../views/naga_view.php";
    }

    // Tampilkan detail satu naga
    public function detail($id)
    {
        $naga = $this->model->getById($id);
        require __DIR__ . "/../views/naga_detail.php";
    }

    // Tambah data naga baru (dipanggil via form POST)
    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $payload = [
                'nama_naga'   => $_POST['nama_naga'],
                'asal_negara' => $_POST['asal_negara'],
                'era'         => $_POST['era'],
                'warna'       => $_POST['warna'] ?? null,
                'ciri_ciri'   => $_POST['ciri_ciri'] ?? null,
                'deskripsi'   => $_POST['deskripsi'],
                'gambar'      => $_POST['gambar'] ?? null,
            ];
            $this->model->create($payload);
            header("Location: index.php");
            exit;
        }
        require __DIR__ . "/../views/naga_form.php";
    }
}
