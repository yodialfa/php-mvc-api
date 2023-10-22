<?php


use Config as Response;
class model_karyawan extends Database {
    // private $dbh; //database handler
    // private $stmt; //statments
//     private $dbh;

//     public function __construct($id_kar =0)
//     {
//         // $database = new Database(); // instansiasi database dari class Database
//         // try {
//         //     $this->dbh = $database->getConnection(); // database handler
//         // } catch(PDOException $e) {
//         //     die($e->getMessage()); //tampilkan jika eror koneksi db
//         // } 


   

//         //     public function getAllKaryawan()
//         //     {
//         //         $query = 'SELECT * FROM karyawan';
//         //         $this->stmt = $this->dbh->prepare($query);
//         //         $this->stmt->execute(); 
//         //         return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
//         //     }

//         //     public  function getAllKaryawan()
//         //     {
//         //       $query="SELECT * FROM karyawan";
//         //       $this->stmt = $this->dbh->prepare($query);
//         //       $data=array();
//         //       $result=$mysqli->query($query);
//         //       while($row=mysqli_fetch_object($result))
//         //       {
//         //          $data[]=$row;
//         //       }
//         //       $response=array(
//         //                      'status' => 1,
//         //                      'message' =>'Get List Mahasiswa Successfully.',
//         //                      'data' => $data
//         //                   );
//         //       header('Content-Type: application/json');
//         //       echo json_encode($response);
//         //    }
 

//             // $this->db = new Database($config); // Pass the Config instance to the Database constructor
        
//         $config = new Config();
//         // Create object of Users class
//         $karyawan = new Database($config);

//         // create a api variable to get HTTP method dynamically
//         $api = $_SERVER['REQUEST_METHOD'];

//         // get id from url
//         // $id = intval($_GET['id'] ?? '');
//         $this->id_kar = $id_kar;

//         // Get all or a single karyawan from database
//         if ($api == 'GET') {
//             if ($this->id_kar != 0) {
//                 $data = $karyawan->fetch($this->id_kar);
//                 // var_dump($id);
//             } else {
//                 $data = $karyawan->fetch();
//                 // echo 'test';
//             }
//             echo json_encode($data);
//         }

// 	// Add a new karyawan into database
// 	if ($api == 'POST') {
// 	  $nama_karyawan = $config->test_input($_POST['nama_karyawan']);
// 	  $ttl = $config->test_input($_POST['ttl']);
// 	  $cabang = $config->test_input($_POST['cabang']);
// 	  $no_hp = $config->test_input($_POST['no_hp']);

// 	  if ($config->insert($nama_karyawan, $ttl, $cabang, $no_hp)) {
// 	    echo $config->message('karyawan added successfully!',false);
// 	  } else {
// 	    echo $config->message('Failed to add an karyawan!',true);
// 	  }
// 	}

// 	// Update an karyawan in database
// 	if ($api == 'PUT') {
// 	  parse_str(file_get_contents('php://input'), $post_input);

// 	  $nama_karyawan = $karyawan->test_input($post_input['nama_karyawan']);
// 	  $ttl = $karyawan->test_input($post_input['ttl']);
// 	  $cabang = $karyawan->test_input($post_input['cabang']);
// 	  $no_hp = $karyawan->test_input($post_input['no_hp']);

// 	  if ($id != null) {
// 	    if ($karyawan->update($nama_karyawan, $ttl, $cabang, $no_hp, $id)) {
// 	      echo $karyawan->message('karyawan updated successfully!',false);
// 	    } else {
// 	      echo $karyawan->message('Failed to update an karyawan!',true);
// 	    }
// 	  } else {
// 	    echo $karyawan->message('karyawan not found!',true);
// 	  }
// 	}

// 	// Delete an karyawan from database
// 	if ($api == 'DELETE') {
// 	  if ($id != null) {
// 	    if ($karyawan->delete($id)) {
// 	      echo $karyawan->message('karyawan deleted successfully!', false);
// 	    } else {
// 	      echo $karyawan->message('Failed to delete an karyawan!', true);
// 	    }
// 	  } else {
// 	    echo $karyawan->message('User not found!', true);
// 	  }
// 	}
// }




    private $DB;

    function __construct()
    {
        $this->DB = Database::__construct();
    }

    private function filter($data)
    {
        return htmlspecialchars(trim(htmlspecialchars_decode($data)), ENT_NOQUOTES);
    }

    // Create a new post
    // public function create(string $nama_kar, string $ttl, int $cabang, string $no_hp)
    // {
    //     // $id = $this->filter($id);
    //     $nama_kar = $this->filter($nama_kar);
    //     $ttl = new $ttl;
    //     $ttl->format("Y/m/d");
    //     $ttl = $this->filter($ttl);
    //     $cabang = $this->filter($cabang);
    //     $no_hp = $this->filter($no_hp);

