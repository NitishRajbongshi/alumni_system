<?php
include_once __DIR__ . '/../../backend/course/Course.php';
include_once __DIR__ . '/../../backend/alumni/Alumni.php';
session_start();
if (($_SESSION['loggedin'] == false) || ($_SESSION['adminLogin'] == false) || !isset($_SESSION['loggedin']) || !isset($_SESSION['adminLogin'])) {
    session_unset();
    session_destroy();
    header('location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@500&display=swap" rel="stylesheet">
    <!-- Tailwind -->
    <link rel="stylesheet" href="../../dist/output.css">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../../style.css">
    <!-- Navbar -->
    <link rel="stylesheet" href="style/navbar.css">
    <script src="script/navbar.js"></script>

    <!-- link for data table  -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <title>View</title>
</head>

<body class="bg-gray-100">
    <!-- Navbar start -->
    <?php
    include_once __DIR__ . "/assets/navbar.php";
    ?>
    <!-- Navbar end -->

    <!-- Sidebar start-->
    <?php
    include_once __DIR__ . "/assets/sidebar.php";
    ?>
    <!-- Sidebar end -->

    <main class="container mx-auto mt-20 mb-4 p-1">
        <section class="container">
            <h1 class="text-xl text-green-500 font-bold mb-2 border-s-2 border-green-500 p-2 bg-green-100 rounded-lg">
                Course Details</h1>
            <div class="bg-white p-2 rounded-lg shadow-md hover:shadow-lg">
                <table class="table" id="course_table">
                    <thead>
                        <tr>
                            <th scope="col">Course Code</th>
                            <th scope="col">Course Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $course_obj = new Course();
                        $result = $course_obj->get_course();
                        if ($result) {
                            $courses = $result->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($courses as $course) {
                                echo '
                                <tr class="border-b-2">
                                    <td>' . $course["course_code"] . '</td>
                                    <td>' . $course["course_name"] . '</td>
                                </tr>
                                ';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        <?php
        $all_alumni_obj = new Alumni();
        $result = $all_alumni_obj->get_all_alumni();
        $all_alumni_obj = new Alumni();
        $result = $all_alumni_obj->get_all_alumni();
        ?>
        <section class="my-4">
            <h1 class="text-2xl font-bold text-blue-800">Alumni Details</h1>
        </section>
        <section class="container my-4">
            <h1 class="text-md text-red-500 font-bold mb-2 border-s-2 border-red-500 p-2 bg-red-100 rounded-lg">Educational Details</h1>
            <div class="bg-white p-2 rounded-lg shadow-md hover:shadow-lg">
                <table class="table" id="alumni_contact">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Registration No.</th>
                            <th scope="col">Rollno</th>
                            <th scope="col">Course</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result) {
                            $alumnies = $result->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($alumnies as $alumni) {
                                echo '
                                <tr class="border-b-2">
                                    <td>' . $alumni["fname"] . ' ' . $alumni["lname"] . ' ' . $alumni["mname"] . '</td>
                                    <td>' . $alumni["registration_no"] . '</td>
                                    <td>' . $alumni["rollno"] . '</td>
                                    <td>' . $alumni["course"] . '</td>
                                </tr>
                                ';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        <section class="container my-4">
            <h1 class="text-md text-red-500 font-bold mb-2 border-s-2 border-red-500 p-2 bg-red-100 rounded-lg">Contact Details</h1>
            <div class="bg-white p-2 rounded-lg shadow-md hover:shadow-lg">
                <table class="table" id="alumni_education">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result) {
                            $courses = $result->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($alumnies as $alumni) {
                                echo '
                                <tr class="border-b-2">
                                    <td>' . $alumni["fname"] . ' ' . $alumni["lname"] . ' ' . $alumni["mname"] . '</td>
                                    <td>' . $alumni["phone"] . '</td>
                                    <td>' . $alumni["email"] . '</td>
                                    <td>' . $alumni["address"] . '</td>
                                </tr>
                                ';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        <section class="container my-4">
            <h1 class="text-md text-red-500 font-bold mb-2 border-s-2 border-red-500 p-2 bg-red-100 rounded-lg">Other Details</h1>
            <div class="bg-white p-2 rounded-lg shadow-md hover:shadow-lg">
                <table class="table" id="other_details">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">D.O.B</th>
                            <th scope="col">CGPA</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Passing Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result) {
                            $courses = $result->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($alumnies as $alumni) {
                                echo '
                                <tr class="border-b-2">
                                    <td>' . $alumni["fname"] . ' ' . $alumni["lname"] . ' ' . $alumni["mname"] . '</td>
                                    <td>' . $alumni["dob"] . '</td>
                                    <td>' . $alumni["cgpa"] . '</td>
                                    <td>' . $alumni["batch"] . '</td>
                                    <td>' . $alumni["pass_year"] . '</td>
                                </tr>
                                ';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        <section class="container my-4">
            <h1 class="text-md text-red-500 font-bold mb-2 border-s-2 border-red-500 p-2 bg-red-100 rounded-lg">Current Position</h1>
            <div class="bg-white p-2 rounded-lg shadow-md hover:shadow-lg">
                <table class="table" id="position">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Position</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result) {
                            $courses = $result->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($alumnies as $alumni) {
                                echo '
                                <tr class="border-b-2">
                                    <td>' . $alumni["fname"] . ' ' . $alumni["lname"] . ' ' . $alumni["mname"] . '</td>
                                    <td>' . $alumni["position"] . '</td>
                                </tr>
                                ';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!-- script for data table -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#course_table').DataTable();
        });

        $(document).ready(function() {
            $('#alumni_education').DataTable();
        });
        $(document).ready(function() {
            $('#alumni_contact').DataTable();
        });
        $(document).ready(function() {
            $('#other_details').DataTable();
        });
        $(document).ready(function() {
            $('#position').DataTable();
        });
    </script>
</body>

</html>