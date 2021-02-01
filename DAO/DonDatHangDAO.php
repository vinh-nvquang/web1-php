<?php
    class DonDatHangDAO extends DB
    {
        public function GetAll()
        {
            $sql = "select MaDonDatHang, NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang from dondathang";
            $result = $this->ExecuteQuery($sql);
            $lstDonDatHang = array();
            while( $row = mysqli_fetch_array($result))
            {
                extract($row);
                $donDatHang = new DonDatHangDTO();
                $donDatHang->MaDonDatHang = $MaDonDatHang;
                $donDatHang->NgayLap = $NgayLap;
                $donDatHang->TongThanhTien = $TongThanhTien;
                $donDatHang->MaTaiKhoan = $MaTaiKhoan;
                $donDatHang->MaTinhTrang = $MaTinhTrang;
                $lstDonDatHang[] = $donDatHang;
            }
            return $lstDonDatHang;
        }
        public function GetByID($maDonDatHang)
        {
            $sql = "select MaDonDatHang, NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang from dondathang where MaDonDatHang = $maDonDatHang";
            $result = $this->ExecuteQuery($sql);
            if($result == null)
            {
                return null;
            }
            else
            {
                $row = mysqli_fetch_array($result);
                if($row == null)
                {
                    return null;
                }
                extract($row);
                $donDatHang = new DonDatHangDTO();
                $donDatHang->MaDonDatHang = $MaDonDatHang;
                $donDatHang->NgayLap = $NgayLap;
                $donDatHang->TongThanhTien = $TongThanhTien;
                $donDatHang->MaTaiKhoan = $MaTaiKhoan;
                $donDatHang->MaTinhTrang = $MaTinhTrang; 
                return $donDatHang;
            }
        }
        public function GetForChart()
        {
            $sql = "select date(NgayLap) as NgayLap, sum(TongThanhTien) as TongTien from dondathang group by date(NgayLap) order by date(NgayLap) ASC";
            $result = $this->ExecuteQuery($sql);
            $lstDonDatHang = array();
            while( $row = mysqli_fetch_array($result))
            {
                $lstDonDatHang[] = $row;
            }
            return $lstDonDatHang;
        }
        public function GetByName($hoadon)
        {
            $sql = "select DISTINCT dh.MaDonDatHang, dh.NgayLap, dh.TongThanhTien, dh.MaTaiKhoan, dh.MaTinhTrang from dondathang dh, taikhoan tk where tk.TenHienThi like '%$hoadon%' or dh.MaDonDatHang like '%$hoadon%' and dh.MaTaiKhoan = tk.MaTaiKhoan";   
            $result = $this->ExecuteQuery($sql);
            if($result == null)
            {
                return null;
            }
            else
            {
                $lstDonDatHang = array();
                while( $row = mysqli_fetch_array($result))
                {
                    if($row == null)
                    {
                        return null;
                    }
                    extract($row);
                    $donDatHang = new DonDatHangDTO();
                    $donDatHang->MaDonDatHang = $MaDonDatHang;
                    $donDatHang->NgayLap = $NgayLap;
                    $donDatHang->TongThanhTien = $TongThanhTien;
                    $donDatHang->MaTaiKhoan = $MaTaiKhoan;
                    $donDatHang->MaTinhTrang = $MaTinhTrang;
                    $lstDonDatHang[] = $donDatHang;
                }
                return $lstDonDatHang;
            }            
        }
        public function GetByMaTaiKhoan($maTaiKhoan)
        {
            $sql = "select MaDonDatHang, NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang from dondathang where MaTaiKhoan = $maTaiKhoan";
            $result = $this->ExecuteQuery($sql);
            if($result == null)
            {
                return null;
            }
            else
            {
                $lstDonDatHang = array();
                while( $row = mysqli_fetch_array($result))
                {
                    if($row == null)
                    {
                        return null;
                    }
                    extract($row);
                    $donDatHang = new DonDatHangDTO();
                    $donDatHang->MaDonDatHang = $MaDonDatHang;
                    $donDatHang->NgayLap = $NgayLap;
                    $donDatHang->TongThanhTien = $TongThanhTien;
                    $donDatHang->MaTaiKhoan = $MaTaiKhoan;
                    $donDatHang->MaTinhTrang = $MaTinhTrang;
                    $lstDonDatHang[] = $donDatHang;
                }
                return $lstDonDatHang;
            }            
        }
        public function GetMaxID()
        {
            $sql = "select MAX(MaDonDatHang) as Max from dondathang";
            $result =  $this->ExecuteQuery($sql);
            return mysqli_fetch_array($result)['Max'];
            
        }
        public function Insert($donDatHang)
        {
            $sql = "insert into dondathang (MaDonDatHang, NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang) values ('$donDatHang->MaDonDatHang', '$donDatHang->NgayLap', $donDatHang->TongThanhTien, $donDatHang->MaTaiKhoan, $donDatHang->MaTinhTrang)";
            return $this->ExecuteQuery($sql);
        }
        public function Update($donDatHang)
        {
            $sql = "update dondathang set MaTinhTrang = $donDatHang->MaTinhTrang where MaDonDatHang = $donDatHang->MaDonDatHang";
            return $this->ExecuteQuery($sql);
        }
        public function Delete($maDonDatHang)
        {
            $sql = "delete from donDatHang where MaDonDatHang = $maDonDatHang";
            $this->ExecuteQuery($sql);
        }
    }
?>