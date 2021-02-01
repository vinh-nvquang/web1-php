<?php
    class ChiTietDonDatHangDAO extends DB
    {
        public function GetAll()
        {
            $sql = "select MaChiTietDonDatHang, SoLuong, GiaBan, MaDonDatHang, MaSanPham from chitietdonhang";
            $result = $this->ExecuteQuery($sql);
            $lstChiTietDonDatHang= array();
            while($row = mysqli_fetch_array($result))
            {
                extract($row);
                $chiTietDonDatHang= new ChiTietDonDatHangDTO();
                $chiTietDonDatHang->MaChiTietDonDatHang = $MaChiTietDonDatHang;
                $chiTietDonDatHang->SoLuong=$SoLuong;
                $chiTietDonDatHang->GiaBan=$GiaBan;
                $chiTietDonDatHang->MaDonDatHang=$MaDonDatHang;
                $chiTietDonDatHang->MaSanPham=$MaSanPham;
                $lstChiTietDonDatHang[] = $chiTietDonDatHang;
            }
            return $lstChiTietDonDatHang;
        }
        public function GetByID($maChiTietDonDatHang)
        {
            $sql = "select MaChiTietDonDatHang, SoLuong, GiaBan, MaDonDatHang, MaSanPham from chitietdonhang where MaChiTietDonDatHang = $maChiTietDonDatHang";
            $result = $this->ExecuteQuery($sql);
            if($result == null)
            {
                return null;
            }
            else
            {
                $row = mysqli_fetch_array($result);
                extract($row);
                if($row ==null)
                {
                    return null;
                }
                else
                {
                    $chiTietDonDatHang= new ChiTietDonDatHangDTO();
                    $chiTietDonDatHang->MaChiTietDonDatHang = $MaChiTietDonDatHang;
                    $chiTietDonDatHang->SoLuong=$SoLuong;
                    $chiTietDonDatHang->GiaBan=$GiaBan;
                    $chiTietDonDatHang->MaDonDatHang=$MaDonDatHang;
                    $chiTietDonDatHang->MaSanPham=$MaSanPham;
                    return $chiTietDonDatHang;
                }
            }
        }
        public function GetByMaDonDatHang($maDonDatHang)
        {
            $sql = "select MaChiTietDonDatHang, SoLuong, GiaBan, MaDonDatHang, MaSanPham from chitietdonhang where MaDonDatHang = $maDonDatHang";
            $result = $this->ExecuteQuery($sql);
            $lstChiTietDonDatHang= array();
            while($row = mysqli_fetch_array($result))
            {
                extract($row);
                $chiTietDonDatHang= new ChiTietDonDatHangDTO();
                $chiTietDonDatHang->MaChiTietDonDatHang = $MaChiTietDonDatHang;
                $chiTietDonDatHang->SoLuong=$SoLuong;
                $chiTietDonDatHang->GiaBan=$GiaBan;
                $chiTietDonDatHang->MaDonDatHang=$MaDonDatHang;
                $chiTietDonDatHang->MaSanPham=$MaSanPham;
                $lstChiTietDonDatHang[] = $chiTietDonDatHang;
            }
            return $lstChiTietDonDatHang;
        }
        public function Insert($chiTietDonDatHang)
        {
            $sql ="insert into chitietdonhang(MaChiTietDonDatHang, SoLuong, GiaBan, MaDonDatHang, MaSanPham) values ('$chiTietDonDatHang->MaChiTietDonDatHang', $chiTietDonDatHang->SoLuong, $chiTietDonDatHang->GiaBan, '$chiTietDonDatHang->MaDonDatHang', $chiTietDonDatHang->MaSanPham)";
            return $this->ExecuteQuery($sql);
        }

        public function Delete ($maChiTietDonDatHang)
        {
            $sql = "delete from chitietdonhang where MaChiTietDonHang = $maChiTietDonHang";
            $this -> ExecuteQuery($sql);
        }

        public function Update($chiTietDonDatHang)
        {
            $sql = "select chitietdonhang set MaChiTietDonDatHang= $chiTietDonDatHang->MaChiTietDonDangHang where $chiTietDonDatHang->MaChiTietDonDatHang";
            $this -> ExecuteQuery($sql); 
        }
    }

?>