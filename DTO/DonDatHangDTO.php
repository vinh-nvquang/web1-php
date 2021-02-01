<?php
    class DonDatHangDTO
    {
        var $MaDonDatHang;
        var $NgayLap;
        var $TongThanhTien;
        var $MaTaiKhoan;
        var $MaTinhTrang;
        public function __construct()
        {
            $this->MaDonDatHang = null;
            $this->NgayLap = getdate();
            $this->TongThanhTien = 0;
            $this->MaTaiKhoan = null;
            $this->MaTinhTrang = null;
        }
    }
?>