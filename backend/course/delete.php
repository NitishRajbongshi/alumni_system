<?php
include_once __DIR__ . "/../../connections/db_connect.php";
include_once __DIR__ . "../../../backend/alumni/Alumni.php";
include_once __DIR__ . "../../../backend/course/Course.php";

$conn = connect_db();
$include_json = __DIR__ . '/../../config/config.json';
$config = file_get_contents($include_json);
$data = json_decode($config, TRUE);

$alumni_table = $data['alumni'];
$course_table = $data['course'];

// Check if the course ID is provided in the POST data
if (isset($_POST['id'])) {
    $courseId = $_POST['id'];
    $course_obj = new Course();
    $code = $course_obj->get_code_by_id($courseId);
    if ($code == false) {
        echo "Error deleting course: ";
    } else {
        // Delete the alumni from the database
        $alumni_obj = new Alumni();
        if ($alumni_obj->delete_alumni($code)) {
            // Delete the course from the database
            $deleteQuery = "DELETE FROM " . $course_table . " WHERE course_id = :course_id";
            $result = $conn->prepare($deleteQuery);
            $result->bindParam("course_id", $courseId);
            if ($result->execute()) {
                if ($result->rowCount() == 1) {
                    echo "Course deleted successfully.";
                }
            } else {
                echo "Error deleting course: ";
            }
        } else {
            echo "Error deleting course: ";
        }
    }
} else {
    echo "Invalid course ID.";
}
