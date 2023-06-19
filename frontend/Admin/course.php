<?php
include_once __DIR__ . "/../../backend/course/get.php";
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
    <!-- Navbar JS -->
    <script src="script/navbar.js"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Delete a course -->
    <script src="script/delete_course.js" defer></script>
    <title>Course</title>
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

    <main class="container mx-auto">
        <div>
            <!-- Available courses -->
            <section class="mt-20 p-2 w-full h-auto rounded-sm bg-white shadow-sm lg:w-1/3">
                <h4 class="text-2xl my-3">Available Courses</h4>
                <ul>
                    <?php
                    $course_obj = new GetCourse();
                    $result = $course_obj->get_course();
                    if ($result == false) {
                    ?>
                        <p>No course is available</p>
                        <?php
                    } else {
                        $courses = $result->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($courses as $course) {
                            $course_id = $course['course_id'];
                        ?>
                            <div class="flex justify-between">
                                <li>
                                    <p class=" text-bold text-xl"><?php echo $course['course_code'] ?></p>
                                </li>
                                <a href="#" class='delete-link' data-id=<?php echo $course_id ?>><i class="fa-solid fa-trash"></i></a>
                            </div>
                            <div class="border-b-2 border-gray-200 mb-4">
                                <p class="my-2 text-bold text-md"><?php echo $course['course_name'] ?></p>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </section>

            <!-- Add new courses -->
            <section></section>
        </div>
    </main>
</body>

</html>