
<?php   
     $conn = mysqli_connect('LOCALHOST', 'USERNAME','PASSWORD','DBNAME');  
     $result = mysqli_query($conn, "SELECT * FROM TABLENAME");
     
     $data = array();
     while ($row = mysqli_fetch_object($result))
     {
         array_push($data, $row);
     }
     
     echo json_encode($data);
     exit();
?>

