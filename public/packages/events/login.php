<?php

$db = '../../server/scris.db';

if (isset($_POST['pin'])) {
    $pin = $_POST['pin'];

    $sql = "SELECT * FROM user WHERE id = 1";
}
