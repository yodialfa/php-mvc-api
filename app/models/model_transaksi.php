<?php


class model_transaksi 
{
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=db_cahaya';   //database source name

        try{
            $this ->dbh = new PDO ($dsn, 'root', '');
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    public function harga() {
        $query = 'SELECT * FROM pricelist';
        $this->stmt = $this->dbh->prepare($query);
        $this->stmt->execute(); 
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}