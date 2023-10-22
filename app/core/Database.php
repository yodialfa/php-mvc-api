<?php

	// Create a class Users
	// class Database {

    //     private $conn;

    //     public function __construct(Config $config) {
    //         $this->conn = $config->getConnection();
    //     }
    
    
    //     // Fetch all or a single user from database
    //     // public function fetch($id = 0) {
    //     //     $sql = 'SELECT * FROM karyawan';
    //     //     if ($id != 0) 
    //     //     {
    //     //         $sql .= ' WHERE id_karyawan = :id';
    //     //     }
    //     //     $stmt = $this->conn->prepare($sql);
    //     //     $stmt->execute([':id' => $id]);
    //     //     $rows = $stmt->fetchAll();
    //     //     return $rows;
    //     // }

    //     public function fetch($id=0) {
    //         $sql = 'SELECT * FROM karyawan';
    //         if ($id != 0) {
    //             $sql .= ' WHERE id_karyawan = '.$id;
    //         }
    //         $stmt = $this->conn->prepare($sql);
            
    //         if ($id != 0) {
    //             $stmt->execute(['id' => $id]);
    //         } else {
    //             $stmt->execute(); // No need to pass an empty array
    //             // $var_dump($id);
    //         }
            
    //         $rows = $stmt->fetchAll();
    //         return $rows;
    //     }
        
        
    //     // Insert an user in the database
    //     public function insert($nama_karyawan, $ttl, $cabang, $no_hp) {
    //         $sql = 'INSERT INTO karyawan (nama_karyawan, ttl, cabang, no_hp) VALUES (:nama_karyawan, :ttl, :cabang, :no_hp)';
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute(['nama_karyawan' => $nama_karyawan, 'ttl' => $ttl, 'cabang' => $cabang, 'no_hp' => $no_hp]);
    //         return true;
    //     }

    //     // Update an user in the database
    //     public function update($id, $nama_karyawan, $ttl, $cabang, $no_hp) {
    //         $sql = 'UPDATE karyawan SET nama_karyawan = :nama_karyawan, ttl = :ttl, cabang = :cabang, no_hp = :no_hp WHERE id_karyawan = :id';
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute(['nama_karyawan' => $nama_karyawan, 'ttl' => $ttl, 'cabang' => $cabang, 'no_hp' => $no_hp, 'id' => $id]);
    //         return true;
    //     }
        

    //     // Delete an user from database
    //     public function delete($id) {
    //         $sql = 'DELETE FROM karyawan WHERE id_karyawan = :id';
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute(['id' => $id]);
    //         return true;
    //     }
	// }


    class Database
    {
        private $db_host = 'localhost';
        private $db_name = 'db_cahaya';
        private $db_username = 'root';
        private $db_password = '';
        function __construct()
        {
            try {
                $dsn = "mysql:host={$this->db_host};dbname={$this->db_name};charset=utf8";
                $db_connection = new PDO($dsn, $this->db_username, $this->db_password);
                $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $db_connection;
            } catch (PDOException $e) {
                echo "Connection error " . $e->getMessage();
                exit;
            }
        }
    }

?>