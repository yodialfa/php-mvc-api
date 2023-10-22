<?php


use Config as Request;
use Config as Response;

class Karyawan extends Controller{

    public $header = 'Content-Type: application/json';

    public function setHeader() {
        return header($this->header);
    }


    public function index($id=0)
    {


        $this->setHeader();


        // $data['nama_karyawan'] = $this->model('model_karyawan')->get_karyawan();
        // $data['karyawan'] = $this->model('model_karyawan')->getAllKaryawan();
        // $this->view('templates/header');
        // $this->view('karyawan/index', $data);
        // $json_data = json_encode($this->model('model_karyawan', $id));
        // Echo the JSON data
        // echo $json_data;
        // $this->view('templates/footer');

        // var_dump($id); //cek
    



        $data['id'] = $id;

        if (Request::check("GET")) {
            $Karyawan = $this->model('model_karyawan'); // mencari class model_karyawan
            if ($id !== 0) {
                $Karyawan->read($id); // Membaca data dengan $id yang sudah ada
            } else {
                $Karyawan->read(); // Membaca semua data jika $id tidak diberikan
            }
        }
    }


    public function tambahkaryawan() {
        $allow_method = "POST";  //metode post untuk input data
        $this->setHeader();  //set header dari function setHeader() 
        if (Request::check("POST")) {
            $data = json_decode(file_get_contents("php://input")); //ambil parameter json
            if (
                !isset($data->nama_karyawan) || //cek apakah data ada dan sesuai
                !isset($data->ttl) ||
                !isset($data->cabang) ||
                !isset($data->no_hp)
            ) {
                $fields = [];
                if (!isset($data->nama_karyawan)) $fields['nama_karyawan'] = "Nama Karyawan"; //send notice untuk format pengisian
                if (!isset($data->ttl)) $fields['ttl'] = "Tanggal lahir format Y-m-d";
                if (!isset($data->cabang)) $fields['cabang'] = "Cabang (Gunakan Kode Cabang (1-9)";
                if (!isset($data->no_hp)) $fields['no_hp'] = "No handphone";
    
                Response::json(0, 400, "Please fill all the required fields", "fields", $fields);
            } else {
                $Karyawan = $this->model('model_karyawan'); //inisialisasi klass model_karyawan
                $Karyawan->create($data->nama_karyawan, $data->ttl, $data->cabang, $data->no_hp); //execute data untuk di insert dengan function create
            }
        }
    }

    public function updatekaryawan() {

        $allow_method = "PUT";
        $this->setHeader();  //set header dari function setHeader() 
        
    
        if (Request::check("PUT")) {
            $data = json_decode(file_get_contents("php://input"));
    
            $fields = [
                "id_karyawan" => "ID Karyawan (Required)",
                "nama_karyawan" => "Nama Karyawan (Optional)",
                "ttl" => " Tanggal Lahir format (Y m d) (Optional)",
                "cabang" => "Kode Cabang (integer) (Optional)",
                "no_hp" => "No Handphone (Optional)"
            ];
            
            if (!isset($data->id_karyawan) || !is_numeric($data->id_karyawan)) {
                echo json_encode($data);
                // Response::json(0, 400, "Please provide a valid Karyawan ID.", "id_karyawan", "ID Karyawan (Required)");
            }
            
    
            $karyawan = $this->model('model_karyawan');
            $karyawan->update($data->id_karyawan, $data);
        }
    }


    public function deletekaryawan()
    {

        $allow_method = "DELETE";
        
        if (Request::check("DELETE")) {
            $data = json_decode(file_get_contents("php://input"));
            if (!isset($data->id_karyawan) || !is_numeric($data->id_karyawan)) {
                Response::json(0, 400, "Please provide a valid Karyawan ID (id_karyawan).");
            }
            
            $karyawan = $this->model('model_karyawan');
            $karyawan->delete($data->id_karyawan);
        }
    }
    
    
}

    



