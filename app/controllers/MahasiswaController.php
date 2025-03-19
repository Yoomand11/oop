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
    public function edit($id_mhs) {
        return $this->model->getMahasiswaById($id_mhs);
    }
    
    public function update() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_mhs = $_POST["id_mhs"];
            $nama_mhs = $_POST["nama_mhs"];
            if ($this->model->updateMahasiswa($id_mhs, $nama_mhs)) {
                header("Location: ../../public/index.php"); // Redirect ke index setelah update
                exit();
            } else {
                echo "Gagal mengupdate data";
            }
        }
    }
    
    public function delete() {
        if (isset($_GET["id"])) {
            $id_mhs = $_GET["id"];
            if ($this->model->deleteMahasiswa($id_mhs)) {
                header("Location: ../../public/index.php"); // Redirect ke index setelah delete
                exit();
            } else {
                echo "Gagal menghapus data";
            }
        }
    }  
    
}

// Jika request berasal dari form insert, jalankan store()
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new MahasiswaController();
    $controller->store();
}
if (isset($_POST["id_mhs"])) {
    $controller = new MahasiswaController();
    $controller->update();
}
?>
