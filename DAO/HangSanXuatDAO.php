<?php
    class HangSanXuatDAO extends DB
    {
        public function GetAll()
        {
            $sql = "select MaHangSanXuat, TenHangSanXuat, BiXoa from hangsanxuat";
            $result = $this->ExecuteQuery($sql);
            $lstHangSanXuat = array();
            while( $row = mysqli_fetch_array($result))
            {
                extract($row);
                $hangSanXuat = new LoaiSanPhamDTO();
                $hangSanXuat->MaHangSanXuat = $MaHangSanXuat;
                $hangSanXuat->TenHangSanXuat = $TenHangSanXuat;
                $hangSanXuat->BiXoa = $BiXoa;
                $lstHangSanXuat[] = $hangSanXuat;
            }
            return $lstHangSanXuat;
        }
        public function GetAllAvailable()
        {
            $sql = "select MaHangSanXuat, TenHangSanXuat, BiXoa from hangsanxuat where BiXoa = 0";
            $result = $this->ExecuteQuery($sql);
            $lstHangSanXuat = array();
            while( $row = mysqli_fetch_array($result))
            {
                extract($row);
                $hangSanXuat = new LoaiSanPhamDTO();
                $hangSanXuat->MaHangSanXuat = $MaHangSanXuat;
                $hangSanXuat->TenHangSanXuat = $TenHangSanXuat;
                $hangSanXuat->BiXoa = $BiXoa;
                $lstHangSanXuat[] = $hangSanXuat;
            }
            return $lstHangSanXuat;
        }
        public function GetByID($maHangSanXuat)
        {
            $sql = "select MaHangSanXuat, TenHangSanXuat, BiXoa from hangsanxuat where MaHangSanXuat = $maHangSanXuat";
            $result = $this->ExecuteQuery($sql);
            if($result == null)
                return null;
            $row = mysqli_fetch_array($result);
            extract($row);
            $hangSanXuat = new LoaiSanPhamDTO();
            $hangSanXuat->MaHangSanXuat = $MaHangSanXuat;
            $hangSanXuat->TenHangSanXuat = $TenHangSanXuat;
            $hangSanXuat->BiXoa = $BiXoa;
            return $hangSanXuat;
        }
        public function GetByMaLoaiSanPham($maLoaiSanPham)
        {
            $sql = "select hsx.MaHangSanXuat, TenHangSanXuat, BiXoa from hangsanxuat hsx, hangsxcualoaisp hsp where hsp.MaHangSanXuat = hsx.MaHangSanXuat and hsp.MaLoaiSanPham = $maLoaiSanPham and  hsx.BiXoa = 0";
            $result = $this->ExecuteQuery($sql);
            $lstHangSanXuat = array();
            while( $row = mysqli_fetch_array($result))
            {
                extract($row);
                $hangSanXuat = new LoaiSanPhamDTO();
                $hangSanXuat->MaHangSanXuat = $MaHangSanXuat;
                $hangSanXuat->TenHangSanXuat = $TenHangSanXuat;
                $hangSanXuat->BiXoa = $BiXoa;
                $lstHangSanXuat[] = $hangSanXuat;
            }
            return $lstHangSanXuat;
        }
        public function GetByName($tenHangSanXuat)
        {
            $sql = "select MaHangSanXuat, TenHangSanXuat, BiXoa from hangsanxuat where TenHangSanXuat like '%$tenHangSanXuat%'";
            $result = $this->ExecuteQuery($sql);
            if($result == null)
            {
                return null;
            }
            else
            {
                $lstHangSanXuat = array();
                while( $row = mysqli_fetch_array($result))
                {
                    if($row == null)
                    {
                        return null;
                    }
                    extract($row);
                    $hangSanXuat = new HangSanXuatDTO();
                    $hangSanXuat->MaHangSanXuat = $MaHangSanXuat;
                    $hangSanXuat->TenHangSanXuat = $TenHangSanXuat;
                    $hangSanXuat->BiXoa = $BiXoa;
                    $lstHangSanXuat[] = $hangSanXuat;
                }
                return $lstHangSanXuat;
            }            
        }
        public function GetMaxID()
        {
            $sql = "select MAX(MaHangSanXuat) from HangSanXuat";
            $result = $this->ExecuteQuery($sql);
            $row = mysqli_fetch_array($result);
            return $row[0];
        }
        public function Insert($hangSanXuat)
        {
            $sql = "insert into hangsanxuat(MaHangSanXuat, TenHangSanXuat, LogoURL, BiXoa) values($hangSanXuat->MaHangSanXuat, '$hangSanXuat->TenHangSanXuat', '', $hangSanXuat->BiXoa)";
            return $this->ExecuteQuery($sql);
        }
        public function Delete($hangSanXuat)
        {
            $sql = "delete from hangsanxuat where MaHangSanXuat = $hangSanXuat->MaHangSanXuat";
            $this->ExecuteQuery($sql);
        }
        public function SetDelete($hangSanXuat)
        {
            $sql = "update hangsanxuat set BiXoa = 1 where MaHangSanXuat = $hangSanXuat->MaHangSanXuat";
            $this->ExecuteQuery($sql);
        }
        public function UnsetDelete($hangSanXuat)
        {
            $sql = "update hangsanxuat set BiXoa = 0 where MaHangSanXuat = $hangSanXuat->MaHangSanXuat";
            $this->ExecuteQuery($sql);
        }
        public function Update($hangSanXuat)
        {
            $sql = "update hangsanxuat set TenHangSanXuat = '$hangSanXuat->TenHangSanXuat' where MaHangSanXuat = $hangSanXuat->MaHangSanXuat";
            return $this->ExecuteQuery($sql);
        }
        public function DemSoLuongSanPhamThuocHang($maHangSanXuat)
        {
            $sql = "select count(MaSanPham) from sanpham where MaHangSanXuat = $maHangSanXuat";
            $result = $this->ExecuteQuery($sql);
            $row = mysqli_fetch_array($result);
            return $row[0];
        }
    }
?>