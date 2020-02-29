<?php

$servername = "localhost";
$username = "woka-ubuntu";
$password = "woka";
$dbName="ew9";

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
    
    $error= $conn->error;
};


//Create Tables
$catalog="CREATE TABLE IF NOT EXISTS $dbName.products_cd (
    id_product INT(200) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    rate INT(30) NOT NULL,
    category VARCHAR(40) NOT NULL,
    quantity INT(255) NOT NULL)";
 

$users="CREATE TABLE IF NOT EXISTS $dbName.users(
    id_user INT(200) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone INT(15) NOT NULL)";


$rent="CREATE TABLE IF NOT EXISTS $dbName.rent(
    id_rent INT(200) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT(200) UNSIGNED NOT NULL,CONSTRAINT fk_user FOREIGN KEY (id_user) REFERENCES users(id_user) ON UPDATE CASCADE ON DELETE RESTRICT,
    id_product INT(200) UNSIGNED NOT NULL,CONSTRAINT fk_product FOREIGN KEY (id_product) REFERENCES products_cd(id_product) ON UPDATE CASCADE ON DELETE RESTRICT,
    begin_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status_rent VARCHAR(20) NOT NULL,
    end_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_payment INT(200)
)";

if ($conn->query($catalog) === TRUE && $conn->query($users) === TRUE && $conn->query($rent) === TRUE) {
    echo "TABLE created successfully";
} else {
    echo $conn->error;
    $message="TABLE Already Existed";
};

$conn->close();



