<?php
    class HSXCuaLSPDAO extends DB
    {
        public function GetAll()
        {
            $sql = "select MaLoaiSanPham, MaHangSanXuat from hangsxcualoaisp";
            $result = $this->ExecuteQuery($sql);
            $lstHSXCuaLSP = array();
            while( $row = mysqli_fetch_array($result))
            {
                extract($row);
                $hSXCuaLSP= new HSXCuaLSPDTO();
                $hSXCuaLSP->MaLoaiSanPham = $MaLoaiSanPham;
                $hSXCuaLSP->MaHangSanXuat = $MaHangSanXuat;
            }
            return $lstHSXCuaLSP;
        }
        public function GetByMaLoaiSanPham($maLoaiSanPham)
        {
            $sql = "select MaLoaiSanPham, MaHangSanXuat from hangsxcualoaisp where MaLoaiSanPham = $maLoaiSanPham";
            $result = $this->ExecuteQuery($sql);
            $lstHSXCuaLSP = array();
            while( $row = mysqli_fetch_array($result))
            {
                extract($row);
                $hSXCuaLSP= new HSXCuaLSPDTO();
                $hSXCuaLSP->MaLoaiSanPham = $MaLoaiSanPham;
                $hSXCuaLSP->MaHangSanXuat = $MaHangSanXuat;
            }
            return $lstHSXCuaLSP;
        }
        public function Insert($hSXCuaLSP)
        {
            $sql = "insert into hangsxcualoaisp(MaLoaiSanPham, MaHangSanXuat) values($hSXCuaLSP->MaLoaiSanPham, $hSXCuaLSP->MaHangSanXuat)";
            $this->ExecuteQuery($sql);
        }
        public function Delete($hSXCuaLSP)
        {
            $sql = "delete from hangsxcualoaisp where MaLoaiSanPham = $hSXCuaLSP->MaLoaiSanPham and MaHangSanXuat = $hSXCuaLSP->MaHangSanXuat";
            $this->ExecuteQuery($sql);
        }
    }
?>