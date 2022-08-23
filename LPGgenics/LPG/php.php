<html>
    <head>
        <title>LPG</title>
</head>
        <?php
        $servername="localhost";
        $dbname="leakage";
        $username="root";
        $password="";
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql= "select * from leakage where value>200;   ";
echo $sql;
echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>value</td> 
        <td>Timestamp</td> 
      </tr>';
      $result = $conn->query($sql)
      print_r($result);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row_TS = $row["value"];
        $row_value = $row["Timestamp"];
       
      
        echo '<tr> 
                <td>' . $value . '</td> 
                <td>' . $Timestamp . '</td> 
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</body>
</html>

