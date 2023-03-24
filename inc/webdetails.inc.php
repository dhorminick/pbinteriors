<?php
    include 'database.inc.php';
    
    $GetDetails = "SELECT * FROM admin";
    $GetDetailsResult = mysqli_query($con,$GetDetails);
    if ($GetDetailsResult->num_rows > 0) {
        $rows = mysqli_fetch_array($GetDetailsResult);
        $facebook = $rows["facebook"];
        $twitter = $rows["twitter"];
        $instagram = $rows["instagram"];
    }
?>