<?php
require_once __DIR__ . "/../../config/Database.php";

class Mahasiswa {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conn;
    }

    public function insertMahasiswa($nama_mhs) {
        $query = "INSERT INTO mahasiswa (nama_mhs) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $nama_mhs);
        return $stmt->execute();
    }

    public function getAllMahasiswa() {
        $query = "SELECT * FROM mahasiswa";
        $result = $this->conn->query($query);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}

?>
