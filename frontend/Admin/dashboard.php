<?php
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
        include_once __DIR__."/assets/navbar.php";
    ?>
    <!-- Navbar end -->

    <!-- Sidebar start-->
    <?php 
        include_once __DIR__."/assets/sidebar.php";
    ?>
    <!-- Sidebar end -->

    <main class="container m-auto">
        <div class="w-full lg:flex lg:gap-1 ">
            <!-- Prifile section-->
            <section class="mt-20 w-full h-[12rem] rounded-sm flex bg-white shadow-sm lg:w-1/3">
                <div>
                    <i class="w-full h-full fa-solid fa-user fa-4x p-10 bg-blue-50 text-blue-600"></i>
                </div>
                <div class="w-full p-2 flex flex-col justify-center">
                    <p class="text-blue-600 text-2xl mb-2 border-b-2 border-blue-200">Admin Profile</p>
                    <p class="font-bold text-blue-900 my-2">Email :<?php echo $_SESSION['email'] ?></p>
                    <button class="w-full bg-blue-100 text-blue-600 my-1 py-1 rounded-md">Change Password</button>
                    <button class="w-full bg-red-100 text-red-600 my-1 py-1 rounded-md">Logout</button>
                </div>
            </section>
            <section class="mt-2 w-full h-[12rem] rounded-sm bg-white shadow-sm p-4 lg:w-2/3 lg:mt-20">
                <p class="text-2xl text-red-600 border-b-2 border-red-200">Notification</p>
                <ul>
                    <li class="my-2 text-gray-500">No notification found</li>
                </ul>
            </section>
        </div>
    </main>
</body>

</html>