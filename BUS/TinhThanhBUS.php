<?php
    class TinhThanhBUS
    {
        var $tinhThanhDAO;
        public function __construct()
        {
            $this->tinhThanhDAO = new TinhThanhDAO();
        }

        public function GetAll()
        {
            return $this->tinhThanhDAO->GetAll();
        }
    }
?>