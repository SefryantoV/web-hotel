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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE fasilitashotel SET fasilitas=%s WHERE fasilitastambahan=%s",
                       GetSQLValueString($_POST['fasilitas'], "text"),
                       GetSQLValueString($_POST['fasilitastambahan'], "text"));

  mysql_select_db($database_hotel1, $hotel1);
  $Result1 = mysql_query($updateSQL, $hotel1) or die(mysql_error());

  $updateGoTo = "fasilitashoteladmin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_fasilitashotel = "-1";
if (isset($_GET['fasilitastambahan'])) {
  $colname_fasilitashotel = $_GET['fasilitastambahan'];
}
mysql_select_db($database_hotel1, $hotel1);
$query_fasilitashotel = sprintf("SELECT * FROM fasilitashotel WHERE fasilitastambahan = %s", GetSQLValueString($colname_fasilitashotel, "text"));
$fasilitashotel = mysql_query($query_fasilitashotel, $hotel1) or die(mysql_error());
$row_fasilitashotel = mysql_fetch_assoc($fasilitashotel);
$totalRows_fasilitashotel = mysql_num_rows($fasilitashotel);
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
      <li><a href="fasilitashoteladmin.php">Fasilitas Hotel</a></li>
    </ul>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table align="center">
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Fasilitastambahan:</td>
          <td><?php echo $row_fasilitashotel['fasilitastambahan']; ?></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Fasilitas:</td>
          <td><input type="text" name="fasilitas" value="<?php echo htmlentities($row_fasilitashotel['fasilitas'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" value="Update record" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_update" value="form1" />
      <input type="hidden" name="fasilitastambahan" value="<?php echo $row_fasilitashotel['fasilitastambahan']; ?>" />
    </form>
    <p>&nbsp;</p>
<p>1. <strong>Kolam Renang</strong></p>
    <p><strong><img src="image/kolam renang.jpeg" width="628" height="270" /></strong></p>
    <p>2. <strong>Gym</strong></p>
    <p><img src="image/gym hotel.jpg" width="628" height="270" /></p>
    <p>3. <strong>Restoran</strong></p>
    <p><strong><img src="image/restoran hotel.jpg" width="628" height="270" /></strong></p>
    <p>4. <strong>Spa</strong></p>
    <p><strong><img src="image/sap hotel.jpg" width="628" height="270" /></strong></p>
    <p>5. <strong>Smoke Area</strong></p>
    <p><img src="image/smoke area hotel.jpg" width="628" height="270" /></p>
    <p>6. <strong>Parking Area</strong></p>
    <p><strong><img src="image/GettyImages-967770724_0.jpg" width="628" height="270" /></strong></p></td>
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
mysql_free_result($fasilitashotel);

mysql_free_result($fasilitashotel);
?>
