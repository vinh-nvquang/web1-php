<?php
    class ChiTietDonDatHangBUS{
        var $chiTietDonDatHangDAO;
        public function __construct()
        {
            $this->chiTietDonDatHangDAO = new ChiTietDonDatHangDAO();
        }

        public function GetAll()
        {

            return $this->chiTietDonDatHangDAO->GetAll();
        }

        public function GetByID($maChiTietDonDatHang)
        {
            return $this->chiTietDonDatHangDAO->GetByID($maChiTietDonDatHang);
        }
        public function GetByMaDonDatHang($maDonDatHang)
        {
            return $this->chiTietDonDatHangDAO->GetByMaDonDatHang($maDonDatHang);
        }
        public function Insert($chiTietDonDatHang)
        {
            return $this->chiTietDonDatHangDAO->Insert($chiTietDonDatHang);
        }

        public function Delete($maChiTietDonDatHang)
        {
            return $this->chiTietDonDatHangDAO->Delete($maChiTietDonDatHang);
        }
        
        public function Update($maChiTietDonDatHang)
        {
            $chiTietDonDatHang = new ChiTietDonDatHangDTO();
            $chiTietDonDatHang ->MaChiTietDonDatHang = $maChiTietDonDatHang;
            $this->ChiTietDonDatHangDAO->Update($maChiTietDonDatHang);
        }
    }

?>