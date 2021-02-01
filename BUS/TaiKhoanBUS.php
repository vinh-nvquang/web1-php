<?php
class TaiKhoanBUS
{
    var $taiKhoanDAO;
    public function __construct()
    {
        $this->taiKhoanDAO = new TaiKhoanDAO();
    }

    public function GetAll()
    {
        return $this->taiKhoanDAO->GetAll();
    }

    public function GetAllAvailable()
    {
        return $this->taiKhoanDAO->GetAllAvailable();
    }

    public function GetByID($maTaiKhoan)
    {
        return $this->taiKhoanDAO->GetByID($maTaiKhoan);
    }
    public function GetByUS_PW($tenDangNhap, $matKhau)
    {
        return $this->taiKhoanDAO->GetByUS_PW($tenDangNhap, $matKhau);
    }
    public function GetByName($tentaikhoan)
    {
        return $this->taiKhoanDAO->GetByName($tentaikhoan);
    }
    public function CheckExistsUser($tenDangNhap)
    {
        return  $this->taiKhoanDAO->CheckExistsUser($tenDangNhap);
    }
    public function Insert($taiKhoan)
    {
        return $this->taiKhoanDAO->Insert($taiKhoan);
    }
    public function InsertWithName($tenDangNhap)
    {
        $taiKhoan = new taiKhoanDTO();
        $taiKhoan->TenDangNhap = $tenDangNhap;
        $this->taiKhoanDAO->Insert($taiKhoan);
    }

    public function Delete ($maTaiKhoan)
    {
        $soDonDatHangThuocTaiKhoan = $this->taiKhoanDAO->DemSoLuongDonDatHanghuocTaiKhoan($maTaiKhoan);
        if ($soDonDatHangThuocTaiKhoan == 0) 
        {
            return $this->taiKhoanDAO->Delete($maTaiKhoan);
        }
        else
        {
            return false;
        }
    }

    public function SetDelete ($maTaiKhoan)
    {
        $taiKhoan = new TaiKhoanDTO();
        $taiKhoan->MaTaiKhoan = $maTaiKhoan;
        $this->taiKhoanDAO->SetDelete($taiKhoan);
    }

    public function UnsetDelete($maTaiKhoan)
    {
        $taiKhoan = new TaiKhoanDTO();
        $taiKhoan->MaTaiKhoan = $maTaiKhoan;
        $this->taiKhoanDAO->UnsetDelete($taiKhoan);
    }

    public function Update($taiKhoan)
    {
        return $this->taiKhoanDAO->Update($taiKhoan);
    }
    public function UpdateInforOrder($address, $phone, $maTaiKhoan)
    {
        $taiKhoan = $this->taiKhoanDAO->GetByID($maTaiKhoan);
        $taiKhoan->DiaChi = $address;
        $taiKhoan->DienThoai = $phone;
        return $this->taiKhoanDAO->Update($taiKhoan);
    }
}
?>