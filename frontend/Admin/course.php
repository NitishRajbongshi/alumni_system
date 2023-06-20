<?php
include_once __DIR__ . "/../../backend/course/get.php";
include_once __DIR__ . "/../../backend/course/add.php";
session_start();
if (($_SESSION['loggedin'] == false) || ($_SESSION['adminLogin'] == false) || !isset($_SESSION['loggedin']) || !isset($_SESSION['adminLogin'])) {
    session_unset();
    session_destroy();
    header('location: login.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $code = $_POST['course_code'];
    $name = $_POST['course_name'];

    $add_obj = new AddCourse();
    $status = $add_obj->add_course($code, $name);
    if($status) {
        header('location: course.php');
    }
    else {
        echo "
        <alert>Course not added</alert>
        ";
    }
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
        <div class="lg:flex lg:gap-1">
            <!-- Available courses -->
            <section class="mt-20 p-2 w-full h-auto rounded-sm bg-white shadow-sm lg:w-1/3">
                <h4 class="text-2xl my-3 text-slate-800">Available Courses</h4>
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
                                    <p class="text-slate-700 text-bold text-xl"><i class="fa-solid fa-paperclip me-2"></i><?php echo $course['course_code'] ?></p>
                                </li>
                                <a href="#" class='delete-link text-red-500' data-id=<?php echo $course_id ?>><i class="fa-solid fa-trash"></i></a>
                            </div>
                            <div class="border-b-2 border-gray-200 mb-4">
                                <p class="my-2 text-gray-600  text-bold text-md"><?php echo $course['course_name'] ?></p>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </section>

            <!-- Add new courses -->
            <section class="mt-2 lg:mt-20 p-2 w-full h-auto rounded-sm bg-white shadow-sm lg:w-2/3">
                <h4 class="text-2xl my-3 text-green-800">Add New Course </h4>
                <form action="" method="POST">
                    <div class="flex flex-col">
                        <label class="my-2 text-sm text-green-700" for="course_code"><i class="fa-solid fa-pen-nib me-2"></i>Course code <span class="text-red-600">*</span></label>
                        <input class="w-full bg-gray-50 p-2 text-md outline-1 outline-green-100" type="text" id="course_code" name="course_code" placeholder="Eg: B.Sc CS">
                    </div>
                    <div class="flex flex-col">
                        <label class="my-2 text-sm text-green-700" for="course_name"><i class="fa-solid fa-pen-nib me-2"></i>Course Name <span class="text-red-600">*</span></label>
                        <input class="w-full bg-gray-50 p-2 text-md outline-1 outline-green-100" type="text" id="course_name" name="course_name" placeholder="Eg: Bachelor of Science in Computer Science">
                    </div>
                    <div class="my-3">
                        <input class="py-2 px-4 bg-green-50 text-green-800 hover:bg-green-100 hover:shadow-sm hover:cursor-pointer" type="submit" name="submit" value="Add Course">
                    </div>
                </form>
            </section>
        </div>
    </main>
</body>

</html>