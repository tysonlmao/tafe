<?php

if ($_POST['action'] !== "login") {
    echo "Submit correctly pls";
} else if ($_POST['mail'] === ""){
    echo "provide proper login info";
}