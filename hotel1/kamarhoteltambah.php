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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO kamar (kamarspesial, keterangankamar) VALUES (%s, %s)",
                       GetSQLValueString($_POST['kamarspesial'], "text"),
                       GetSQLValueString($_POST['keterangankamar'], "text"));

  mysql_select_db($database_hotel1, $hotel1);
  $Result1 = mysql_query($insertSQL, $hotel1) or die(mysql_error());

  $insertGoTo = "kamarhoteladmin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_hotel1, $hotel1);
$query_kamartambah = "SELECT * FROM kamar";
$kamartambah = mysql_query($query_kamartambah, $hotel1) or die(mysql_error());
$row_kamartambah = mysql_fetch_assoc($kamartambah);
$totalRows_kamartambah = mysql_num_rows($kamartambah);
$query_kamartambah = "SELECT * FROM kamar";
$kamartambah = mysql_query($query_kamartambah, $hotel1) or die(mysql_error());
$row_kamartambah = mysql_fetch_assoc($kamartambah);
$totalRows_kamartambah = mysql_num_rows($kamartambah);
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
      <li><a href="homeadmin.php">Home</a></li>
      <li><a href="kamarhoteladmin.php">Kamar Hotel</a></li>
      <li><a href="fasilitashoteladmin.php">Fasilitas Hotel</a>      </li>
    </ul>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <table align="center">
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Kamarspesial:</td>
            <td><input type="text" name="kamarspesial" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">Keterangankamar:</td>
            <td><input type="text" name="keterangankamar" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">&nbsp;</td>
            <td><input type="submit" value="Insert record" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form1" />
      </form>
      <p>1. <strong>Standard Room</strong></p>
      <p><img src="image/1.-standard-room-sumber-gambar-Pixabay.jpg" width="628" height="270" /></p>
      <p>Seperti namanya, jenis kamar <em>standard room</em> adalah tipe kamar hotel yang paling dasar di hotel. Biasanya, kamar tipe ini dibanderol dengan harga yang relatif murah. Fasilitas yang ditawarkan pun standar seperti kasur ukuran <em>king size</em> atau dua <em>queen size</em>. Namun, penawaran yang diberikan tergantung pada masing-masing hotel. <em>Standard room </em>hotel bintang 1 dan bintang 5 tentu berbeda.</p>
      <h3><strong>2. Superior Room</strong></h3>
      <p><img src="image/2.-Superior-Room-sumber-gambar-Pixabay.jpg" width="628" height="270" /></p>
      <p>Pada dasarnya, superior room adalah tipe kamar yang sedikit lebih baik dari tipe <em>standard room</em>Perbedaannya dapat berupa dari fasilitas yang diberikan, interior kamar, atau pemandangannya.</p>
      <h3><strong>3. Deluxe Room</strong></h3>
      <p><img src="image/3.-Deluxe-Room-sumber-gambar-Pixabay.jpg" width="628" height="270" /></p>
      <p>Di atas tipe kamar hotel <em>superior room</em> adalah <em>deluxe room</em>. Kamar ini tentu memiliki kamar yang lebih besar. Tersedia pilihan kasur yang bisa kamu pilih, <em>double bed</em> atau <em>twin bed</em>. Biasanya, dari segi interior kamar ini terkesan lebih mewah.</p>
      <h3><strong>4. Junior Suite Room</strong></h3>
      <p><img src="image/4.-Junior-Suite-Room-sumber-gambar-Pixabay.jpg" width="628" height="270" /></p>
      <p>Tipe kamar hotel <em>junior suite room</em> ditandai dengan adanya ruang tamu. Namun, ruang tamu tersebut masih berada satu ruangan dengan tempat tidur. Ruang tamu tersebut biasanya dibatasi atau disekat dengan lemari besar agar tempat tidur tidak terlihat. </p>
      <h3><strong>5. Suite Room</strong></h3>
      <p><img src="image/5.-Suite-Room-sumber-gambar-Pixabay.jpg" width="628" height="270" /></p>
      <p><em>Suite room</em> berada di atas tipe kamar hotel <em>junior suite room</em>. Ruang tamu di kamar hotel ini terpisah dari kamar tidur. Dari segi fasilitas, tentu berbeda dari <em>junior suite room</em>. Selain ruang tamu, biasanya tipe kamar hotel ini dilengkapi dengan dapur.</p>
      <h3><strong>6. Single Room</strong></h3>
      <p><img src="image/1.-Single-Room-sumber-gambar-Pixabay.jpg" width="628" height="270" /></p>
      <p><em>Single room</em> adalah tipe kamar hotel yang paling umum. Tipe kamar hotel ini terdiri dari satu <em>single bed</em>, sofa, dan kamar mandi. Ukuran kamarnya juga tidak terlalu besar. Biasanya tipe kamar hotel ini dipilih oleh para <em>backpacker</em> atau <em>solo traveler</em> karena fasilitasnya memang untuk satu orang dan harga yang murah.</p>
      <h3><strong>7. Twin Room</strong></h3>
      <p><img src="image/2.-Twin-Room-sumber-gambar-Palmtree-Resort.jpg" width="628" height="270" /></p>
    <p>Dari namanya saja, sudah bisa ditebak bahwa tipe kamar hotel ini memiliki dua tempat tidur ukuran <em>single</em> yang terpisah. Tipe kamar hotel ini cocok digunakan untuk suami istri atau menginap bersama teman dengan jumlah orang 2-3 orang.</p></td>
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
mysql_free_result($kamartambah);
?>
