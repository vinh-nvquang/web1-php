<?php
    class LoaiSanPhamDTO
    {
        var $MaLoaiSanPham;
        var $TenLoaiSanPham;
        var $BiXoa;
        public function __construct()
        {
            $this->MaLoaiSanPham = null;
            $this->TenLoaiSanPham = '';
            $this->BiXoa = 0;
        }

    }
?>