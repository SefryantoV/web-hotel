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
  $insertSQL = sprintf("INSERT INTO `admin` (id_admin, nama_admin, password) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['id_admin'], "text"),
                       GetSQLValueString($_POST['nama_admin'], "text"),
                       GetSQLValueString($_POST['password'], "text"));

  mysql_select_db($database_hotel1, $hotel1);
  $Result1 = mysql_query($insertSQL, $hotel1) or die(mysql_error());

  $insertGoTo = "loginadmin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_hotel1, $hotel1);
$query_register = "SELECT * FROM `admin`";
$register = mysql_query($query_register, $hotel1) or die(mysql_error());
$row_register = mysql_fetch_assoc($register);
$totalRows_register = mysql_num_rows($register);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body,td,th {
	font-size: 36px;
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
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table align="center">
    <tr valign="baseline">
      <td align="left" nowrap="nowrap">Id_admin:</td>
      <td valign="baseline"><input type="text" name="id_admin" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" nowrap="nowrap">Nama_admin:</td>
      <td valign="baseline"><input type="text" name="nama_admin" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" nowrap="nowrap">Password:</td>
      <td valign="baseline"><input type="text" name="password" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Register" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($register);
?>
