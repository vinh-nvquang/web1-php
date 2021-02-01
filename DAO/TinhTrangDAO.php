<?php
    class TinhTrangDAO extends DB
    {
        public function GetAll()
        {
            $sql= "select MaTinhTrang, TenTinhTrang from tinhtrang";
            $result= $this->ExecuteQuery($sql);
            $lstTinhTrang=array();
            while($row=mysqli_fetch_array($result))
            {
                extract($row);
                $tinhTrang= new TinhTrangDTO();
                $tinhTrang->MaTinhTrang=$MaTinhTrang;
                $tinhTrang->TenTinhTrang=$TenTinhTrang;
                $lstTinhTrang[]=$tinhTrang;
            }
            return $lstTinhTrang;
        }
        public function GetAllAvailable()
        {
            $sql= "select MaTinhTrang, TenTinhTrang from tinhtrang";
            $result=$this->ExecuteQuery($sql);
            $lstTinhTrang=array();
            while($row=mysqli_fetch_array($result))
            {
                extract($row);
                $tinhTrang= new TinhTrangDTO();
                $tinhTrang->MaTinhTrang=$MaTinhTrang;
                $tinhTrang->TenTinhTrang=$TenTinhTrang;
                $lstTinhTrang[]=$tinhTrang;

            }
            return $lstTinhTrang;
        }
        public function GetByID($MaTinhTrang)
        {
            $sql= "select MaTinhTrang, TenTinhTrang from tinhtrang where MaTinhTrang = $MaTinhTrang";
            $result=$this->ExecuteQuery($sql);
            if($result == null)
                return null;
            else 
            {
                $row = mysqli_fetch_array($result);
                extract($row);
                $tinhTrang= new TinhTrangDTO();
                $tinhTrang->MaTinhTrang = $MaTinhTrang;
                $tinhTrang->TenTinhTrang = $TenTinhTrang;
                return $tinhTrang;
            }
        }

        public function Insert($tinhTrang)
        {
            $sql= "insert into tinhtrang(TenTinhTrang) values('$tinhTrang->TenTinhTrang)";
            $this->ExecuteQuery($sql);
        }

        public function Delete($tinhTrang)
        {
            $sql= "delete from tinhtrang where MaTinhTrang = $tinhTrang->MaTinhTrang";
            $this->ExecuteQuery($sql);
        }

        public function Update($tinhTrang)
        {
            $sql = "update tinhtrang set TenTinhTrang = $tinhTrang->TenTinhTrang where MaTinhTrang = $tinhTrang->MaTinhTrang";
            $this->ExecuteQuery($sql);
        }
        
    }
?>