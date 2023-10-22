<?php
// class Config {
//     private const DBHOST = 'localhost';
//     private const DBUSER = 'root';
//     private const DBPASS = '';
//     private const DBNAME = 'db_cahaya';

//     private $dsn = 'mysql:host=' . self::DBHOST . ';dbname=' . self::DBNAME;
    
//     protected $conn = null;

//     public function getConn() {
//         return $this->conn;
//     }

//     public function __construct($conn = null) {
//         if ($conn === null) {
//             try {
//                 $this->conn = new PDO($this->dsn, self::DBUSER, self::DBPASS);
//                 $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//             } catch (PDOException $e) {
//                 die('Connection Failed : ' . $e->getMessage());
//             }
//         } else {
//             $this->conn = $conn;
//         }
//     }


//     public function getConnection() {
//         return $this->conn;
//     }

//     public function test_input($data) {
//         $data = strip_tags($data);
//         $data = htmlspecialchars($data);
//         $data = stripslashes($data);
//         $data = trim($data);
//         return $data;
//     }

//     public function message($content, $status) {
//         return json_encode(['message' => $content, 'error' => $status]);
//     }
// }

class Config
{
    // Checking the Request Method
    static function check($req)
    {
        if ($_SERVER["REQUEST_METHOD"] === $req) {
            return true;
        }
        static::json(0, 405, "Invalid Request Method. HTTP method should be $req");
    }

    // Returns the response in JSON format
    static function json(int $ok, $status, $msg, $key = false, $value = false)
    {
        $res = ["ok" => $ok];
        if ($status !== null){
            http_response_code($status);
            $res["status"] = $status;
        }
        if ($msg !== null) $res["message"] = $msg;
        if($value){
            if($key){
                $res[$key] = $value;
            }
            else{
                $res["data"] = $value;
            }
        }
        echo json_encode($res);
        exit;
    }

    // Returns the 404 Not found
    static function _404(){
        static::json(0,404,"Not Found!");
    }

}
