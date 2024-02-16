<?php
    session_unset();
    session_destroy();
    header("Location:Library_mgt.html");
?>