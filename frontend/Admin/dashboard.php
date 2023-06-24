<?php
include_once __DIR__ . '/../../backend/alumni/Alumni.php';
include_once __DIR__ . '/../../backend/admin/Admin.php';
session_start();
if (($_SESSION['loggedin'] == false) || ($_SESSION['adminLogin'] == false) || !isset($_SESSION['loggedin']) || !isset($_SESSION['adminLogin'])) {
    session_unset();
    session_destroy();
    header('location: login.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $current_password = $_POST['cp'];
    $new_password = $_POST['np'];
    if(isset($new_password)){
        $admin_obj = new Admin();
        if($admin_obj->change_password($_SESSION['email'], $current_password, $new_password)) {
            echo '<script>alert("Password updated");</script>';
        } else {
            echo '<script>alert("Password failed to updated");</script>';
        }
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

    <main class="container m-auto p-1">
        <div class="w-full flex flex-col gap-2 md:flex-row ">
            <!-- Prifile section-->
            <section class="mt-20 w-full p-4 rounded-xl shadow-md hover:shadow-lg bg-white md:w-1/3">
                <div class="w-full p-2 flex flex-col justify-center items-center">
                    <div class="bg-blue-100 rounded-full">
                        <i class="w-full h-full fa-solid fa-user fa-3x p-10  text-blue-600"></i>
                    </div>
                    <p class="font-bold text-blue-900 my-2"><i class="fa-solid fa-envelope me-2"></i><?php echo $_SESSION['email'] ?></p>
                    <div class="py-2 px-5 rounded-md bg-red-100">
                        <button class="text-sm text-red-600 "><i class="fa-solid fa-right-from-bracket me-2"></i><a href="../../backend/admin/logout.php">Logout</a></button>
                    </div>

                    <!-- <button class="mt-10 text-sm bg-blue-100 text-blue-600 my-1 py-1 rounded-md"><i class="fa-solid fa-pen-to-square me-2"></i>Change Password</button> -->
                </div>
            </section>
            <section class="mt-2 w-full  md:w-2/3 md:mt-20">
                <img class="rounded-xl shadow-md hover:shadow-lg" src="../../assets/images/banner.png" alt="banner" width="100%">
            </section>
        </div>

        <div class="w-full flex flex-col gap-2 md:flex-row ">
            <section class="mt-2 w-full p-4 rounded-xl shadow-md hover:shadow-lg bg-white md:w-1/3">
                <h1 class="my-2 text-xl text-blue-700 border-b-2 border-blue-200">Change password</h1>

                <form action="" method="POST">
                    <div class="w-full flex flex-col">
                        <label class="text-sm my-2 text-blue-500" for="cp">Current Password <span class="text-red-500">*</span></label>
                        <input type="password" name="cp" id="cp" class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100" placeholder="xxxxxxxxxx" maxlength="20" required>
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="text-sm my-2 text-blue-500" for="np">New Password <span class="text-red-500">*</span></label>
                        <input type="password" name="np" id="np" class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100" placeholder="xxxxxxxxxx" maxlength="20" required>
                    </div>
                    <div class="my-3">
                        <input class="bg-blue-100 text-blue-600 px-4 py-2 rounded-md hover:bg-blue-300 hover:cursor-pointer hover:shadow-sm" type="submit" name="submit" value="Confirm">
                    </div>
                </form>
            </section>
        </div>

        <div class="container mx-auto py-8">
            <h1 class="text-2xl font-bold text-red-600 border-b-2 border-red-200">Statistics</h1>
            <p class="my-2 text-md text-blue-500">How many alumni do we have??</p>
            <div class="grid grid-cols-2  md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-2">
                <?php
                $count_obj = new Alumni();
                $alumnies = $count_obj->count_alumni();
                if ($alumnies == false) {
                ?>
                    <div class="p-2 bg-blue-200 flex flex-col justify-center items-center rounded-2xl shadow-md hover:shadow-lg">
                        <div class="text-2xl flex items-center justify-center w-28 h-28 text-white shadow-md font-bold rounded-full bg-blue-600">
                            <span><i class="fa-solid fa-face-sad-cry fa-2x"></i></span>
                        </div>
                        <div>
                            <h1 class="text-sm text-blue-600 font-semibold my-3">No course Added</h1>
                        </div>
                    </div>
                    <?php
                } else {
                    foreach ($alumnies as $alumni) {
                        $total_alumni = $alumni['alumni_count'];
                        $course = $alumni['course_code']; ?>

                        <div class="p-2 bg-blue-200 flex flex-col justify-center items-center rounded-2xl shadow-md hover:shadow-lg">
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
    <?php
    include_once __DIR__ . '/../../components/footer.php';
    ?>
</body>

</html>