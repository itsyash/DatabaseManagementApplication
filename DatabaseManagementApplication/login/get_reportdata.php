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

$sql="select * from REPORTS3 as A,REPORTS2 as B,REPORTS1 as C where A.CUSTOMERS_PER_DAY=B.CUSTOMERS_PER_DAY and B.SALES=C.SALES;";

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>Report No</th>
<th>Customers per day</th>
<th>Sales</th>
<th>Profit/Loss</th>
<th>Amount Earned</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['REPORT_NO'] . "</td>";
  echo "<td>" . $row['CUSTOMERS_PER_DAY'] . "</td>";
  echo "<td>" . $row['SALES'] . "</td>";
  echo "<td>" . $row['PROFIT_LOSS'] . "</td>";
  echo "<td>" . $row['AMOUNT_EARNED'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


?>
