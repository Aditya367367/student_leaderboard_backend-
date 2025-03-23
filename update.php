<!-- <?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");


if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
    http_response_code(200);
    exit();
}

include "db.php";


$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['id']) || !isset($data['name']) || !isset($data['profile_pic']) || !isset($data['marks']) || !isset($data['activity_points'])) {
    echo json_encode(["message" => "Missing required fields"]);
    http_response_code(400);
    exit();
}


$id = $conn->real_escape_string($data['id']);
$name = $conn->real_escape_string($data['name']);
$profile_pic = $conn->real_escape_string($data['profile_pic']);
$marks = intval($data['marks']);
$activity_points = intval($data['activity_points']);


$sql = "UPDATE students 
        SET name = '$name', profile_pic = '$profile_pic', marks = $marks, activity_points = $activity_points 
        WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    if ($conn->affected_rows > 0) {
        echo json_encode(["message" => "Student record updated successfully"]);
        http_response_code(200);
    } else {
        echo json_encode(["message" => "No changes made or student not found"]);
        http_response_code(404);
    }
} else {
    echo json_encode(["message" => "Error updating student", "error" => $conn->error]);
    http_response_code(500);
}

$conn->close();
?> -->
