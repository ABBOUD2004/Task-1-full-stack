<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli("localhost", "root", "", "training_system");
    if ($conn->connect_error) {
        http_response_code(500);
        echo json_encode(["error" => "Connection failed"]);
        exit;
    }
    $data = json_decode(file_get_contents("php://input"), true);
    $name = $data["name"] ?? null;
    $email = $data["email"] ?? null;
    if ($name && $email) {
        $stmt = $conn->prepare("INSERT INTO students (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Student added"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Insert failed"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Missing fields"]);
    }
    $conn->close();
}