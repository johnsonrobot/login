<?php
    require_once 'function.php';

    if (isset($_POST['user']))
    {
      $user   = sanitizeString($_POST['user']);
      $result = query_Mysql("SELECT * FROM members WHERE user='$user'");
  
      if ($result->num_rows)
        echo  "<span class='taken'>&nbsp;&#x2718; " .
              "The username '$user' is taken</span>";
      else
        echo "<span class='available'>&nbsp;&#x2714; " .
             "The username '$user' is available</span>";
    }
?>