<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	// echo "welcome"
} else {
    header('Location: access.php');
}
?>

<?php
require 'connect.inc.php';

$sql="SELECT * FROM PAYMENT";

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>Customer Id</th>
<th>Date</th>
<th>Discount</th>
<th>Payment Mode</th>
<th>Essn</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['CUSTOMER_ID'] . "</td>";
  echo "<td>" . $row['DATE'] . "</td>";
  echo "<td>" . $row['DISCOUNT'] . "</td>";
  echo "<td>" . $row['PAYMENT_MODE'] . "</td>";
  echo "<td>" . $row['ESSN'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


?>

