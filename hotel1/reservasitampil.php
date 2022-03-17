<?php require_once('Connections/hotel1.php'); ?>
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
$query_reservasi = "SELECT * FROM reservasi";
$reservasi = mysql_query($query_reservasi, $hotel1) or die(mysql_error());
$row_reservasi = mysql_fetch_assoc($reservasi);
$totalRows_reservasi = mysql_num_rows($reservasi);
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
	text-align: center;
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
    <td height="416" colspan="3" valign="top"><ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="homeresepsionis.php">Home</a></li>
      <li><a href="kamarhotelresepsionis.php">Kamar Hotel</a></li>
      <li><a href="fasilitashotelresepsionis.php">Fasilitas Hotel</a></li>
    </ul>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>Data Reservasi</p>
      <form id="form1" name="form1" method="post" action="reservasicari.php">
Cari Tanggal
        <label for="tgl"></label>
        <input type="text" name="tgl" id="tgl" />
        <input type="submit" name="button" id="button" value="Search" />
    </form>
      <table border="1" align="center">
        <tr>
          <td width="171">id_reservasi</td>
          <td width="170">nama_tamu</td>
          <td width="180">jumlah_tamu</td>
          <td width="171">jumlah_hari</td>
          <td width="166">tipe_kamar</td>
          <td width="175">tgl_reservasi</td>
          <td width="176">tgl_check_in</td>
          <td width="186">tgl_check_out</td>
          <td width="125">harga</td>
          <td width="186">id_resepsionis</td>
          <td width="158">no_kamar</td>
          <td width="140">id_tamu</td>
          <td width="140">Print</td>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_reservasi['id_reservasi']; ?></td>
            <td><?php echo $row_reservasi['nama_tamu']; ?></td>
            <td><?php echo $row_reservasi['jumlah_tamu']; ?></td>
            <td><?php echo $row_reservasi['jumlah_hari']; ?></td>
            <td><?php echo $row_reservasi['tipe_kamar']; ?></td>
            <td><?php echo $row_reservasi['tgl_reservasi']; ?></td>
            <td><?php echo $row_reservasi['tgl_check_in']; ?></td>
            <td><?php echo $row_reservasi['tgl_check_out']; ?></td>
            <td><?php echo $row_reservasi['harga']; ?></td>
            <td><?php echo $row_reservasi['id_resepsionis']; ?></td>
            <td><?php echo $row_reservasi['no_kamar']; ?></td>
            <td><?php echo $row_reservasi['id_tamu']; ?></td>
            <td><form id="form2" name="form2" method="post" action="">
              <input class="noprint" type="button" value="printlaporan" onclick="window.print()" />
            </form></td>
          </tr>
          <?php } while ($row_reservasi = mysql_fetch_assoc($reservasi)); ?>
      </table></td>
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
mysql_free_result($reservasi);
?>
