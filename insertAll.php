<?php
    move_uploaded_file($_FILES["fileCSV"]["tmp_name"], $_FILES["fileCSV"]["name"]); // Copy/Upload CSV
    require("connection_connect.php");
    $isFirstRow = true;
    $objCSV = fopen($_FILES["fileCSV"]["name"], "r");
    while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
        if ($isFirstRow) {
            $isFirstRow = false;
            continue; // Skip the first row (header)
        }
        $getdate = $objArr[0];
        $term = $objArr[1];
        $year = $objArr[2];
        
        $termsql = "SELECT term_id FROM term WHERE term_name ='$term'";
        $result = $conn->query($termsql);
        $termID = $result->fetch_assoc()["term_id"];

        $yearsql = "SELECT year_id FROM year WHERE year_num ='$year'";
        $result = $conn->query($yearsql);
        $yearId = $result->fetch_assoc()["year_id"];

        $result = $conn->query("SELECT calendar_id FROM opendate  WHERE term_id = $termID and year_id = $yearId");
        $calendar_id = $result->fetch_array()['calendar_id'];
        // echo $open;
        $strSQL = "INSERT INTO GetDate(`get_date`, `calendar_id`) VALUES ('$getdate',$calendar_id)";
        $conn->query($strSQL);
    }
    fclose($objCSV);
    require("connection_close.php");
    echo '<script>';
    echo 'alert("Import Done.");';
    echo 'window.location.href = "./home.php";';  // Redirect after displaying alert
    echo '</script>';
?>
