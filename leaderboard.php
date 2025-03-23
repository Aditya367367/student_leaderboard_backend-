<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");


if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
    http_response_code(200);
    exit();
}

include "db.php";


$filter = isset($_GET['filter']) ? $_GET['filter'] : 'lifetime';


$whereClause = "";
if ($filter == "weekly") {
    $whereClause = "WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)";
} elseif ($filter == "monthly") {
    $whereClause = "WHERE created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
}


$sql = "SELECT id, name, profile_pic, marks, activity_points, (marks + activity_points) AS total_score 
        FROM students 
        $whereClause
        ORDER BY total_score DESC";

$result = $conn->query($sql);
$students = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}


echo json_encode($students);
$conn->close();
?>
