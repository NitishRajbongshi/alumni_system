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
    <nav id="navbar" class="fixed top-0 z-40 flex w-full flex-row justify-end bg-gray-800 px-4 sm:justify-between">
        <ul class="breadcrumb hidden flex-row items-center py-4 text-lg text-white sm:flex">
            <li class="inline">
                <a href="#">Admin</a>
            </li>
            <li class="inline">
                <span>Dashboard</span>
            </li>
        </ul>
        <button id="btnSidebarToggler" type="button" class="py-4 text-2xl text-white hover:text-gray-200">
            <svg id="navClosed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg id="navOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden h-8 w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </nav>
    <!-- Navbar end -->

    <!-- Sidebar start-->
    <div id="containerSidebar" class="z-40">
        <div class="navbar-menu relative z-40">
            <nav id="sidebar" class="fixed left-0 bottom-0 flex w-3/4 -translate-x-full flex-col overflow-y-auto bg-gray-700 pt-6 pb-8 sm:max-w-xs lg:w-80">
                <div class="px-4 pb-6">
                    <ul class="mb-8 text-sm font-medium">
                        <li>
                            <a class="active flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600" href="#homepage">
                                <span class="select-none">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600" href="#link1">
                                <span class="select-none">link1</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="mx-auto lg:ml-80"></div>
    </div>
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