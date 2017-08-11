<?php
    if (is_string($message)) {
        echo "<div class='alert alert-danger'>$message</div>";

    } elseif (is_array($message)) {

        foreach ($message as $field => $msg) {
            echo "<div class='alert alert-danger'>" . current($msg) . "</div>";
        }
    }
?>