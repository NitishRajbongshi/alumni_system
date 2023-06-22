<?php
include_once __DIR__ . '/../../backend/alumni/add.php';
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
    <title>dashboard</title>
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

    <main class="container m-auto">
        <div class="w-full lg:flex lg:gap-1 ">
            <!-- Prifile section-->
            <section class="mt-20 w-full h-[12rem] rounded-sm flex bg-white shadow-sm lg:w-1/3">
                <div class="flex justify-center items-center bg-blue-200">
                    <div>
                        <i class="w-full h-full fa-solid fa-user fa-4x p-10  text-blue-600"></i>
                    </div>
                </div>
                <div class="w-full p-2 flex flex-col justify-center">
                    <p class="text-blue-600 text-2xl mb-2 border-b-2 border-blue-200">Profile</p>
                    <p class="font-bold text-blue-900 my-2"><i class="fa-solid fa-envelope me-2"></i>Email :<?php echo $_SESSION['email'] ?></p>
                    <button class="w-full bg-blue-100 text-blue-600 my-1 py-1 rounded-md"><i class="fa-solid fa-pen-to-square me-2"></i>Change Password</button>
                    <button class="w-full bg-red-100 text-red-600 my-1 py-1 rounded-md"><i class="fa-solid fa-right-from-bracket me-2"></i><a href="../../backend/admin/logout.php">Logout</a></button>
                </div>
            </section>
            <section class="mt-2 w-full h-[12rem] rounded-sm bg-white shadow-sm p-4 lg:w-2/3 lg:mt-20">
                <p class="text-2xl text-red-600 border-b-2 border-red-200">Notification <i class="fa-solid fa-comment"></i></p>
                <ul>
                    <li class="my-2 text-gray-500"><i class="fa-solid fa-face-smile me-2"></i>No notification found</li>
                </ul>
            </section>
        </div>

        <div class="container mx-auto py-8">
            <h1 class="text-xl font-bold text-red-600">Statistics</h1>
            <p class="my-2 text-sm text-gray-500">Total number of alumni per course</p>
            <div class="grid grid-cols-2  md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-2">
                <?php
                $count_obj = new AddAlumni();
                $alumnies = $count_obj->count_alumni();
                if ($alumnies == false) {
                    echo "
                    <p>No Course found</p>
                    ";
                } else {
                    foreach ($alumnies as $alumni) {
                        $total_alumni = $alumni['alumni_count'];
                        $course = $alumni['course_code']; ?>

                        <div class="p-2 bg-blue-200 flex flex-col justify-center items-center">
                            <div class="text-2xl flex items-center justify-center w-28 h-28 text-white shadow-md font-bold rounded-full bg-blue-600">
                                <span><?php echo $total_alumni ?></span>
                            </div>
                            <div>
                                <h1 class="text-sm text-blue-600 font-semibold my-3"><?php echo $course ?></h1>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        </div>


    </main>
</body>

</html>