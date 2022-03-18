<?php require_once('Connections/hotel1.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_hotel1, $hotel1);
$query_tamu = "SELECT * FROM tamu";
$tamu = mysql_query($query_tamu, $hotel1) or die(mysql_error());
$row_tamu = mysql_fetch_assoc($tamu);
$totalRows_tamu = mysql_num_rows($tamu);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body,td,th {
	font-size: 18px;
	color: #FFF;
}
body {
	background-color: #D6D6D6;
	background-image: url(image/bg.jpg);
	background-size: cover;
	background-repeat: no-repeat;
}
}
</style>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body>
<table width="1124" height="561" border="1" align="center">
  <tr>
    <td width="109" height="88"><img src="image/logo.jpg" width="232" height="108" /></td>
    <td width="755"><img src="image/banner.jpg" width="708" height="108" /></td>
    <td width="109"><img src="image/logo.jpg" alt="" width="232" height="108" /></td>
  </tr>
  <tr>
    <td height="416" colspan="3" align="center" valign="top"><ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="homeresepsionis.php">Home</a></li>
      <li><a href="kamarhotelresepsionis.php">Kamar Hotel</a></li>
      <li><a href="fasilitashotelresepsionis.php">Fasilitas Hotel</a></li>
    </ul>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>Data Tamu</p>
      <form id="form1" name="form1" method="get" action="tamucari.php">
        Cari Nama
        <label for=""></label>
        <input type="text" />
        <input type="submit" name="button" id="button" value="Search" />
      </form>
      <?php if ($totalRows_tamu > 0) { // Show if recordset not empty ?>
  <table border="1" align="center">
    <tr>
      <td>id_tamu</td>
      <td>nik</td>
      <td>alamat</td>
      <td>nama_tamu</td>
      <td>no_telp</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_tamu['id_tamu']; ?></td>
        <td><?php echo $row_tamu['nik']; ?></td>
        <td><?php echo $row_tamu['alamat']; ?></td>
        <td><?php echo $row_tamu['nama_tamu']; ?></td>
        <td><?php echo $row_tamu['no_telp']; ?></td>
      </tr>
      <?php } while ($row_tamu = mysql_fetch_assoc($tamu)); ?>
  </table>
  <?php } // Show if recordset not empty ?>
<p>&nbsp;</p>
<p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="3">Lubuk Baja, Batam, Kepulauan Riau, Indonesia</td>
  </tr>
</table>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
<?php
mysql_free_result($tamu);
?>