    //     try {
    //         $sql = "INSERT INTO `karyawan` (`id_karyawan`,`nama_karyawan`,`ttl`,`cabang`,`no_hp`) 
    //         VALUES ('',:nama_kar,:ttl,:cabang,:no_hp)";
    //         $stmt = $this->DB->prepare($sql);

    //         $stmt->bindParam(":nama_kar", $nama_kar, PDO::PARAM_STR);
    //         $stmt->bindParam(":ttl", $ttl, PDO::PARAM_STR);
    //         $stmt->bindParam(":cabang", $cabang, PDO::PARAM_INT);
    //         $stmt->bindParam(":no_hp", $no_hp, PDO::PARAM_STR);
            

    //         $stmt->execute();

    //         $last_id = $this->DB->lastInsertId();
    //         Response::json(1, 201, "Post has been created successfully", "nama_kar", $last_id);

    //     } catch (PDOException $e) {
    //         Response::json(0, 500, $e->getMessage());
    //     }
    // }






    public function create(string $nama_karyawan, string $ttl, int $cabang, string $no_hp) {
      // Validation
      if (empty($nama_karyawan) || empty($ttl) || empty($cabang) || empty($no_hp)) {
          $fields = [];
          if (empty($nama_karyawan)) $fields['nama_karyawan'] = "Nama Karyawan";
          if (empty($ttl)) $fields['ttl'] = "Tanggal lahir format Y-m-d";
          if (empty($cabang)) $fields['cabang'] = "Cabang";
          if (empty($no_hp)) $fields['no_hp'] = "No handphone";
  
          Response::json(0, 400, "Oops! empty field detected.", "empty_fields", $fields);
          return;
      }
  
      // Data filtering
      $nama_karyawan = $this->filter($nama_karyawan);
      $ttl = date("Y-m-d", strtotime($ttl)); // Format date
      $cabang = $this->filter($cabang);
      $no_hp = $this->filter($no_hp);
  
      try {
          $sql = "INSERT INTO `karyawan` (`nama_karyawan`,`ttl`,`cabang`,`no_hp`) 
              VALUES (:nama_karyawan, :ttl, :cabang, :no_hp)";
          $stmt = $this->DB->prepare($sql);
  
          $stmt->bindParam(":nama_karyawan", $nama_karyawan, PDO::PARAM_STR);
          $stmt->bindParam(":ttl", $ttl, PDO::PARAM_STR);
          $stmt->bindParam(":cabang", $cabang, PDO::PARAM_INT);
          $stmt->bindParam(":no_hp", $no_hp, PDO::PARAM_STR);
  
          $stmt->execute();
  
          $last_id = $this->DB->lastInsertId();
          Response::json(1, 201, "Record has been created successfully", "nama_karyawan", $last_id);
      } catch (PDOException $e) {
          Response::json(0, 500, $e->getMessage());
      }
  }
  

    // Fetch all posts or Get data through the  id_karyawan
    public function read($id = false, $return = false)
    {
        try {
            $sql = "SELECT * FROM `karyawan`";
            // If  id_karyawan is provided
            if ($id !== false) {
                //  id_karyawan must be a number
                if (is_numeric($id)) {
                    $sql = "SELECT * FROM `karyawan` WHERE `id_karyawan`='$id'";
                } else {
                    Response::_404();
                }
            }
            $query = $this->DB->query($sql);
            if ($query->rowCount() > 0) {
                $allPosts = $query->fetchAll(PDO::FETCH_ASSOC);
                // If ID is Provided, send a single record.
                if ($id !== false) {
                    // IF $return is true then return the single record
                    if ($return) return $allPosts[0];
                    Response::json(1, 200, null, "karyawan", $allPosts[0]);
                }
                Response::json(1, 200, null, "karyawan", $allPosts);
            }
            // If id_karyawan does not exist in the database
            if ($id !== false) {
                Response::_404();
            }
            // If there are no records in the database.
            Response::json(1, 200, "Please Insert Some posts...", "posts", []);
        } catch (PDOException $e) {
            Response::json(0, 500, $e->getMessage());
        }
    }




  //   public function create(string $nama_kar, string $ttl, int $cabang, string $no_hp) {
  //     try {
  //         // SQL query without specifying id_karyawan (assuming it's auto-increment)
  //         $sql = "INSERT INTO `karyawan` (`nama_karyawan`, `ttl`, `cabang`, `no_hp`) 
  //                 VALUES (:nama_kar, :ttl, :cabang, :no_hp)";
  //         $stmt = $this->DB->prepare($sql);
  
  //         // Bind parameters
  //         $stmt->bindParam(":nama_kar", $nama_kar, PDO::PARAM_STR);
  //         $stmt->bindParam(":ttl", $ttl, PDO::PARAM_STR);
  //         $stmt->bindParam(":cabang", $cabang, PDO::PARAM_INT);
  //         $stmt->bindParam(":no_hp", $no_hp, PDO::PARAM_STR);
  
