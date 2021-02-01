<?php
class SanPhamDTO
{
    var $MaSanPham;
    var $TenSanPham;
    var $HinhURL;
    var $GiaSanPham;
    var $NgayNhap;
    var $SoLuongTon;
    var $SoLuongBan;
    var $SoLuotXem;
    var $Mota;
    var $BiXoa;
    var $MaLoaiSanPham;
    var $MaHangSanXuat;
    public function __construct()
    {
        $this->MaSanPham = 0;
        $this->TenSanPham = '';
        $this->HinhURL = '';
        $this->GiaSanPham = 0;
        $this->NgayNhap = getdate();
        $this->SoLuongTon = 0;
        $this->SoLuongBan = 0;
        $this->SoLuotXem = 0;
        $this->Mota = '';
        $this->BiXoa = 0;
        $this->MaLoaiSanPham = 0;
        $this->MaHangSanXuat = 0;
    }
}
?>