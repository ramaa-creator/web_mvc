<?php
/**
 * Model: NagaModel
 * Bertugas mengambil & mengelola data sejarah naga dari database MySQL
 */
class NagaModel
{
    private $conn;
    private $table = "sejarah_naga";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Ambil semua data naga
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil satu data naga berdasarkan id
    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah data naga baru
    public function create($data)
    {
        $query = "INSERT INTO " . $this->table . " (nama_naga, asal_negara, era, warna, ciri_ciri, deskripsi, gambar)
                  VALUES (:nama_naga, :asal_negara, :era, :warna, :ciri_ciri, :deskripsi, :gambar)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nama_naga", $data['nama_naga']);
        $stmt->bindParam(":asal_negara", $data['asal_negara']);
        $stmt->bindParam(":era", $data['era']);
        $stmt->bindParam(":warna", $data['warna']);
        $stmt->bindParam(":ciri_ciri", $data['ciri_ciri']);
        $stmt->bindParam(":deskripsi", $data['deskripsi']);
        $stmt->bindParam(":gambar", $data['gambar']);

        return $stmt->execute();
    }

    // Update data naga
    public function update($id, $data)
    {
        $query = "UPDATE " . $this->table . "
                  SET nama_naga = :nama_naga, asal_negara = :asal_negara,
                      era = :era, warna = :warna, ciri_ciri = :ciri_ciri,
                      deskripsi = :deskripsi, gambar = :gambar
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nama_naga", $data['nama_naga']);
        $stmt->bindParam(":asal_negara", $data['asal_negara']);
        $stmt->bindParam(":era", $data['era']);
        $stmt->bindParam(":warna", $data['warna']);
        $stmt->bindParam(":ciri_ciri", $data['ciri_ciri']);
        $stmt->bindParam(":deskripsi", $data['deskripsi']);
        $stmt->bindParam(":gambar", $data['gambar']);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Hapus data naga
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Cari data naga berdasarkan nama/negara
    public function search($keyword)
    {
        $query = "SELECT * FROM " . $this->table . "
                  WHERE nama_naga LIKE :keyword OR asal_negara LIKE :keyword
                  ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $search = "%" . $keyword . "%";
        $stmt->bindParam(":keyword", $search);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