  //         // Execute the query
  //         $stmt->execute();
  
  //         // Rest of your code
  //     } catch (PDOException $e) {
  //         Response::json(0, 500, $e->getMessage());
  //     }
  // }
  





  

    // Update an existing post
    public function update(int $id, Object $data)
    {
        try 
        {
              $sql = "SELECT * FROM `karyawan` WHERE `id_karyawan` = :id";
              $stmtSelect = $this->DB->prepare($sql);
              $stmtSelect->bindParam(":id", $id, PDO::PARAM_INT);
              $stmtSelect->execute();
              $karyawanRecord = $stmtSelect->fetch();

              if (!$karyawanRecord) {
                  Response::json(0, 404, "Karyawan with ID $id not found");
                  return;
              }
              // Your update SQL statement here
              $updateSql = "UPDATE karyawan SET nama_karyawan = :nama_karyawan, ttl = :ttl, cabang = :cabang, no_hp = :no_hp WHERE id_karyawan = :id";
              $stmt = $this->DB->prepare($updateSql);

              // Bind parameters and execute the query
              $stmt->bindParam(":id", $id, PDO::PARAM_INT);
              $stmt->bindParam(":nama_karyawan", $data->nama_karyawan, PDO::PARAM_STR);
              $stmt->bindParam(":ttl", $data->ttl, PDO::PARAM_STR);
              $stmt->bindParam(":cabang", $data->cabang, PDO::PARAM_INT);
              $stmt->bindParam(":no_hp", $data->no_hp, PDO::PARAM_STR);
      
              $stmt->execute();
    
              // Return a success response
              Response::json(1, 200, "Karyawan updated successfully");
            } catch (PDOException $e) { 
              // Handle database error and return an error response
              Response::json(0, 500, "An error occurred: " . $e->getMessage());
            }
          }
      

    //         // Check if the record exists before attempting to update
    //         $sql = "SELECT * FROM `karyawan` WHERE `id_karyawan` = :id";
    //         $stmtSelect = $this->DB->prepare($sql);
    //         $stmtSelect->bindParam(":id", $id, PDO::PARAM_INT);
    //         $stmtSelect->execute();
    //         $karyawanRecord = $stmtSelect->fetch();

    //         if (!$karyawanRecord) {
    //             Response::json(0, 404, "Karyawan with ID $id not found");
    //             return;
    //         }

    //         // Your update SQL statement here
    //         $updateSql = "UPDATE karyawan SET ";
    //         $params = [];

    //         if (property_exists($data, 'nama_karyawan')) {
    //             $updateSql .= "nama_karyawan = :nama_karyawan, ";
    //             $params[":nama_karyawan"] = $data->nama_karyawan;
    //         }
            
    
    //         if (isset($data->ttl)) {
    //           $ttl = $data->ttl;
              
    //           // Check if 'ttl' is a valid date
    //           if (strtotime($ttl) === false) {
    //               Response::json(0, 400, "Invalid date format for 'ttl'. Use 'Y-m-d' format.");
    //               return;
    //           }
              
    //           // Continue with the update
    //           $updateSql .= "ttl = :ttl, ";
    //           $params[":ttl"] = $ttl;
    //         }
          

    //         if (property_exists($data, 'cabang')) {
    //             $updateSql .= "cabang = :cabang, ";
    //             $params[":cabang"] = $data->cabang;
    //         }

    //         if (property_exists($data, 'no_hp')) {
    //             $updateSql .= "no_hp = :no_hp, ";
    //             $params[":no_hp"] = $data->no_hp;
    //         }




    //         // Remove the trailing comma and space
    //         $updateSql = rtrim($updateSql, ", ");

    //         $updateSql .= " WHERE id_karyawan = :id";
    //         $params[":id"] = $id;

    //         $stmt = $this->DB->prepare($updateSql);

    //         // Bind parameters and execute the query
    //         foreach ($params as $param => $value) {
    //             $stmt->bindParam($param, $value, PDO::PARAM_STR);
    //         }

    //         $stmt->execute();

    //         // Return a success response
    //         Response::json(1, 200, "Karyawan updated successfully");
    //     } catch (PDOException $e) 
    //     {

    //         // Handle database error and return an error response
    //         Response::json(0, 500, "An error occurred: " . $e->getMessage());
    //     }
    // }




    // // Delete a Post
    public function delete(int $id)
    {
        try {
            $sql =  "DELETE FROM `karyawan` WHERE `id_karyawan`=:id";
            $stmt = $this->DB->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                Response::json(1, 200, "Karyawan has been deleted successfully.");
            } else {
                Response::json(0, 404, "No records were deleted. Invalid ID or no matching record found.");
            }
        } catch (PDOException $e) {
            Response::json(0, 500, $e->getMessage());
        }
    }

}
