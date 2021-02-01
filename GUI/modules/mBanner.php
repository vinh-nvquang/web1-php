<?php
if(isset($_SESSION['tuid']) && $_SESSION['tuid'] !=1 ||!isset($_SESSION['tuid']))
{
?>
<img src="GUI/images/banner.jpg">
<?php
}
?>