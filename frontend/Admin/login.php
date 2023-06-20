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

    <!-- sweet alert CDN -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="../../style.css">
    <title>Login</title>

    <!-- script for sweet alert -->
    <script defer>
        function login_failed() {
            swal({
                title: "Failed!",
                text: "Failed to login",
                icon: "error",
                button: "Close",
            });
        }
    </script>
</head>

<body>
    <?php
    include_once __DIR__ . "/../../backend/admin/login.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $login_obj = new Login();
        $stmt = $login_obj->login($email, $password);
        if ($stmt) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['adminLogin'] = true;
            $_SESSION['email'] = $email;
            header('location: dashboard.php');
        } else {
            echo '
            <script>
            login_failed();
            </script>
        ';
        }
    }
    ?>
    <div class="flex justify-center items-center h-[100vh] bg-gray-100">
        <div class="h-auto w-[24rem] flex flex-col justify-center items-center bg-white shadow-sm p-10">
            <div class="logo text-red-600 p-4 bg-red-100 rounded-full">
                <i class="fa-sharp fa-solid fa-unlock fa-2x"></i>
            </div>
            <div></div>
            <p class="text-red-600 py-2 text-2xl">Admin Login</p>
            <div class="form-container">
                <form action="" method="POST">
                    <input class="w-full my-3 p-2 outline-1 outline-red-100" type="email" name="email" id="email" placeholder="Enter Email Id" required>
                    <input class="w-full my-3 p-2 outline-1 outline-red-100" type="password" name="password" id="password" placeholder="Enter Password" required>
                    <input class="w-full my-3 py-2 text-center border-2 border-red-500 bg-red-500 text-white" type="submit" name="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>

</html>