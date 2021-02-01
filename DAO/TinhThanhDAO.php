<?php
Class TinhThanhDAO extends DB
{
    public function GetAll()
    {
        $sql = "select MaTinhThanh, TenTinhThanh from tinhthanh";
        $result =$this->ExecuteQuery($sql);
        $lstTinhThanh = array();
        while( $row = mysqli_fetch_array($result))
        {
            extract($row);
            $tinhThanh= new TinhThanhDTO();
            $tinhThanh->MaTinhThanh = $MaTinhThanh;
            $tinhThanh->TenTinhThanh = $TenTinhThanh;
            $lstTinhThanh[]= $tinhThanh;
        }
        return $lstTinhThanh;
    } 
}
?>