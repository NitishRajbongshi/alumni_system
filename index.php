<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@500&display=swap" rel="stylesheet">

    <!-- Tailwind -->
    <link rel="stylesheet" href="dist/output.css">

    <link rel="stylesheet" href="style.css">
    <title>Alumni Management System</title>
</head>

<body >
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
    <div class="flex w-[100%] justify-center items-center">
        <img src="assets/images/alumni.jpg" alt="alumni" class="h-auto w-full">
    </div>

    <!-- About -->
    <div class="p-4">
        <p class="py-4 text-2xl text-blue-600"><span class="border-b-2 border-blue-600">About</span></p>
        <p class="py-4 text-justify text-gray-500 text-md">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos excepturi magnam commodi beatae tempora similique possimus iusto dignissimos cupiditate nobis. Quisquam dolor possimus in voluptate a, fugit aliquam reiciendis nisi cupiditate iure commodi earum ratione pariatur dolore, sint dignissimos repellendus architecto? Voluptatibus rem commodi dolorem quaerat molestias harum pariatur quos.</p>
    </div>

    <!-- footer -->
    <footer class="text-center">
        <p class="p-3 bg-gray-600 text-white">Copyright 2023, Alumni Management System</p>
    </footer>
</body>

</html>