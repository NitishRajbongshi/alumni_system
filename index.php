<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@500&display=swap" rel="stylesheet">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Tailwind -->
    <link rel="stylesheet" href="dist/output.css">

    <link rel="stylesheet" href="style.css">
    <title>Alumni Management System</title>
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <div class="flex justify-between items-center p-4 sticky top-0 bg-white shadow-sm">
        <div>
            <p class="text-xl md:text-3xl text-gray-600"><span class="text-red-600">Alumni</span> Management System</p>
        </div>
        <div class="text-blue-600 hover:border-b-2 hover:border-blue-600 hover:cursor-pointer">
            <a href="frontend/Admin/login.php">Login</a>
        </div>
    </div>

    <!-- image -->
    <div class="container mx-auto p-1">
        <div class="rounded-md md:rounded-xl shadow-md hover:shadow-lg flex w-[100%] justify-center items-center">
            <img src="assets/images/alumni.jpg" alt="alumni" class="rounded-md md:rounded-xl h-auto w-full">
        </div>

        <div class="md:flex md:gap-4 mt-4">
            <!-- About -->
            <div class="w-full p-4 rounded-md md:rounded-xl shadow-md hover:shadow-lg bg-white  md:w-1/2">
                <p class="py-4 text-2xl font-bold text-blue-600">About</p>
                <p class="py-4 text-justify text-gray-500 text-md">
                    <i class="fa-solid fa-quote-left"></i>
                    Alumni Management System! This platform is designed to store and manage alumni details, organizing them based on their courses and important information. While it does not facilitate direct communication between alumni, the aim is to create a centralized hub for storing and accessing alumni records. It maintains a comprehensive database of their achievements and milestones.
                </p>
            </div>

            <div class="w-full p-4 rounded-md shadow-md bg-white mt-2 md:mt-0 md:w-1/2 md:rounded-xl  hover:shadow-lg">
                <p class="py-4 text-2xl font-bold text-blue-600">Instruction</p>

                <ul class="py-4 text-justify text-gray-500 text-md">
                    <li> <span class="text-blue-300"><i class="fa-solid fa-circle-info me-2 "></i></span> Go to login page and enter valid credentials</li>
                    <li> <span class="text-blue-300"><i class="fa-solid fa-circle-info me-2 "></i></span> Add course to the system before adding new alumni</li>
                    <li> <span class="text-blue-300"><i class="fa-solid fa-circle-info me-2 "></i></span> Add alumni to the system with details</li>
                    <li> <span class="text-blue-300"><i class="fa-solid fa-circle-info me-2 "></i></span> View and manage the alumni and course databases</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php
    include_once __DIR__ . '/components/footer.php';
    ?>
</body>

</html>