<?php
    if(isset($_SESSION['uid']) && $_SESSION['tuid'] == 1)
    {
        if(isset($_GET['a']))
        {
//page search cho taikhoan
            if(isset($_POST['tentaikhoan']))
            {
                $taiKhoanBUS = new TaiKhoanBUS();
                $lst = $taiKhoanBUS->GetByName($_POST['tentaikhoan']);
                if(count($lst) == 0)
                {
                    echo "<h1 id='error'>Account not found!!!</h1>";
                }
                else
                {
                    $AdminBUS = new AdminBUS();
                    $AdminBUS->SelectTableTaiKhoan($lst);
                }
            }
//page search cho sanpham
            else if(isset($_POST['tensanpham']))
            {
                $sanPhamBUS = new SanPhamBUS();
                $lst = $sanPhamBUS->GetByName($_POST['tensanpham']);
                if(count($lst) == 0)
                {
                    echo "<h1 id='error'>Product not found!!!</h1>";
                }
                else
                {
                    $AdminBUS = new AdminBUS();
                    $AdminBUS->SelectTableSanPham($lst);
                }
            }
//page search cho loaisanpham
            else if(isset($_POST['tenloaisanpham']))
            {
                $loaiSanPhamBUS = new LoaiSanPhamBUS();
                $lst = $loaiSanPhamBUS->GetByName($_POST['tenloaisanpham']);
                if(count($lst) == 0)
                {
                    echo "<h1 id='error'>Product type not found!!!</h1>";
                }
                else
                {
                    $AdminBUS = new AdminBUS();
                    $AdminBUS->SelectTableLoaiSanPham($lst);
                }
            }
//page search cho hangsanxuat
            else if(isset($_POST['tenhangsanxuat']))
            {
                $hangSanXuatBUS = new HangSanXuatBUS();
                $lst = $hangSanXuatBUS->GetByName($_POST['tenhangsanxuat']);
                if(count($lst) == 0)
                {
                    echo "<h1 id='error'>Manufacturer not found!!!</h1>";
                }
                else
                {
                    $AdminBUS = new AdminBUS();
                    $AdminBUS->SelectTableHangSanXuat($lst);
                }
            }
//page search cho dondathang
            else if(isset($_POST['donhang']))
            {
                $donDatHangBUS = new DonDatHangBUS();
                $lst = $donDatHangBUS->GetByName($_POST['donhang']);
                if(count($lst) == 0)
                {
                    echo "<h1 id='error'>Order not found!!!</h1>";
                }
                else
                {
                    $AdminBUS = new AdminBUS();
                    $AdminBUS->SelectTableDonDatHang($lst);
                }
            }
            else
            {
                header("location:index.php?a=404");
            }
        }
        else
        {
            header("location:index.php?a=404");
        }
?>
    <div id="comback"><input type="submit" value="<< Go Back" id="btncomback" onclick="ComeBack()"></div>
<?php
    }
    else
    {
        header("location:index.php?a=404");
    }
?>