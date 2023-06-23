<?php
include_once __DIR__ . "/../../backend/course/get.php";
include_once __DIR__ . "/../../backend/alumni/add.php";

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
  <!-- sweet alert CDN -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- script for sweet alert -->
  <script defer>
    function added() {
      swal({
        title: "Success!",
        text: "Alumni added successfully",
        icon: "success",
        button: "Close",
      });
    }
    function already_added() {
      swal({
        title: "Failed!",
        text: "Already added this alumni",
        icon: "error",
        button: "Close",
      });
    }

    function not_added() {
      swal({
        title: "Failed!",
        text: "Alumni not added",
        icon: "error",
        button: "Close",
      });
    }

    function no_course() {
      swal({
        title: "Failed!",
        text: "Course not selected",
        icon: "error",
        button: "Close",
      });
    }
  </script>
  <title>Alumni</title>
</head>

<body class="bg-gray-100">
  <?php
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $registration = $_POST['regno'];
    $rollno = $_POST['roll'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass_year = $_POST['pass_year'];
    $cgpa = $_POST['cgpa'];
    $course = $_POST['course'];
    $address = $_POST['address'];
    $position = $_POST['position'];

    if ($course == 'none') {
      echo '<script>no_course();</script>';
    } else {
      $add_obj = new AddAlumni();
      $status = $add_obj->add_alumni($registration, $rollno, $fname, $mname, $lname, $dob, $phone, $email, $pass_year, $cgpa, $course, $address, $position);
      if ($status == 1) {
        echo '<script>added();</script>';
      } elseif($status == 2) {
        echo '<script>already_added();</script>';
      } else {
        echo '<script>not_added();</script>';
      }
    }
  }
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

  <main class="container mx-auto p-1">
    <div class="lg:flex lg:gap-1">
      <!-- Add new alumni -->
      <section class="mt-20 p-5 w-full h-auto bg-white rounded-xl shadow-md hover:shadow-lg lg:w-2/3">
        <h1 class="my-2 text-xl text-blue-700 border-b-2 border-blue-200">Add New Alumni</h1>
        <form action="" method="POST">
          <div class="md:flex">
            <div class="p-2 w-full md:w-1/3 flex flex-col">
              <label class="text-sm text-blue-500" for="regno">Registration No. <span class="text-red-500">*</span></label>
              <input type="text" name="regno" id="regno" class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100" placeholder="123456" maxlength="20" required>
            </div>
            <div class="p-2 w-full md:w-1/3 flex flex-col">
              <label class="text-sm text-blue-500" for="roll">Roll No. <span class="text-red-500">*</span></label>
              <input type="text" name="roll" id="roll" class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100" placeholder="US-xxx-033-xxx" maxlength="20" required>
            </div>
          </div>
          <div class="md:flex">
            <div class="p-2 w-full md:w-1/3 flex flex-col">
              <label class="text-sm text-blue-500" for="fname">First Name <span class="text-red-500">*</span></label>
              <input type="text" name="fname" id="fname" class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100" placeholder="John" maxlength="15" required>
            </div>
            <div class="p-2 w-full md:w-1/3 flex flex-col">
              <label class="text-sm text-blue-500" for="mname">Middle Name</label>
              <input type="text" name="mname" id="mname" class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100" placeholder="Smith" maxlength="15">
            </div>
            <div class="p-2 w-full md:w-1/3 flex flex-col">
              <label class="text-sm text-blue-500" for="lname">Last Name <span class="text-red-500">*</span></label>
              <input type="text" name="lname" id="lname" class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100" placeholder="Doe" maxlength="18" required>
            </div>
          </div>
          <div class="md:flex">
            <div class="p-2 w-full md:w-1/3 flex flex-col">
              <label class="text-sm text-blue-500" for="dob">D.O.B. <span class="text-red-500">*</span></label>
              <input type="date" name="dob" id="dob" class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100" required>
            </div>
            <div class="p-2 w-full md:w-1/3 flex flex-col">
              <label class="text-sm text-blue-500" for="phone">Phone <span class="text-red-500">*</span></label>
              <input type="text" name="phone" id="phone" class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100" placeholder="xxxxx-xxxxx" maxlength="10" required>
            </div>
            <div class="p-2 w-full md:w-1/3 flex flex-col">
              <label class="text-sm text-blue-500" for="email">Email <span class="text-red-500">*</span></label>
              <input type="email" name="email" id="email" class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100" placeholder="john.doe@gmail.com" maxlength="45" required>
            </div>
          </div>
          <div class="md:flex">
            <div class="p-2 w-full md:w-1/3 flex flex-col">
              <label class="text-sm text-blue-500" for="pass_year">Passing Year <span class="text-red-500">*</span></label>
              <input type="text" name="pass_year" id="pass_year" class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100" placeholder="2023" maxlength="4" required>
            </div>
            <div class="p-2 w-full md:w-1/3 flex flex-col">
              <label class="text-sm text-blue-500" for="cgpa">CGPA <span class="text-red-500">*</span></label>
              <input type="text" name="cgpa" id="cgpa" class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100" placeholder="8.99" maxlength="4" required>
            </div>
            <div class="p-2 w-full md:w-1/3 flex flex-col">
              <label class="text-sm text-blue-500" for="course">Course <span class="text-red-500">*</span></label>
              <select name="course" id="course" class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100 ">
                <?php
                $course_obj = new GetCourse();
                $result = $course_obj->get_course();
                var_dump($result);
                if ($result == false) {
                  echo "
                    <option value='none'>None</option>
                  ";
                } else {
                  $courses = $result->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($courses as $course) {
                    $options .= "<option value='" . $course["course_code"] . "'>" . $course['course_code'] . "</option>";
                  }
                }
                echo $options;
                ?>
              </select>
            </div>
          </div>

          <div class="md:flex">
            <div class="p-2 w-full flex flex-col">
              <label class="text-sm text-blue-500" for="address">Address <span class="text-red-500">*</span></label>
              <textarea id="address" name="address" rows="2" class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100" maxlength="150" placeholder="permanent address" required></textarea>
            </div>
          </div>

          <div class="md:flex">
            <div class="p-2 w-full flex flex-col">
              <label class="text-sm text-blue-500" for="position">Current Position <span class="text-red-500">*</span></label>
              <textarea id="position" name="position" rows="2" class="text-md p-1 outline-1 outline-blue-200 border-b-2 border-blue-100" maxlength="150" placeholder="Professor at Junior College" required></textarea>
            </div>
          </div>
          <div>
            <input class="bg-blue-100 text-blue-600 px-4 py-2 rounded-md hover:bg-blue-300 hover:cursor-pointer hover:shadow-sm" type="submit" name="submit" value="Add Alumni">
          </div>
        </form>
      </section>

      <!-- Show statistics -->
      <section class="mt-2 lg:mt-20 p-2 w-full h-auto bg-white rounded-xl shadow-md hover:shadow-lg lg:w-1/3">
        <h1 class="my-2 text-xl text-red-700 border-b-2 border-red-200">Available Data</h1>
        <div class="flex gap-3">
          <div class="w-1/2 shadow-lg flex flex-col justify-center items-center rounded-2xl py-10 bg-yellow-200 text-yellow-600">
            <p>Course</p>
            <p class="text-4xl font-bold">4</p>
          </div>
          <div class="w-1/2 shadow-lg flex flex-col justify-center items-center rounded-2xl py-10 bg-blue-200 text-blue-600">
            <p>Alumni</p>
            <p class="text-4xl font-bold">10</p>
          </div>
        </div>

        <h1 class="my-2 text-xl text-red-700 border-b-2 border-red-200">Quick links</h1>
        <ul>
          <li><a href="">Dashboard</a></li>
          <li><a href="">Dashboard</a></li>
          <li><a href="">Dashboard</a></li>
          
        </ul>
      </section>
    </div>
  </main>

  <?php
  include_once __DIR__ . '/../../components/footer.php';
  ?>
</body>

</html>