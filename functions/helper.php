<?php
function clear($str){
  return trim(strip_tags($str));
}

function redirect($page){
    if ($page === 'contacts') {
        header("Location: index.php?page=contacts");
    } elseif ($page === 'Course_purchase') {
        header("Location: index.php?page=Course_purchase");
    } else {
        echo "Invalid page requested";
    }
    exit();
}
