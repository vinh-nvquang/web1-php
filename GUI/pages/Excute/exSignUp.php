<?php
  if(isset($_POST["submit"]))
  {
      $fullname = $_POST["fullname"];
      $day = $_POST["day"];
      $month = $_POST["month"];
      $year = $_POST["year"];
      $city = $_POST["city"];
      $usname = $_POST["usname"];
      $pass = $_POST["password"];
      $cfpass=$_POST["cfpassword"];
      $captcha = $_POST["captcha"];
      $taiKhoanBUS = new TaiKhoanBUS();
      $a = $taiKhoanBUS->CheckExistsUser($usname);
      if($usname == "" || $pass == "" || $cfpass =="" || $captcha == "")
      {
            $_SESSION['checknull'] = 1;
            header("location:index.php?a=13");
      }
      else if($a == 1)
      {
            $_SESSION['checkexists'] = 1;
            header("location:index.php?a=13");
      }
      else if($cfpass!=$pass)
      {
            $_SESSION['checkpass'] = 1;
            header("location:index.php?a=13");
      }
      else if($captcha != $_SESSION["captcha"])
      {
            $_SESSION['checkcaptcha'] = 1;
            header("location:index.php?a=13");
      }
      else if(($day != 0 || $month != 0 || $year != 0) && checkdate($month, $day, $year) == false)
      {
            $_SESSION['checkdate'] = 1;
            header("location:index.php?a=13");
      }
      else
      {
          $taiKhoan = new TaiKhoanDTO();
          $taiKhoan->TenDangNhap = $usname;
          $taiKhoan->MatKhau = md5($pass);
          if($day!=0 ||$month != 0 || $year != 0)
          {
              $taiKhoan->NgaySinh = $year."-".$month."-".$day;
          }
          else
          {
              $taiKhoan->NgaySinh = NULL;
          }
          $taiKhoanBUS->TenHienThi = $fullname;
          $taiKhoan->DiaChi = $city;
          $check = $taiKhoanBUS->Insert($taiKhoan);
          if($check ==false)
          {
                $_SESSION['checkfalse'] = 1;
                header("location:index.php?a=13");
          }
          else
          {
                  $_SESSION['checktrue'] = 1;
                  header("location:index.php?a=13");
          }
      }
  }
  else
  {
      header("location:index.php?a=404");
  }
?>