<?php
Class TaiKhoanDAO extends DB
{
    public function GetAll()
    {
        $sql = "select MaTaiKhoan, TenDangNhap, MatKhau, TenHienThi, DiaChi, EMail, BiXoa, MaLoaiTaiKhoan from taikhoan";
        $result =$this->ExecuteQuery($sql);
        $lstTaiKhoan = array();
        while( $row = mysqli_fetch_array($result))
        {
            extract($row);
            $taiKhoan= new TaiKhoanDTO();
            $taiKhoan->MaTaiKhoan = $MaTaiKhoan;
            $taiKhoan->TenDangNhap = $TenDangNhap;
            $taiKhoan->MatKhau = $MatKhau;
            $taiKhoan->TenHienThi = $TenHienThi;
            $taiKhoan->DiaChi = $DiaChi;
            $taiKhoan->EMail = $EMail;
            $taiKhoan->BiXoa = $BiXoa;
            $taiKhoan->MaLoaiTaiKhoan = $MaLoaiTaiKhoan;
            $lstTaiKhoan[]= $taiKhoan;
        }
        return $lstTaiKhoan;
    } 
    public function GetAllAvailable()
    {
        $sql = "select MaTaiKhoan, TenDangNhap, MatKhau, TenHienThi, DiaChi, EMail, BiXoa, MaLoaiTaiKhoan from taikhoan";
        $result = $this->ExecuteQuery($sql);
        $lstHangSanXuat = array();
        while( $row = mysqli_fetch_array($result))
        {
            extract($row);
            $taiKhoan= new TaiKhoanDTO();
            $taiKhoan->MaTaiKhoan = $MaTaiKhoan;
            $taiKhoan->TenDangNhap = $TenDangNhap;
            $taiKhoan->MatKhau = $MatKhau;
            $taiKhoan->TenHienThi = $TenHienThi;
            $taiKhoan->DiaChi = $DiaChi;
            $taiKhoan->EMail = $EMail;
            $taiKhoan->BiXoa = $BiXoa;
            $taiKhoan->MaLoaiTaiKhoan = $MaLoaiTaiKhoan;
            $lstTaiKhoan[]= $taiKhoan;
        }
        return $lstTaiKhoan;
    }
    public function GetByID($maTaiKhoan)
    {
        $sql = "select MaTaiKhoan, TenDangNhap, NgaySinh, TenHienThi, DiaChi, DienThoai, Email, MaLoaiTaiKhoan, BiXoa from taikhoan where MaTaiKhoan = $maTaiKhoan";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
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
            $taiKhoan= new TaiKhoanDTO();
            $taiKhoan->MaTaiKhoan = $MaTaiKhoan;
            $taiKhoan->TenDangNhap = $TenDangNhap;
            $taiKhoan->NgaySinh = $NgaySinh;
            $taiKhoan->TenHienThi = $TenHienThi;
            $taiKhoan->DiaChi = $DiaChi;
            $taiKhoan->DienThoai = $DienThoai;
            $taiKhoan->Email = $Email;
            $taiKhoan->MaLoaiTaiKhoan = $MaLoaiTaiKhoan;
            $taiKhoan->BiXoa = $BiXoa;
            return $taiKhoan;
        }
    }
    public function GetByUS_PW($tenDangNhap, $matKhau)
    {
        $sql = "select MaTaiKhoan, TenHienThi, MaLoaiTaiKhoan from taikhoan where TenDangNhap = '$tenDangNhap' and MatKhau = '$matKhau' and BiXoa = 0";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
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
            $taiKhoan = new TaiKhoanDTO();
            $taiKhoan->MaTaiKhoan = $MaTaiKhoan;
            $taiKhoan->TenHienThi = $TenHienThi;
            $taiKhoan->MaLoaiTaiKhoan = $MaLoaiTaiKhoan;
            return $taiKhoan;
        }
    }
    public function GetByName($tentaikhoan)
    {
        $sql = "select MaTaiKhoan, TenDangNhap, TenHienThi, MaLoaiTaiKhoan, BiXoa from taikhoan where TenDangNhap like '%$tentaikhoan%' or TenHienThi like '%$tentaikhoan%'";
        $result = $this->ExecuteQuery($sql);
        if($result == null)
            {
                return null;
            }
            else
            {
                $lstTaiKhoan = array();
                while( $row = mysqli_fetch_array($result))
                {
                    extract($row);
                    $taiKhoan = new TaiKhoanDTO();
                    $taiKhoan->MaTaiKhoan = $MaTaiKhoan;
                    $taiKhoan->TenDangNhap = $TenDangNhap;
                    $taiKhoan->TenHienThi = $TenHienThi;
                    $taiKhoan->MaLoaiTaiKhoan = $MaLoaiTaiKhoan;
                    $taiKhoan->BiXoa = $BiXoa;
                    $lstTaiKhoan[] = $taiKhoan;
                }
                return $lstTaiKhoan;
            }            
    }
    public function CheckExistsUser($tenDangNhap)
    {
        $sql = "select MaTaiKhoan from taikhoan where TenDangNhap = '$tenDangNhap'";
        $result = $this->ExecuteQuery($sql);
        if($result == null)
        {
            return 0;
        }
        else
        {
            $row = mysqli_fetch_array($result); 
            if($row == null)
            {
                return 0;
            }
            return 1;
        }
    }
    public function Insert($taiKhoan)
    {
        if($taiKhoan->NgaySinh == null)
        {
            $sql = "insert into taikhoan (TenDangNhap, NgaySinh, MatKhau, TenHienThi, DiaChi, DienThoai, Email, BiXoa, MaLoaiTaiKhoan) VALUES ('$taiKhoan->TenDangNhap', NULL, '$taiKhoan->MatKhau', '$taiKhoan->TenHienThi', '$taiKhoan->DiaChi', '$taiKhoan->DienThoai', '$taiKhoan->Email', $taiKhoan->BiXoa, $taiKhoan->MaLoaiTaiKhoan)";

        }
        else
        {
            $sql = "insert into taikhoan (TenDangNhap, NgaySinh, MatKhau, TenHienThi, DiaChi, DienThoai, Email, BiXoa, MaLoaiTaiKhoan) VALUES ('$taiKhoan->TenDangNhap', '$taiKhoan->NgaySinh', '$taiKhoan->MatKhau', '$taiKhoan->TenHienThi', '$taiKhoan->DiaChi', '$taiKhoan->DienThoai', '$taiKhoan->Email', $taiKhoan->BiXoa, $taiKhoan->MaLoaiTaiKhoan)";
        }
        return $check = $this->ExecuteQuery($sql); 
    }
    public function Delete($maTaiKhoan)
    {
        $sql= "delete from taikhoan where MaTaiKhoan = $maTaiKhoan";
        return $this->ExecuteQuery($sql);
    }
    public function SetDelete($taiKhoan)
    {
        $sql = "update taikhoan set BiXoa = 1 where MaTaiKhoan = $taiKhoan->MaTaiKhoan";
        $this->ExecuteQuery($sql);
    }
    public function UnsetDelete($taiKhoan)
    {
        $sql = "update taikhoan set BiXoa = 0 where MaTaiKhoan = $taiKhoan->MaTaiKhoan";
        $this->ExecuteQuery($sql);
    }
    public function Update($taiKhoan)
    {
        if($taiKhoan->NgaySinh == NULL)
        {
            $sql = "update taikhoan set NgaySinh = NULL, TenHienThi = '$taiKhoan->TenHienThi', DiaChi = '$taiKhoan->DiaChi', DienThoai = '$taiKhoan->DienThoai', Email = '$taiKhoan->Email' , BiXoa = $taiKhoan->BiXoa where MaTaiKhoan =  $taiKhoan->MaTaiKhoan";
            return $this->ExecuteQuery($sql);
        }
        else
        {
            $sql = "update taikhoan set NgaySinh = '$taiKhoan->NgaySinh', TenHienThi = '$taiKhoan->TenHienThi', DiaChi = '$taiKhoan->DiaChi', DienThoai = '$taiKhoan->DienThoai', Email = '$taiKhoan->Email' , BiXoa = $taiKhoan->BiXoa where MaTaiKhoan =  $taiKhoan->MaTaiKhoan";
            return $this->ExecuteQuery($sql);
        }
    }
    public function DemSoLuongDonDatHanghuocTaiKhoan($maTaiKhoan)
    {
        $sql = "select count(MaTaiKhoan) from dondathang where MaTaiKhoan = $maTaiKhoan";
        $result = $this->ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        return $row[0];
    }
}
?>