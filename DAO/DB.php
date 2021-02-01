<?php
    class DB
    {
        var $db_host = 'localhost';
        var $db_username = 'root';
        var $db_password = '';
        var $db_dbName = 'quanlysanpham';
        public function ExecuteQuery($sql)
        {
            $conn = mysqli_connect($this->db_host, $this->db_username, $this->db_password, $this->db_dbName) or die ('Cannot connect Database');
            mysqli_set_charset($conn,"utf8");
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);
            return $result;
        }

    }
?>