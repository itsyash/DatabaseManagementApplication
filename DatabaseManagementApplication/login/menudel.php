<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	// echo "welcome"
} else {
    header('Location: access.php');
}
?>

<?php
//echo "hello";
 require 'connect.inc.php';
 $name=$_POST['cat'];
 $query="delete from MENU where NAME='$name'";
 $query_run=  mysql_query($query);
 if($query_run)
 {
     echo "<script type='text/javascript'>alert('Menu item deleted');</script>";
 }
 


?>
