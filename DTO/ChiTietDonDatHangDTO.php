<?php
    class ChiTietDonDatHangDTO
    {
        var $MaChiTietDonDatHang;
        var $SoLuong;
        var $GiaBan;
        var $MaDonDatHang;
        Var $MaSanPham;
        public function __construct()
        {
            $this->MaChiTietDonDatHang = null;
            $this->SoLuong = 0;
            $this->GiaBan = 0;
            $this->MaDonDatHang = null;
            $this->MaSanPham = null;
        }
    }
?>