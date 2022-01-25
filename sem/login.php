<?php
    $host = "localhost";
    $user = "root";
    $password="";
    $dbname = "Authentication";
    /*$conn = mysqli_connect($host,$user,$password);
    if(!$conn){
        die("Connection Failed ".mysqli_connect_error());
    }
    echo "Connection Successful";
    $sql = "CREATE DATABASE Authentication";
    if(!mysqli_query($conn,$sql)){
        die("Cannot create database");
    }
    echo "Database creation Successful";*/
    $conn = mysqli_connect($host,$user,$password,$dbname);
    if(!$conn){
        die("Connection Failed ".mysqli_connect_error());
    }
    #echo "Connection Successful";
    /*$sql = "CREATE TABLE Login(
        username varchar(20) PRIMARY KEY,
        passwoed varchar(20) NOT NULL
    )";
    if(!mysqli_query($conn,$sql)){
        die("Cannot create table".mysqli_error());
    }
    echo "Table creation Successful";*/
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name = $_POST["name"];
        $pwd = $_POST["pwd"];
        $sql = "SELECT passwoed FROM Login WHERE username='".$name."'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)===0){
            #echo "inif";
            $sql1 = "INSERT INTO Login(username,passwoed) VALUES('$name','$pwd')";
            if(mysqli_query($conn,$sql1))
                echo "new user added";
            else{
                die("insertion failed ".mysqli_error());
            }
        }
        else{
            $check = mysqli_fetch_array($result);
            if($check['passwoed']==$pwd){
                echo "valid user";
            }
            else{
                echo "invalid user";
            }
        }
    }
?>
