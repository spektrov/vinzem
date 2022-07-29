<?php
//
//$errors = [];
//if (!empty($_GET)) {
//    if (empty($_GET['name'])) {
//        $errors[] = 'Name fields is empty';
//    }
//    if (empty($_GET['email'])) {
//        $errors[] = 'Email fields is empty';
//    }
//    if (empty($errors)) {
//        $name = $_GET['name'];
//        $email = $_GET['email'];
//        $message = $_GET['message'];
//
//        $text = $name . "\n" . $email . "\n". $message;
//        $filename = date("Y-m-d-h-m") . "_" . $name;
//
//        if (file_put_contents("../ClentRequests/$filename.txt", $text)) {
//            echo 'Успішно відправлено!';
//        }
//        else {
//            echo 'Помилка збереження.';
//        }
//    }
//}


    $mailto = "simon8497@gmail.com";  //My email address
    //getting customer data
    $name = $_POST['name']; //getting customer name
    $fromEmail = $_POST['email']; //getting customer email
//    $phone = $_POST['tel']; //getting customer Phome number
    $subject = $_POST['message']; //getting subject line from client
    $subject2 = "Підтвердження: заявка отримана | Вінагрополіс"; // For customer confirmation

    //Email body I will receive
    $message = "Имя: " . $name . "\n"
        . "Email: " . $fromEmail . "\n\n"
        . "Сообщение: " . "\n" . $subject;

    //Message for client confirmation
    $message2 = "Шановний" . $name . "\n"
        . "Дякуємо, що звернулися до нас. Ми зв'яжемося з Вами найближчим часом!" . "\n\n"
        . "З повагою," . "\n" . " Вінагрополіс";

    //Email headers
    $headers = "From: " . $fromEmail; // Client email, I will receive
    $headers2 = "From: " . $mailto; // This will receive client

    //PHP mailer function

    $result1 = mail($mailto, $subject, $message, $headers); // This email sent to My address
    $result2 = mail($fromEmail, $subject2, $message2, $headers2); //This confirmation email to client

    //Checking if Mails sent successfully

    if ($result1 && $result2) {
        $success = "Your Message was sent Successfully!";
        echo $success;
    } else {
        $failed = "Sorry! Message was not sent, Try again Later.";
        echo $failed;
    }


if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<span style='color:red'>$error</span><br>";
    }
}

// header("Location: ../html/index.html#contact_form");
// die();
