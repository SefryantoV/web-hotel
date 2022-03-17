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

if ((isset($_GET['kamarspesial'])) && ($_GET['kamarspesial'] != "") && (isset($_POST['kamarspesial']))) {
  $deleteSQL = sprintf("DELETE FROM kamar WHERE kamarspesial=%s",
                       GetSQLValueString($_GET['kamarspesial'], "text"));

  mysql_select_db($database_hotel1, $hotel1);
  $Result1 = mysql_query($deleteSQL, $hotel1) or die(mysql_error());

  $deleteGoTo = "kamarhoteladmin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

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
</head>

<body>
</body>
</html>