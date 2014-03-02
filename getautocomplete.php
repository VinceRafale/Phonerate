<?php

include "inc/connection.php";

 $sql = "SELECT * FROM phones WHERE phonename LIKE '%".$_GET['term']."%'";

    $result = mysql_query($sql);

    //print_r ($result);

    $arr = array();
    while($row = mysql_fetch_array($result)){

    $arr[] = $row['phonename']."";
    }
    echo json_encode($arr);

  


    ?>


