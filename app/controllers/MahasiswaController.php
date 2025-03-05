<?php
require_once __DIR__ . "/../models/Mahasiswa.php";

class MahasiswaController {
    private $model;

    public function __construct() {
        $this->model = new Mahasiswa();
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama_mhs = $_POST["nama_mhs"];
            if ($this->model->insertMahasiswa($nama_mhs)) {
                header("Location: ../../public/index.php"); // Redirect setelah insert
                exit();
            } else {
                echo "Gagal menyimpan data";
            }
        }
    }

    public function index() {
        return $this->model->getAllMahasiswa();
    }
}

// Jika request berasal dari form insert, jalankan store()
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new MahasiswaController();
    $controller->store();
}
?>
