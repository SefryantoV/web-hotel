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
$query_login = "SELECT * FROM resepsionis";
$login = mysql_query($query_login, $hotel1) or die(mysql_error());
$row_login = mysql_fetch_assoc($login);
$totalRows_login = mysql_num_rows($login);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['textfield'])) {
  $loginUsername=$_POST['textfield'];
  $password=$_POST['textfield2'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "homeresepsionis.php";
  $MM_redirectLoginFailed = "registerresepsionis.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_hotel1, $hotel1);
  
  $LoginRS__query=sprintf("SELECT nama_resepsionis, password FROM resepsionis WHERE nama_resepsionis=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $hotel1) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
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
<form ACTION="<?php echo $loginFormAction; ?>" id="form1" name="form1" method="POST">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="200" border="1" align="center">
    <tr>
      <td width="166">Username</td>
      <td width="8">:</td>
      <td width="8"><label for="textfield10"></label>
      <input type="text" name="textfield" id="textfield10" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td>:</td>
      <td><label for="textfield11"></label>
      <input type="text" name="textfield2" id="textfield11" /></td>
    </tr>
    <tr>
      <td colspan="3"><input type="submit" name="button" id="button" value="Login" /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($login);
?>
