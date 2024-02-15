
<?php
    require("./connection_connect.php");
    $getdate = $_POST["getdate"];
    $term = (int)$_POST["term"];
    $year = (int)$_POST["year"];
    // echo $year ;
    // echo $term ;
    // echo gettype($year);
    // echo gettype($term);
    // echo $getdate;
    // echo gettype($getdate);

    
    $result = $conn->query("SELECT calendar_id FROM OpenDate NATURAL JOIN Year WHERE term_id = $term and year_id = $year ");
    $calendarid = $result->fetch_array()['calendar_id'];
    // echo $open
    $strSQL = "INSERT INTO GetDate(`get_date`, `calendar_id`) VALUES ('$getdate',$calendarid)";
    $conn->query($strSQL);
    
    require("connection_close.php");
    echo '<script>';
    echo 'alert("Insert Done.");';
    echo 'window.location.href = "./addData.php";';  // Redirect after displaying alert
    echo '</script>';
?>

