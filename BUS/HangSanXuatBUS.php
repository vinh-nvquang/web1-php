<?php
    class HangSanXuatBUS
    {
        var $hangSanXuatDAO;
        public function __construct()
        {
            $this->hangSanXuatDAO = new HangSanXuatDAO();
        }

        public function GetAll()
        {
            return $this->hangSanXuatDAO->GetAll();
        }

        public function GetAllAvailable()
        {
            return $this->hangSanXuatDAO->GetAllAvailable();
        }

        public function GetByID($maHangSanXuat)
        {
            return $this->hangSanXuatDAO->GetByID($maHangSanXuat);
        }
        public function GetByMaLoaiSanPham($maLoaiSanPham)
        {
            return $this->hangSanXuatDAO->GetByMaLoaiSanPham($maLoaiSanPham);
        }
        public function GetByName($tenHangSanXuat)
        {
            return $this->hangSanXuatDAO->GetByName($tenHangSanXuat);
        }
        public function GetMaxID()
        {
            return $this->hangSanXuatDAO->GetMaxID();
        }
        public function Insert($hangSanXuat)
        {
            return $this->hangSanXuatDAO->Insert($hangSanXuat);
        }
        public function InsertWithName($tenHangSanXuat)
        {
            $hangSanXuat = new HangSanXuatDTO();
            $hangSanXuat->TenHangSanXuat = $tenHangSanXuat;
            $this->hangSanXuatDAO->Insert($hangSanXuat);
        }
        public function Delete($maHangSanXuat)
        {
            $hangSanXuat  = new HangSanXuatDTO();
            $hangSanXuat->MaHangSanXuat = $maHangSanXuat;
            $soSanPhamThuocHang = $this->hangSanXuatDAO->DemSoLuongSanPhamThuocHang($maHangSanXuat);
            if($soSanPhamThuocHang == 0)
            {
                $this->hangSanXuatDAO->Delete($hangSanXuat);
                return true;
            }
            else
            {
                return false;
            }
        }
        public function DemSoLuongSanPhamThuocHang($maHangSanXuat)
        {
            return $this->hangSanXuatDAO->DemSoLuongSanPhamThuocHang($maHangSanXuat);   
        }
        public function SetDelete($maHangSanXuat)
        {
            $hangSanXuat  = new HangSanXuatDTO();
            $hangSanXuat->MaHangSanXuat = $maHangSanXuat;
            $this->hangSanXuatDAO->SetDelete($hangSanXuat);
        }
        public function UnsetDelete($maHangSanXuat)
        {
            $hangSanXuat  = new HangSanXuatDTO();
            $hangSanXuat->MaHangSanXuat = $maHangSanXuat;
            $this->hangSanXuatDAO->UnsetDelete($hangSanXuat);
        }
        public function Update($hangSanXuat)
        {
            return $this->hangSanXuatDAO->Update($hangSanXuat);
        }
    }
?>