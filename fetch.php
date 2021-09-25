<?php
    require('conn.php');
    $result = mysqli_query($conn,"select level, max(id) as maxid from levels group by id");
    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            $lev = $row['level']/100;
        }
        echo $lev;
    }
    else {
        $lev = 0;
        echo $lev;
    }
?>