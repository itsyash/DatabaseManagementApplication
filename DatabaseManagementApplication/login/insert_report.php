
<?php
//require 'core.inc.php';
require 'connect.inc.php';
 if(isset($_POST['number']) && isset($_POST['customer']) && isset($_POST['sales']) && isset($_POST['profit']) && isset($_POST['amount']))
     { 
     $number=$_POST['number'];
     $customer=$_POST['customer'];
     $id=$_POST['choice'];
     $sales=$_POST['sales'];
     $profit=$_POST['profit'];
     $amount=$_POST['amount'];
     //echo $number;
     if(!empty($number) && !empty($customer) && !empty($sales) && !empty($profit) && !empty($amount))
         {
                 $flag=3;  
                 $query="select REPORT_NO from REPORTS3 where REPORT_NO='$number'";
                //echo $query;
                $query_run=  mysql_query($query);
                if(mysql_num_rows($query_run)>0){
                    echo 'Report Number'.$number.'already exists'.'<br>';
                    $number="";
                }
                else{
                     
                    $query="insert into REPORTS3 values('$number','$customer','$id')" ;
                    $query_run=  mysql_query($query);
                    $q="select SALES from REPORTS2 where CUSTOMERS_PER_DAY='$customer'";
                    //echo $query;
                    $q_run=  mysql_query($q);
                    if(mysql_num_rows($q_run)>0){
                        $res = mysql_fetch_array($q_run);
                        $sales=$res['SALES'];
                        $flag=1;
                        echo $sales;
                        }
                    else{  
                    $query="insert into REPORTS2 values('$customer','$sales')" ;
                    $query_run=  mysql_query($query);                        
                        
                    }
                    $q1="select SALES from REPORTS1 where SALES='$sales'";
                    //echo $query;
                    $q_run1=  mysql_query($q1);
                    if(mysql_num_rows($q_run1)>0){
                        $res1 = mysql_fetch_array($q_run1);
                        $profit=$res1['PROFIT_LOSS'];
                        $amount=$res1['AMOUNT_EARNED'];
                        $flag=2;
                        echo $profit."   ".$amount;
                        }
                    else{  
                    $query="insert into REPORTS1 values('$sales','$profit','$amount')" ;
                    $query_run=  mysql_query($query);                        
                        
                    }
                                     
                    header('Location: report.php'."?flag=".$flag);
         }
         }
     else {
         echo 'all fields are required';   
          }  
     }
    
    ?>
    <!DocType HTML>
    <html>
    <head>
<title>Add a report</title>
</head>
<body>

<form action="insert_report.php" method="POST">
    Report no:<br><input type="text" name="number" maxlength="15" ><br><br>
    Customers per day:<br><input type="text" name="customer"><br><br>
    Managed by:<?php require 'connect.inc.php';

$sql1="SELECT * FROM WORKING_STAFF2 where CATEGORY='employee'";

$result1 = mysql_query($sql1);

echo "<select name='choice'>";

while($row = mysql_fetch_array($result1))
  {
    $x=$row['SSN'];
    $q="select NAME from WORKING_STAFF1 where SSN='$x'";
    $r = mysql_query($q);
    $row1 = mysql_fetch_array($r);
  echo "<option value='$x'>" . $row1['NAME'] ."</option>";
  
  }echo "</select>";
  ?><br><br>
  Sales:<br><input type="text" name="sales"><br><br>
  Profit/Loss:<br><input type="text" name="profit"><br><br>
  Amount:<br><input type="text" name="amount"><br><br>
    <input type="submit" value="Add Report">
</form>
</body>
</html>
