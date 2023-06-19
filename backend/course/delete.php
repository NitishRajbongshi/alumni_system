<?php
include_once __DIR__ . "/../../connections/db_connect.php";

$conn = connect_db();
$include_json = __DIR__ . '/../../config/config.json';
$config = file_get_contents($include_json);
$data = json_decode($config, TRUE);

$course_table = $data['course'];

// Check if the course ID is provided in the POST data
if (isset($_POST['id'])) {
    $courseId = $_POST['id'];

    // Delete the course from the database
    $deleteQuery = "DELETE FROM ".$course_table." WHERE course_id = :course_id";
    $result = $conn->prepare($deleteQuery);
    $result->bindParam("course_id", $courseId);
    if($result->execute()) {
        if($result->rowCount() == 1) {
            echo "Course deleted successfully.";
        }
    }
    else {
        echo "Error deleting course: ";
    }
} else {
    echo "Invalid course ID.";
}
