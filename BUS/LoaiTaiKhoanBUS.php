<?php
    class LoaiTaiKhoanBUS
    {
        var $loaiTaiKhoanDAO;
        public function __construct()
        {
            $this->loaiTaiKhoanDAO = new LoaiTaiKhoanDAO();      
        }

        public function GetAll()
        {
            return $this->loaiTaiKhoanDAO->GetAll();
        }

        public function GetAllAvailable()
        {
            return $this->loaiTaiKhoanDAO->GetAllAvailable();
        }

        public function GetByID($maLoaiTaiKhoan)
        {
            return $this->loaiTaiKhoanDAO->GetByID($maLoaiTaiKhoan);
        }

        public function Insert($loaiTaiKhoan)
        {
            $this->$loaiTaiKhoanDAO->Insert($loaiTaiKhoan);
        } 
        
        public function InsertWithName($tenLoaiTaiKhoan)
        {
            $loaiTaiKhoan=new LoaiTaiKhoanDTO();
            $loaiTaiKhoan->TenLoaiTaiKhoan=$tenLoaiTaiKhoan;
            $this->loaiTaiKhoanDTO->Insert($loaiTaiKhoan);
        }
        public function Delete($maLoaiTaiKhoan)
        {
            $loaiTaiKhoan=new LoaiTaiKhoanDTO();
            $loaiTaiKhoan->MaLoaiTaiKhoan=$maLoaiTaiKhoan;
            $soTaiKhoanThuocLoai = $this->loaiTaiKhoanDAO->DenSoLuongTaiKhoanThuocLoai($maLoaiTaiKhoan);
            if ($soTaiKhoanThuocLoai == 0) 
            {
                $this->loaiTaiKhoanDAO->Delete($loaiTaiKhoan);
            }
            else
            {
                $this->loaiTaiKhoanDAO->SetDelete($loaiTaiKhoan);
            }
        }
        public function Update($TenLoaiTaiKhoan)
        {
            $loaiTaiKhoan= new LoaiTaiKhoanDTO();
            $loaiTaiKhoan->TenLoaiTaiKhoan= $TenLoaiTaiKhoan;
            $this->loaiTaiKhoanDAO->Update($loaiTaiKhoan);
        }

        
    }
?>