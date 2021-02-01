<?php
    class HSXCuaLSPBUS
    {
        var $hSXCuaLSPDAO;
        public function __construct()
        {
            $this->hSXCuaLSPDAO = new HSXCuaLSPDAO();
        }
        public function GetAll()
        {
            return $this->hSXCuaLSPDAO->GetAll();
        }
        public function GetByMaLoaiSanPham($maLoaiSanPham)
        {
            return $this->hSXCuaLSPDAO->GetByMaLoaiSanPham($maLoaiSanPham);
        }
        public function Insert($maLoaiSanPham, $maHangSanXuat)
        {
            $hSXCuaLSP= new HSXCuaLSPDTO();
            $hSXCuaLSP->MaLoaiSanPham = $maLoaiSanPham;
            $hSXCuaLSP->MaHangSanXuat = $maHangSanXuat;
            return $this->hSXCuaLSPDAO->Insert($hSXCuaLSP);
        }
        public function Delete($maLoaiSanPham, $maHangSanXuat)
        {
            $hSXCuaLSP= new HSXCuaLSPDTO();
            $hSXCuaLSP->MaLoaiSanPham = $maLoaiSanPham;
            $hSXCuaLSP->MaHangSanXuat = $maHangSanXuat;
            $this->hSXCuaLSPDAO->Delete($hSXCuaLSP);
        }
    }
?>