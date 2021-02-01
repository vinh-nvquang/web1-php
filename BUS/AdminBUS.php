<?php
    class AdminBUS
    {
        public function SelectTableSanPham($lst)
        {
            echo"<table id='idTable' cellspacing = '0'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name of product</th>
                    <th>Price</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>";
                foreach($lst as $sanPham)
                {
                    echo "<tr>";
                    echo "<td>$sanPham->MaSanPham</td>";
                    echo "<td>$sanPham->TenSanPham</td>";
                    echo "<td>$sanPham->GiaSanPham</td>";
                    echo '<td>';
                    echo ('<input type="image" src="GUI/images/detail.png" id="btnlock" onclick="location=\'index.php?a=27&masanpham='.$sanPham->MaSanPham.'\';">');
                }
            echo "</tbody></table>";
        }
        public function SelectTableLoaiSanPham($lst)
        {
            echo"<table id='idTable' cellspacing='0'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name of product type</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>";
                foreach($lst as $loaiSanPham)
                { 
                    echo "<tr>";
                    echo "<td>$loaiSanPham->MaLoaiSanPham</td>";
                    echo "<td>$loaiSanPham->TenLoaiSanPham</td>";
                    echo '<td>';
                    if($loaiSanPham->BiXoa == 0)
                    {
                        echo ('<input type="image" src="GUI/images/lock.png" id="btnlock" id="btnlock" onclick="location=\'index.php?a=24&maloaisanpham='.$loaiSanPham->MaLoaiSanPham.'\';">');
                    }
                    else
                    {
                        echo ('<input type="image" src="GUI/images/unlock.png" id="btnunlock" onclick="location=\'index.php?a=24&maloaisanpham='.$loaiSanPham->MaLoaiSanPham.'\';">');
                    }
                    echo ('<input type="image" src="GUI/images/edit.png" id="btnupdate" onclick="location=\'index.php?a=22&maloaisanpham='.$loaiSanPham->MaLoaiSanPham.'\';">');
                    echo ('<input type="image" src="GUI/images/delete.png" id="btndelete" onclick="location=\'index.php?a=23&maloaisanpham='.$loaiSanPham->MaLoaiSanPham.'\';">');
                    echo '</td>';
                }
        echo "</tbody></table>";
        }
        public function SelectTableHangSanXuat($lst)
        {
            echo"<table id='idTable' cellspacing='0'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name of manufacturer</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>";
                foreach($lst as $hangSanXuat)
                { 
                    echo "<tr>";
                    echo "<td>$hangSanXuat->MaHangSanXuat</td>";
                    echo "<td>$hangSanXuat->TenHangSanXuat</td>";
                    echo '<td>';
                    if($hangSanXuat->BiXoa == 0)
                    {
                        echo ('<input type="image" src="GUI/images/lock.png" id="btnlock" onclick="location=\'index.php?a=24&mahangsanxuat='.$hangSanXuat->MaHangSanXuat.'\';">');
                    }
                    else
                    {
                        echo ('<input type="image" src="GUI/images/unlock.png" id="btnunlock" onclick="location=\'index.php?a=24&mahangsanxuat='.$hangSanXuat->MaHangSanXuat.'\';">');
                    }
                    echo ('<input type="image" src="GUI/images/edit.png" id="btnupdate" onclick="location=\'index.php?a=22&mahangsanxuat='.$hangSanXuat->MaHangSanXuat.'\';">');
                    echo ('<input type="image" src="GUI/images/delete.png" id="btndelete" onclick="location=\'index.php?a=23&mahangsanxuat='.$hangSanXuat->MaHangSanXuat.'\';">');
                    echo '</td>';
                }
        echo "</tbody></table>";
        }
        public function SelectTableTaiKhoan($lst)
        {
            echo"<table id='idTable' cellspacing='0'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User name</th>
                    <th>Display name</th>
                    <th>Account type</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>";
                foreach($lst as $taiKhoan)
                { 
                    echo "<tr>";
                    echo "<td>$taiKhoan->MaTaiKhoan</td>";
                    echo "<td>$taiKhoan->TenDangNhap</td>";
                    echo "<td>$taiKhoan->TenHienThi</td>";
                    $loaiTaiKhoanBUS = new LoaiTaiKhoanBUS();
                    $loaiTaiKhoan = $loaiTaiKhoanBUS->GetByID($taiKhoan->MaLoaiTaiKhoan);
                    if($loaiTaiKhoan == null)
                    {
                        echo "<td></td>";
                    }
                    else
                    {
                        echo "<td>$loaiTaiKhoan->TenLoaiTaiKhoan</td>";
                    }
                    echo '<td>';
                    echo ('<input type="image" src="GUI/images/detail.png" id="btnlock" onclick="location=\'index.php?a=27&mataikhoan='.$taiKhoan->MaTaiKhoan.'\';">');
                    echo '</td>';
                }
        echo "</tbody></table>";
        }
        public function SelectTableDonDatHang($lst)
        {
            echo"<table id='idTable' cellspacing='0'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Order Datetime</th>
                    <th>Total Cost</th>
                    <th>Status</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>";
                foreach($lst as $dondathang)
                { 
                    echo "<tr>";
                    echo "<td>$dondathang->MaDonDatHang</td>";
                    $taiKhoanBUS = new TaiKhoanBUS();
                    $taiKhoan = $taiKhoanBUS->GetByID($dondathang->MaTaiKhoan);
                    echo "<td>$taiKhoan->TenHienThi</td>";
                    echo "<td>$dondathang->NgayLap</td>";
                    echo "<td>$dondathang->TongThanhTien</td>";
                    $tinhTrangBUS = new TInhTrangBUS();
                    $tinhTrang = $tinhTrangBUS->GetByID($dondathang->MaTinhTrang);
                    echo "<td>$tinhTrang->TenTinhTrang</td>";
                    echo '<td>';
                    echo ('<input type="image" src="GUI/images/detail.png" id="btnlock" onclick="location=\'index.php?a=27&madondathang='.$dondathang->MaDonDatHang.'\';">');
                    echo ('<input type="image" src="GUI/images/edit.png" id="btnupdate" onclick="location=\'index.php?a=22&madondathang='.$dondathang->MaDonDatHang.'\';">');
                    echo '</td>';
                    echo '</tr>';
                }
        echo "</tbody></table>";

        }
        public function FormInsertSanPham($id)
        {
            echo '<h3><a id="back" onclick="ComeBack()">&lt;&lt;</a>&nbsp;&nbsp;INSERT PRODUCT</h3>';
            echo '<div id="form">';
            echo '<form name="insert" action="index.php?a=26&id='.$id.'" method="POST" id="idForm" enctype="multipart/form-data">';
            echo'<h4>Name of product</h4>';
            echo '<div>';
            echo '<input type="text" name="adname" id="fullname">';
            echo '</div>';
            echo '<h4>Name of manufacture:</h4>';
            echo '<div id="city" name="manufacture">';
            echo '<select name="manufacture">
            <option value="0">--Manufacturer--</option>';
                $hangSanXuatBUS = new HangSanXuatBUS();
                $lst = $hangSanXuatBUS->GetAllAvailable();
                foreach($lst as $hangSanXuat)
                {
                    echo '<option value='.$hangSanXuat->MaHangSanXuat.'>'.$hangSanXuat->TenHangSanXuat.'</option>';
                }
            echo '</select>';
            echo '</div>';
            echo '<h4>Name of type product:</h4>';
            echo '<div id="city" name="typeofproduct">';
            echo '<select name="typeofproduct">
            <option value="0">--Type of Product--</option>';
            $loaiSanPhamBUS = new LoaiSanPhamBUS();
            $lst1 = array();
            $lst1 = $loaiSanPhamBUS->GetAll();
            foreach($lst1 as $loaiSanPham)
            {
                echo '<option value='.$loaiSanPham->MaLoaiSanPham.'>'.$loaiSanPham->TenLoaiSanPham.'</option>';
            }
            echo '</select>';
            echo '</div>';
            
            echo '<h4>Price:</h4>';
            echo '<div>';
            echo '<input type="text" name="price" id="fullname">';
            echo '</div>';
            echo '<h4>Quantity Exists:<h4>';
            echo '<div>';
            echo '<input type="text" name="quaex" id="fullname">';
            echo '</div>';
            echo '<h4>Image:</h4>';
            echo '<div id="image_file">';
            echo '<input type="file" name="image_file">';
            echo '</div>';
             echo '<input type="submit" name="insert" id="smSignUp" value="Insert">
             </form>';
             echo '</div>';
        }
        public function FromUpdateSanPham($maSanPham)
        {
            $sanPhamBUS = new SanPhamBUS();
            $sanPham = $sanPhamBUS->GetByID($maSanPham);
            echo '<h3><a id="back" onclick="ComeBack()">&lt;&lt;</a>&nbsp;&nbsp;UPDATE PRODUCT</h3>';
            echo '<div id="form">';
            echo '<form name="update" action="index.php?a=25&masanpham='.$maSanPham.'" method="POST" id="idForm">';
            echo '<h4>Name of product</h4>';
            echo '<div>';
            echo '<input type="text" name="adname" id="fullname" value="'.$sanPham->TenSanPham.'">';
            echo '</div>';
            echo '<h4>Price</h4>';
            echo '<div>';
            echo '<input type="text" name="price" id="fullname" value="'.$sanPham->GiaSanPham.'">';
            echo '</div>';
            echo '<h4>Quantity Exists</h4>';
            echo '<div>';
            echo '<input type="text" name="quaex" id="fullname" value="'.$sanPham->SoLuongTon.'">';
            echo '</div>';
            echo '<br/>';
            echo '<input type="submit" name="update" id="smSignUp" value="Update">';
            echo '</form>';
            echo '</div>';
        }
        public function FormUpdateLoaiSanPham($maLoaiSanPham)
        {
            $loaiSanPhamBUS = new LoaiSanPhamBUS();
            $loaiSanPham = $loaiSanPhamBUS->GetByID($maLoaiSanPham);
            echo '<h3><a id="back" onclick="ComeBack()">&lt;&lt;</a>&nbsp;&nbsp;UPDATE PRODUCT TYPE</h3>';
            echo '<div id="form">';
            echo '<form name="update" action="index.php?a=25&maloaisanpham='.$maLoaiSanPham.'" method="POST" id="idForm">';
            echo'<h4>Name of product type</h4>';
            echo '<div>';
            echo '<input type="text" name="adname" id="fullname" value="'.$loaiSanPham->TenLoaiSanPham.'">';
            echo '</div>';
            echo '<input type="submit" name="update" id="smSignUp" value="Update">';
            echo '</form>';
            echo '</div>';
        }
        public function FormInsertLoaiSanPham($id)
        {
            echo '<h3><a id="back" onclick="ComeBack()">&lt;&lt;</a>&nbsp;&nbsp;INSERT PRODUCT TYPE</h3>';
            echo '<div id="form">';
            echo "<form name='insert' action='index.php?a=26&id=$id' method='POST' id='idForm'>";
            echo'<h4>Name of product type</h4>';
            echo '<div>';
            echo '<input type="text" name="adname" id="fullname">';
            echo '</div>';
            echo '<input type="submit" name="insert" id="smSignUp" value="Insert">';
            echo '</form>';
            echo '</div>';
        }
        public function FormUpdateHangSanXuat($maHangSanXuat)
        {
            $hangSanXuatBUS = new HangSanXuatBUS();
            $hangSanXuat = $hangSanXuatBUS->GetByID($maHangSanXuat);
            echo '<h3><a id="back" onclick="ComeBack()">&lt;&lt;</a>&nbsp;&nbsp;UPDATE MANUFACTURER</h3>';
            echo '<div id="form">';
            echo '<form name="update" action="index.php?a=25&mahangsanxuat='.$maHangSanXuat.'" method="POST" id="idForm">';
            echo'<h4>Name of manufacturer</h4>';
            echo '<div>';
            echo '<input type="text" name="adname" id="fullname" value="'.$hangSanXuat->TenHangSanXuat.'">';
            echo '</div>';
            echo '<input type="submit" name="update" id="smSignUp" value="Update">';
            echo '</form>';
            echo '</div>';
        }
        public function FormInsertHangSanXuat($id)
        {
            echo '<h3><a id="back" onclick="ComeBack()">&lt;&lt;</a>&nbsp;&nbsp;INSERT MANUFACTURER</h3>';
            echo '<div id="form">';
            echo "<form name='insert' action='index.php?a=26&id=$id' method='POST' id='idForm'>";
            echo'<h4>Name of manufacturer</h4>';
            echo '<div>';
            echo '<input type="text" name="adname" id="fullname">';
            echo '</div>';
            echo'<h4>Types of products manufactured by the manufacturer:</h4>';
            echo '<div>';
            $loaiSanPhamBUS = new LoaiSanPhamBUS();
            $lst = array();
            $lst = $loaiSanPhamBUS->GetAll();
            foreach($lst as $loaiSanPham)
            {
                echo '<input type="checkbox" id="checkbox" name="'.$loaiSanPham->MaLoaiSanPham.'">'.$loaiSanPham->TenLoaiSanPham.'<br/>';
            }
            echo '</div>';
            echo '<input type="submit" name="insert" id="smSignUp" value="Insert">';
            echo '</form>';
            echo '</div>';
        }

        public function FormUpdateTaiKhoan($maTaiKhoan)
        {
            $taiKhoanBUS = new TaiKhoanBUS();
            $taiKhoan = $taiKhoanBUS->GetByID($maTaiKhoan);
            echo '<h3><a id="back" onclick="ComeBack()">&lt;&lt;</a>&nbsp;&nbsp;UPDATE ACCOUNT</h3>';
            echo '<div id="form">';
            echo '<form name="update" action="index.php?a=25&mataikhoan='.$maTaiKhoan.'" method="POST" id="idForm">';
            echo'<h4>User name:</h4>';
            echo '<div>';
            echo '<input type="text" name="usname" id="fullname" value="'.$taiKhoan->TenDangNhap.'" readonly="readonly" >';
            echo '</div>';
            echo'<h4>Date of birth:</h4>';
            echo '<div>';
            echo '<select id="day" name="day">';
            echo '<option value="0">--Day--</option>';
            for ($i=1; $i <= 31 ; $i++) 
            { 
                if($i<10)
                {
                    $string = "0".(string)$i;
                    if(substr($taiKhoan->NgaySinh, 8, 2) == $string)
                    {
                        echo "<option value='$string' selected>$string</option>";   
                    }
                    else
                    {
                        echo "<option value='$string'>$string</option>";    
                    }
                }
                else
                {
                    if(substr($taiKhoan->NgaySinh, 8, 2) == (string)$i)
                    {
                        echo "<option value='$i' selected>$i</option>";   
                    }
                    else
                    {
                        echo "<option value='$i'>$i</option>";    
                    }
                }
            }
            echo '</select>
            <select id="month" name="month">
                <option value="0">--Month--</option>';
            for ($i=1; $i <= 12 ; $i++) 
            { 
                if($i<10)
                {
                    $string = "0".(string)$i;
                    if(substr($taiKhoan->NgaySinh, 5, 2) == $string)
                    {
                        echo "<option value='$string' selected>$string</option>";   
                    }
                    else
                    {
                        echo "<option value='$string'>$string</option>";    
                    }
                }
                else
                {
                    if(substr($taiKhoan->NgaySinh, 5, 2) == (string)$i)
                    {
                        echo "<option value='$i' selected>$i</option>";   
                    }
                    else
                    {
                        echo "<option value='$i'>$i</option>";    
                    }
                }
            }
            echo '</select>
            <select id="year" name="year">
                <option value="0">--Year--</option>';
            $now = getdate();
            $year = $now["year"] - 13;
            for ($i=$year; $i > $year-60 ; $i--) 
            { 
                if(substr($taiKhoan->NgaySinh, 0, 4) == (string)$i)
                    {
                        echo "<option value='$i' selected>$i</option>";   
                    }
                    else
                    {
                        echo "<option value='$i'>$i</option>";    
                    }
            }
            echo '</select><br/>';
            echo '</div>';
            echo'<h4>Display name:</h4>';
            echo '<div>';
            echo '<input type="text" name="fullname" id="fullname" value="'.$taiKhoan->TenHienThi.'">';
            echo '</div>';
            echo'<h4>Adress:</h4>';
            echo '<div>';
            echo '<input type="text" name="adress" id="fullname" value="'.$taiKhoan->DiaChi.'">';
            echo '</div>';
            echo'<h4>Phone number:</h4>';
            echo '<div>';
            echo '<input type="text" name="phone" id="fullname" value="'.$taiKhoan->DienThoai.'">';
            echo '</div>';
            echo'<h4>Email:</h4>';
            echo '<div>';
            echo '<input type="text" name="email" id="fullname" value="'.$taiKhoan->Email.'">';
            echo '</div>';
            echo '<input type="submit" name="update" id="smSignUp" value="Update">';
            echo '</form>';
            echo '</div>';
        }
        public function FormInsertTaiKhoan($id)
        {
            echo '<h3><a id="back" onclick="ComeBack()">&lt;&lt;</a>&nbsp;&nbsp;INSERT ACCOUNT</h3>';
            echo '<div id="form">';
            echo "<form name='insert' action='index.php?a=26&id=$id' method='POST' id='idForm'>";
            echo '<h4>Profile information</h4>
                <div>
                    Full name:<br />
                    <input type="text" name="fullname" id="fullname">
                </div>
                <div>';
                $now = getdate();
                $year = $now["year"] - 13;
            echo 'Date of birth:<br />
                    <select id="day" name="day">
                    <option value="0">--Day--</option>';
            for ($i=1; $i <= 31 ; $i++)
            { 
                if($i<10)
                {
                    $string = "0".(string)$i;
                        echo "<option value='$string'>$string</option>";
                }
                else
                {
                    echo "<option value='$i'>$i</option>";
                }
            }
            echo '</select>
                    <select id="month" name="month">
                    <option value="0">--Month--</option>';
                    for ($i=1; $i <= 12 ; $i++) { 
                        if($i<10)
                        {
                            $string = "0".(string)$i;
                            echo "<option value='$string'>$string</option>";
                        }
                        else
                        {
                            echo "<option value='$i'>$i</option>";
                        }
                    }
            echo '</select>
                    <select id="year" name="year">
                    <option value="0">--Year--</option>';
            for ($i=$year; $i > $year-60 ; $i--) 
            { 
                echo "<option value='$i'>$i</option>";
            }
            echo '</select><br/>
                </div>
                <div id="city" name="city">
                    City/region:<br/>
                    <select name="city">
                        <option value="">--Choose city/region--</option>';
                $tinhThanhBUS = new TinhThanhBUS();
                $lstTinhThanh = $tinhThanhBUS->GetAll();
                foreach ($lstTinhThanh as $tinhThanh) 
                {
                    echo "<option value='$tinhThanh->TenTinhThanh'>$tinhThanh->TenTinhThanh</option><br/>";
                } 
            echo '</select>
                </div>
                <div>
                    Phone number:<br />
                    <input type="text" name="phone" id="phone">
                </div>
                <div>
                    Email:<br />
                    <input type="text" name="email" id="email">
                </div>
                <h4>Login information</h4>';
                echo '<div>';
                echo '</select><br/>
                </div>
                <div id="city" name="type">
                    Type account:<span style="color:red;">*</span><br/>
                    <select name="type">';
                $loaiTaiKhoanBUS = new LoaiTaiKhoanBUS();
                $lstLoaiTaiKhoan = $loaiTaiKhoanBUS->GetAll();
                foreach ($lstLoaiTaiKhoan as $loaiTaiKhoan) 
                {
                    echo "<option value='$loaiTaiKhoan->MaLoaiTaiKhoan'>$loaiTaiKhoan->TenLoaiTaiKhoan</option><br/>";
                } 
                echo '</select>
                    </div>';

                echo '<div>
                    User name:<span style="color:red;">*</span><br />
                    <input type="text" name="usname" id="usname"><br/>
                </div>
                <div>
                    Password:<span style="color:red;">*</span><br/>
                    <input type="password" name="password" id="password"><br/>
                </div>
                <div>
                    Confirm password:<span style="color:red;">*</span><br/>
                    <input type="password" name="cfpassword" id="cfpassword"><br/>
                </div>
                    <input type="submit" name="insert" id="smSignUp" value="Insert">
                    <span style="color:red"><p id="cautionPass"></p></span>
                </form>
                </div>';
        }
        public function FormUpdateDonDatHang($madondathang)
        {
            echo '<h3><a id="back" onclick="ComeBack()">&lt;&lt;</a>&nbsp;&nbsp;UPDATE ORDER</h3>';
            echo '<div id="form">';
            echo '<form name="update" action="index.php?a=25&madondathang='.$madondathang.'" method="POST" id="idForm">';
            echo'<h4>Status:</h4>';
            echo '<div id="city" name="status">';
            echo '<select name="status">';
            $donDatHangBUS = new DONDATHANGBUS();
            $donDatHang = $donDatHangBUS->GetByID($madondathang);
            $tinhTrangBUS = new TinhTrangBUS();
            $lstTinhTrang = $tinhTrangBUS->GetAll();
            foreach ($lstTinhTrang as $tinhTrang)
            {
                if($tinhTrang->MaTinhTrang == $donDatHang->MaTinhTrang)
                {
                    echo "<option value='$tinhTrang->MaTinhTrang' selected>$tinhTrang->TenTinhTrang</option>";   
                }
                else
                {
                    echo "<option value='$tinhTrang->MaTinhTrang'>$tinhTrang->TenTinhTrang</option>"; 
                }
            }
            echo '</select>';
            echo '<input type="submit" name="update" id="smSignUp" value="Update">';
            echo '</form>';
            echo '</div></div>';

        }
        public function FormDetailAccount($maTaiKhoan)
        {
            $taiKhoanBUS = new TaiKhoanBUS();
            $taiKhoan = $taiKhoanBUS->GetByID($maTaiKhoan);
            echo "<h3><a id='back' onclick='ComeBack()'>&lt;&lt;</a>&nbsp;&nbsp;ACCOUNT DETAILS</h3>";
            echo '<div id="Operation">';
            if($taiKhoan->BiXoa == 0)
            {
                echo ('<input type="image" src="GUI/images/lock.png" id="btnlock" onclick="location=\'index.php?a=24&mataikhoan='.$taiKhoan->MaTaiKhoan.'\';">');
            }
            else
            {
                echo ('<input type="image" src="GUI/images/unlock.png" id="btnunlock" onclick="location=\'index.php?a=24&mataikhoan='.$taiKhoan->MaTaiKhoan.'\';">');
            }
            echo ('<input type="image" src="GUI/images/edit.png" id="btnupdate" onclick="location=\'index.php?a=22&mataikhoan='.$taiKhoan->MaTaiKhoan.'\';">');
            echo ('<input type="image" src="GUI/images/delete.png" id="btndelete" onclick="location=\'index.php?a=23&mataikhoan='.$taiKhoan->MaTaiKhoan.'\';">');
            echo '</td>';
            echo '</div>';
            echo"<table id='frmDetail' cellspacing='0'>";
            echo "<tr>";
                echo "<td>ID Account</td>";
                echo "<td>$taiKhoan->MaTaiKhoan</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>User name</td>";
                echo "<td>$taiKhoan->TenDangNhap</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Date of Birth</td>";
                echo "<td>$taiKhoan->NgaySinh</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Display name</td>";
                echo "<td>$taiKhoan->TenHienThi</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Address</td>";
                echo "<td>$taiKhoan->DiaChi</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Email</td>";
                echo "<td>$taiKhoan->Email</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Type Account</td>";
                $loaiTaiKhoanBUS = new LoaiTaiKhoanBUS();
                $loaiTaiKhoan = $loaiTaiKhoanBUS->GetByID($taiKhoan->MaLoaiTaiKhoan);
                if($loaiTaiKhoan == null)
                {
                    echo "<td></td>";
                }
                else
                {
                    echo "<td>$loaiTaiKhoan->TenLoaiTaiKhoan</td>";
                }
            echo "</tr>";
            echo "</table>";

        }
        public function FormDetailProduct($maSanPham)
        {
            $sanPhamBUS = new SanPhamBUS();
            $sanPham = $sanPhamBUS->GetByID(($maSanPham));
            echo "<h3><a id='back' onclick='ComeBack()'>&lt;&lt;</a>&nbsp;&nbsp;PRODUCT DETAILS</h3>";
            echo '<div id="Operation">';
            if($sanPham->BiXoa == 0)
            {
                echo ('<input type="image" src="GUI/images/lock.png" id="btnlock" onclick="location=\'index.php?a=24&masanpham='.$sanPham->MaSanPham.'\';">');
            }
            else
            {
                echo ('<input type="image" src="GUI/images/unlock.png" id="btnunlock" onclick="location=\'index.php?a=24&masanpham='.$sanPham->MaSanPham.'\';">');
            }
            echo ('<input type="image" src="GUI/images/edit.png" id="btnupdate" onclick="location=\'index.php?a=22&masanpham='.$sanPham->MaSanPham.'\';">');
            echo ('<input type="image" src="GUI/images/delete.png" id="btndelete" onclick="location=\'index.php?a=23&masanpham='.$sanPham->MaSanPham.'\';">');
            echo '</div>';
            echo"<table id='frmDetail' cellspacing='0'>";
            echo "<tr>";
                echo "<td>ID Product</td>";
                echo "<td>$sanPham->MaSanPham</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>User name</td>";
                echo "<td>$sanPham->TenSanPham</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Date Added</td>";
                echo "<td>$sanPham->NgayNhap</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Quantity Exists</td>";
                echo "<td>$sanPham->SoLuongTon</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Sell ??Number</td>";
                echo "<td>$sanPham->SoLuongBan</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Bi Xoa</td>";
                echo "<td>$sanPham->BiXoa</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>ID of Product Type</td>";
                echo "<td>$sanPham->MaLoaiSanPham</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>ID of Manufacturer</td>";
                echo "<td>$sanPham->MaHangSanXuat</td>";
            echo "</tr>";
            echo "</table>";
        }
        public function FormDetailOrder($madondathang)
        {
            $donDatHangBUS = new DonDatHangBUS();
            $taiKhoanBUS = new TaiKhoanBUS();
            $chiTietDonDatHangBUS = new ChiTietDonDatHangBUS();
            $donDatHang = $donDatHangBUS->GetByID($madondathang);
            $taiKhoan = $taiKhoanBUS->GetByID($donDatHang->MaTaiKhoan);
            $lstchiTietDonDatHang = $chiTietDonDatHangBUS->GetByMaDonDatHang($madondathang);
            echo "<h3><a id='back' onclick='ComeBack()'>&lt;&lt;</a>&nbsp;&nbsp;ACCOUNT DETAILS</h3>";
            echo '<div id="Operation">';
            echo ('<input type="image" src="GUI/images/print.png" id="btnunlock" onclick="PrintOrder()">');
            echo '</div>';
            echo '<div id="detailorder">';
            echo '<div>Order ID: '.$madondathang.'/('.$donDatHang->NgayLap.')</div>';
            echo '<div>Customer: '.$taiKhoan->TenHienThi.'</div>';
            echo '<div>Phone Number: '.$taiKhoan->DienThoai.'</div>';
            echo '<div>Address: '.$taiKhoan->DiaChi.'</div>';
            echo '<div>Total Cost: '.$donDatHang->TongThanhTien.'</div>';
            echo"<table id='idTable' cellspacing='0'>
            <thead>
                <tr>
                    <th>Detail ID</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>";
                foreach($lstchiTietDonDatHang as $chitiet)
                { 
                    echo "<tr>";
                    echo "<td>$chitiet->MaChiTietDonDatHang</td>";
                    echo "<td>$chitiet->GiaBan</td>";
                    echo "<td>$chitiet->SoLuong</td>";
                    $tonggia = $chitiet->GiaBan*$chitiet->SoLuong;
                    echo "<td>$tonggia</td>";
                    echo '</tr>';
                }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
    }
?>