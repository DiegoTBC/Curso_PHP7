<?php

$conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", "17062018");

$stmt = $conn->prepare("SELECT * FROM tb_usuarios");

$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//echo json_encode($results);

foreach ($results as $row) {
    foreach ($row as $key => $value){
        echo "<strong>$key: </strong> $value <br>";
    }

    echo "================================<br>";
}