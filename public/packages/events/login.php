<?php

$db = '../../server/scris.db';
$conn = new SQLite3($db);

if (isset($_POST['pin'])) {
    $pin = $_POST['pin'];

    $sql = "SELECT * FROM user WHERE id = 1";
    $result = $conn->query($sql);
    $row = $result->fetchArray(SQLITE3_ASSOC);
    $pin_db = $row['password'];
    $email = $row['email'];
    $name = $row['name'];

    //verificar hash
    if (password_verify($pin, $pin_db)) {
        //iniciar sesión
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['loggedin'] = true;
        echo 'success';
        header('Location: ../../ingresos.php');
    } else {
        echo '<script>alert("Pin incorrecto")</script>';
        header('Location: ../../index.php');
    }
}

if (isset($_POST['pin2'])) {
    $pin = $_POST['pin2'];

    $sql = "SELECT * FROM user WHERE id = 1";
    $result = $conn->query($sql);
    $row = $result->fetchArray(SQLITE3_ASSOC);
    $pin_db = $row['password'];
    $email = $row['email'];
    $name = $row['name'];

    //verificar hash
    if (password_verify($pin, $pin_db)) {
        //iniciar sesión
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['loggedin'] = true;
        echo 'success';
    } else {
        echo 'error';
    }
}
