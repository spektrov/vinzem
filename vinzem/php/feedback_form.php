<?php

$errors = [];
if (!empty($_GET)) {
    if (empty($_GET['name'])) {
        $errors[] = 'Name fields is empty';
    }
    if (empty($_GET['email'])) {
        $errors[] = 'Email fields is empty';
    }
    if (empty($errors)) {
        $name = $_GET['name'];
        $email = $_GET['email'];
        $message = $_GET['message'];

        $text = $name . "\n" . $email . "\n". $message;
        $filename = date("Y-m-d-h-m") . "_" . $name;

        if (file_put_contents("../ClientRequests/$filename.txt", $text)) {
            echo 'Успішно відправлено!';
        }
        else {
            echo 'Помилка збереження.';
        }
    }
}
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<span style='color:red'>$error</span><br>";
    }
}

header("Location: ../index.html#contact_form");
die();
