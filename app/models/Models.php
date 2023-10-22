<?php

class model extends Connection
{
    protected function getAllKaryawan()
    {
        $sql = "SELECT * FROM karyawan";
        $result = $this->connect()->query($sql);   //call funct   default sql
        if ($result->num_rows >0 )
        {
            while ($data = mysqli_fetch_assoc($result))
            {
                $karyawan[] = $data;
            }
            return $karyawan;
        }
    }
}


?>