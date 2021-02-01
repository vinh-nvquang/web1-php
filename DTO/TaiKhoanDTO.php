<?php
class TaiKhoanDTO
{
    var $MaTaiKhoan;
    var $TenDangNhap;
    var $NgaySinh;
    var $MatKhau;
    var $TenHienThi;
    var $DiaChi;
    var $DienThoai;
    var $Email;
    var $BiXoa;
    var $MaLoaiTaiKhoan;
    public function __construct()
    {
        $this->MaTaiKhoan = NULL;
        $this->TenDangNhap = '';
        $this->MatKhau = '';
        $this->TenHienThi = '';
        $this->DiaChi = '';
        $this->NgaySinh = NULL;
        $this->DienThoai = '';
        $this->Email = '';
        $this->BiXoa = 0;
        $this->MaLoaiTaiKhoan = 2;
    }
}
?>