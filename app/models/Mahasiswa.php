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
    public function getMahasiswaById($id_mhs) {
        $query = "SELECT * FROM mahasiswa WHERE id_mhs = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id_mhs);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    public function updateMahasiswa($id_mhs, $nama_mhs) {
        $query = "UPDATE mahasiswa SET nama_mhs = ? WHERE id_mhs = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $nama_mhs, $id_mhs);
        return $stmt->execute();
    }
    public function deleteMahasiswa($id_mhs) {
        $query = "DELETE FROM mahasiswa WHERE id_mhs = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id_mhs);
        return $stmt->execute();
    }
    
}

?>
