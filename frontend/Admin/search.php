<?php
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
    <title>Search</title>

    <script src="script/jquery.js"></script>
</head>

<body class="bg-gray-100">
    <?php

    ?>
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

    <main class="container m-auto mt-20 p-1">
        <section class="flex flex-col gap-2 min-h-[80vh] md:flex-row">
            <div class="w-full p-3 md:w-1/3 bg-white rounded-lg shadow-md hover:shadow-lg">
                <h1 class="text-xl font-bold text-blue-500 border-b-2 border-blue-200">Search Alumni</h1>
                <form action="" method="POST">
                    <div class="py-4 w-full">
                        <label class="text-sm text-blue-500" for="regno">Registration No. <span class="text-red-500">*</span></label>
                        <input type="text" name="regno" id="regno" class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100" placeholder="123456" maxlength="20" required>
                    </div>
                    <div class=" ">
                        <input class="block px-8 py-2 bg-blue-100 text-blue-600 rounded-md hover:bg-blue-300 hover:cursor-pointer hover:shadow-sm" type="submit" name="search_alumni" value="Search">
                    </div>
                </form>
            </div>

            <div class="p-3 w-full md:w-2/3 bg-white rounded-lg shadow-md hover:shadow-lg">
                <h1 class="mb-2 text-xl font-bold text-blue-500 border-b-2 border-blue-200">Search Result</h1>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    if (isset($_POST['search_alumni'])) {


                        $id = $_POST['regno'];
                        $obj = new Alumni();
                        $alumni = $obj->get_alumni($id);

                        if ($alumni == false) {
                ?>
                            <p>No result found</p>
                        <?php
                        } else {
                        ?>
                            <div class="md:flex">
                                <div class="p-2 w-full md:w-1/3 flex flex-col">
                                    <p class="text-sm text-blue-500">Registration No. </p>
                                    <p class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100"><?php echo $alumni["registration_no"] ?></p>
                                </div>
                                <div class="p-2 w-full md:w-1/3 flex flex-col">
                                    <p class="text-sm text-blue-500">Roll No. </p>
                                    <p class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100"><?php echo $alumni["rollno"] ?></p>
                                </div>
                            </div>
                            <div class="md:flex">
                                <div class="p-2 w-full md:w-1/3 flex flex-col">
                                    <p class="text-sm text-blue-500">First Name </p>
                                    <p class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100"><?php echo $alumni["fname"] ?></p>
                                </div>
                                <div class="p-2 w-full md:w-1/3 flex flex-col">
                                    <p class="text-sm text-blue-500">Middle Name </p>
                                    <p class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100"><?php echo $alumni["mname"] ?></p>
                                </div>
                                <div class="p-2 w-full md:w-1/3 flex flex-col">
                                    <p class="text-sm text-blue-500">Last Name </p>
                                    <p class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100"><?php echo $alumni["lname"] ?></p>
                                </div>
                            </div>
                            <div class="md:flex">
                                <div class="p-2 w-full md:w-1/3 flex flex-col">
                                    <p class="text-sm text-blue-500">D.O.B</p>
                                    <p class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100"><?php echo $alumni["dob"] ?></p>
                                </div>
                                <div class="p-2 w-full md:w-1/3 flex flex-col">
                                    <p class="text-sm text-blue-500">Email </p>
                                    <p class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100"><?php echo $alumni["email"] ?></p>
                                </div>
                                <div class="p-2 w-full md:w-1/3 flex flex-col">
                                    <p class="text-sm text-blue-500">Phone </p>
                                    <p class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100"><?php echo $alumni["phone"] ?></p>
                                </div>
                            </div>
                            <div class="md:flex">
                                <div class="p-2 w-full md:w-1/3 flex flex-col">
                                    <p class="text-sm text-blue-500">Passing Year</p>
                                    <p class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100"><?php echo $alumni["pass_year"] ?></p>
                                </div>
                                <div class="p-2 w-full md:w-1/3 flex flex-col">
                                    <p class="text-sm text-blue-500">Course </p>
                                    <p class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100"><?php echo $alumni["course"] ?></p>
                                </div>
                                <div class="p-2 w-full md:w-1/3 flex flex-col">
                                    <p class="text-sm text-blue-500">CGPA </p>
                                    <p class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100"><?php echo $alumni["cgpa"] ?></p>
                                </div>
                            </div>
                            <div class="md:flex">
                                <div class="p-2 w-full md:w-1/3 flex flex-col">
                                    <p class="text-sm text-blue-500">Batch</p>
                                    <p class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100"><?php echo $alumni["batch"] ?></p>
                                </div>
                            </div>
                            <div class="md:flex">
                                <div class="p-2 w-full flex flex-col">
                                    <p class="text-sm text-blue-500">Address</p>
                                    <p class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100"><?php echo $alumni["address"] ?></p>
                                </div>
                            </div>
                            <div class="md:flex">
                                <div class="p-2 w-full flex flex-col">
                                    <p class="text-sm text-blue-500">Current Position</p>
                                    <p class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100"><?php echo $alumni["position"] ?></p>
                                </div>
                            </div>
                            <div>
                                <form action="" method="POST">
                                    <input type="text" name="id" value=<?php echo $alumni['registration_no'] ?> class="hidden">
                                    
                                    <input type="submit" class="px-6 py-2 rounded-md hover:cursor-pointer text-red-500 bg-red-100" type="submit" name="delete_alumni" value="Delete the alumni" />
                                </form>
                            </div>
                <?php
                        }
                    }
                }
                if (isset($_POST['delete_alumni'])) {
                    $id = $_POST['id'];
                    $obj = new Alumni();
                    $status = $obj->delete_single_alumni($id);
                    if ($status) {
                        echo "
                            <alert>Alumni deleted successfully</alert>
                        ";
                    } else {
                        echo "
                            <alert>Alumni not deleted</alert>
                        ";
                    }
                }
                ?>

            </div>
        </section>
    </main>
    <?php
    include_once __DIR__ . '/../../components/footer.php';
    ?>
</body>

</html>