<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>payments</h2>
    <table>
        <tr>
             <th>No.</th> 
             <th>name</th>
             <th>Phone</th>
             <th>address</th>
             <th>card_number</th>
             <th>expiry_month</th>
             <th>expiry_year</th>
             <th>cvv</th>  
        </tr> 
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "sneakers_store";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT name, phone, address, card_number, expiry_month, expiry_year, cvv FROM payments";
    $result=$conn->query($sql);

    $serialNumber= 1;
    if($result->num_rows>0){
        while($rows=$result->fetch_assoc()){
            echo"<tr>";
            echo"<td>".$serialNumber."</td>";
            echo"<td>".$row["name"]."</td>";
            echo"<td>".$row["phone"]."</td>";
            echo"<td>".$row["address"]."</td>";
            echo"<td>".$row["card_number"]."</td>";
            echo"<td>".$row["expiry_year"]."</td>";
            echo"<td>".$row["expiry_month"]."</td>";
            echo"<td>".$row["cvv"]."</td>";
            echo"</tr>";
            $serialNumber++;
        }
    }else{
        echo"<tr><td colspan=8>NO payment</td></tr>";
    }
    $conn->close();
    ?>
    </table>


</body>
</html>
