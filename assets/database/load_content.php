<?php
if (isset($_POST['page'])) {
    $page = $_POST['page'];
    if (file_exists("pages/$page.php")) {
        include "pages/$page.php";
    } else {
        echo "Page not found.";
    }
} else {
    echo "No page specified.";
}
?>