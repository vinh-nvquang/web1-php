<?php
    class DonDatHangBUS
    {
        var $donDatHangDAO;
        public function __construct()
        {
            $this->donDatHangDAO = new DonDatHangDAO();
        }
        public function GetAll()
        {
            return $this->donDatHangDAO->GetAll();
        }
        public function GetByID($maDonDatHang)
        {
            return $this->donDatHangDAO->GetByID($maDonDatHang);
        }
        public function GetForChart()
        {
            return $this->donDatHangDAO->GetForChart();
        }
        public function GetMaxID()
        {
            return $this->donDatHangDAO->GetMaxID();
        }
        public function GetByName($hoadon)
        {
            return $this->donDatHangDAO->GetByName($hoadon);
        }
        public function GetByMaTaiKhoan($maTaiKhoan)
        {
            return $this->donDatHangDAO->GetByMaTaiKhoan($maTaiKhoan);
        }
        public function Insert($donDatHang)
        {
            return $this->donDatHangDAO->Insert($donDatHang);
        }
        public function Update($donDatHang)
        {
            return $this->donDatHangDAO->Update($donDatHang);
        }
    }
?>