<!-- <?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");


if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
    http_response_code(200);
    exit();
}


$data = json_decode(file_get_contents("php://input"), true);

error_log("Delete request received: " . print_r($data, true));

if (!isset($data['id']) || empty($data['id'])) {
    echo json_encode(["message" => "Invalid ID"]);
    http_response_code(400);
    exit();
}

include "db.php";

if ($conn->connect_error) {
    echo json_encode(["message" => "Database connection failed"]);
    http_response_code(500);
    exit();
}


$id = $conn->real_escape_string($data['id']);
$query = "DELETE FROM students WHERE id = '$id'";

if ($conn->query($query) === TRUE) {
    echo json_encode(["message" => "Student deleted successfully"]);
    http_response_code(200);
} else {
    echo json_encode(["message" => "Error deleting student"]);
    http_response_code(500);
}

$conn->close();
?> -->
