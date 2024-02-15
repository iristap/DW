
<?php
    require("./connection_connect.php");
    
    $strSQL = "DELETE FROM getdate WHERE 1";
    $conn->query($strSQL);
    
    require("connection_close.php");
    echo '<script>';
    echo 'alert("Delete Done.");';
    echo 'window.location.href = "./home.php";';  // Redirect after displaying alert
    echo '</script>';
?>
