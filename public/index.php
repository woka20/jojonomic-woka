<?php

$servername = "localhost";
$username = "woka-ubuntu";
$password = "woka";
$dbName="bambang";
// echo "bambang $dbName";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//Create database
$sql = "CREATE DATABASE $dbName";
// echo $sql;
// if (!$sql){
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "GAGAL";
    // $error= $conn->error;
};


//Create Tables
$catalog="CREATE TABLE $dbName.products_cd (
    id INT(200) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    rate INT(30) NOT NULL,
    category VARCHAR(40) NOT NULL,
    quantity INT(255) NOT NULL)";
 

$users="CREATE TABLE $dbName.users(
    id INT(200) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone INT(15) NOT NULL)";


$rent="CREATE TABLE $dbName.rent(
    id INT(200) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user VARCHAR(30) NOT NULL,
    id_product VARCHAR(50) NOT NULL,
    begin_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status_rent VARCHAR(20) NOT NULL,
    end_date TIMESTAMP DEFAULT NULL,
    total_payment INT(200),
    FOREIGN KEY (id_user) REFERENCES users(id),
    FOREIGN KEY (id_product) REFERENCES products_cd(id)
)";

if ($conn->query($catalog) === TRUE && $conn->query($users) === TRUE && $conn->query($rent) === TRUE) {
    echo "TABLE created successfully";
} else {
    echo $conn->error;
    $message="TABLE Already Existed";
};

$conn->close();


// $app->run();
