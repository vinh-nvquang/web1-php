<?php
    class LoaiTaiKhoanDAO extends DB
    {
        public function GetAll()
        {
            $sql="select MaLoaiTaiKhoan, TenLoaiTaiKhoan from loaitaikhoan";
            $result=$this->ExecuteQuery($sql);
            $lstLoaiTaiKhoan=array();
            while($row=mysqli_fetch_array($result))
            {
                extract($row);
                $loaiTaiKhoan=new LoaiTaiKhoanDTO();
                $loaiTaiKhoan->MaLoaiTaiKhoan= $MaLoaiTaiKhoan;
                $loaiTaiKhoan->TenLoaiTaiKhoan= $TenLoaiTaiKhoan;
                $lstLoaiTaiKhoan[]= $loaiTaiKhoan;
            }
            return $lstLoaiTaiKhoan;
        }
        public function GetByID($maLoaiTaiKhoan)
        {
            $sql= "select MaLoaiTaiKhoan, TenLoaiTaiKhoan from loaitaikhoan where MaLoaiTaiKhoan= $maLoaiTaiKhoan";
            $result = $this->ExecuteQuery($sql);
            if($result == null)
            {
                return null;
            }
            else
            {
                $row=mysqli_fetch_array($result);
                extract($row);
                $loaiTaiKhoan = new LoaiTaiKhoanDTO();
                $loaiTaiKhoan->MaLoaiTaiKhoan=$MaLoaiTaiKhoan;
                $loaiTaiKhoan->TenLoaiTaiKhoan=$TenLoaiTaiKhoan;
                return $loaiTaiKhoan;
            }
        }
        public function Insert($loaiTaiKhoan)
        {
            $sql="insert into loaitaikhoan(TenLoaiTaiKhoan) values('$loaiTaiKhoan->TenLoaiTaiKhoan')";
            $this->ExecuteQuery($sql);
        }
        public function Delete($loaiTaiKhoan)
        {
            $sql= "delete from loaitaikhoan where MaLoaiTaiKhoan=$loaiTaiKhoan->MaLoaiTaiKhoan";
            $this->ExecuteQuery($sql);
        }
        
        public function Update($loaiTaiKhoan)
        {
            $sql= "update loaitaikhoan set TenLoaiTaiKhoan= $loaiTaiKhoan->TenLoaiTaiKhoan where $loaiTaiKhoan->MaLoaiTaiKhoan";
            $this->ExecuteQuery($sql);
        }

        public function DenSoLuongTaiKhoanThuocLoai($maLoaiTaiKhoan)
        {
            $sql= "select count(MaTaiKhoan) from taikhoan where MaLoaiTaiKhoan = $maLoaiTaiKhoan";
            $result=$this->ExecuteQuery($sql);
            $row= mysqli_fetch_array($result);
            return $row[0];
        }
    }
?>