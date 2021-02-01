<?php
    class TinhTrangBUS
    {
        var $tinhTrangDAO;
        public function __construct()
        {
            $this->tinhTrangDAO = new TinhTrangDAO();
        }

        public function GetAll()
        {
            return $this->tinhTrangDAO->GetAll();
        }

        public function GetAllAvailable()
        {
            return $this->tinhTrangDAO->GetAllAvailable();
        }

        public function GetByID($maTinhTrang)
        {
            return $this->tinhTrangDAO->GetByID($maTinhTrang);
        }

        public function Insert($tinhTrang)
        {
            $this->tinhTrangDAO->Insert($tinhTrang);
        }

        public function InsertWithName($tenTinhTrang)
        {
            $tinhTrang = new TinhTrangDTO();
            $tinhTrang->TenTinhTrang = $tenTinhTrang;
            $this->tinhTrangDAO->Insert($tinhTrang);
        }
        
        public function Update($TenTinhTrang)
        {
            $tinhTrang  = new TinhTrangDTO();
            $tinhTrang->TenTinhTrang = $TenTinhTrang;
            $this->tinhTrangDAO->Update($tinhTrang);
        }
    }
?>