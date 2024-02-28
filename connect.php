<?php
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $village = $_POST['village'];
    $postoffice = $_POST['postoffice'];
    $distt = $_POST['distt'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];

    $conn = new mysqli('localhost','root','','userdetails');
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into user(fullname, email, phonenumber, village, postoffice, distt, state, pin) values(?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssissssi",$fullname, $email, $phonenumber, $village, $postoffice, $distt, $state, $pin);
            $stmt->execute();
            echo "Details Added Successfully..";
            $stmt -> close();
            $conn->close();
    }

?>