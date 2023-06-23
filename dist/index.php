<?php
session_start();
error_reporting(0);
require("db_connect.php");

if (isset($_POST['login'])) {

    $student_uname = $_POST['uname'];
    $student_password = md5($_POST['upassword']);

    $sql = mysqli_query($con, "SELECT * FROM student WHERE student_uname='$student_uname' and student_password='$student_password'");

    $students = mysqli_fetch_array($sql); // Get the student tuple from the database

    if ($students > 0) {
        $redirect = "student.php";
        $_SESSION['login'] = $_POST['uname'];
        $_SESSION['id'] = $students['studentID']; 
        echo "<script>window.location.href='" . $redirect . "'</script>";
        exit();
    } else {
        $_SESSION['action1'] = "*Invalid uname or password";
        $redirect = "index.php";
        echo "<script>window.location.href='" . $redirect . "'</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link rel="stylesheet" href="tailwind.min.css" />
    <!-- <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" /> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;1,600&display=swap" rel="stylesheet">
</head>

<body class="antialiased bg-gray-200 text-gray-900 font-sans">
    <div class="flex items-center h-screen w-full">
        <div class="w-full bg-white rounded shadow-lg p-8 m-4 md:max-w-sm md:mx-auto">
            <span class="block w-full text-xl uppercase font-bold mb-4">Login</span>
            <p class="text-xs mb-1 text-red-600"><?php echo $_SESSION['action1'] ?><?php echo $_SESSION['action1'] = "" ?></p>
            <form class="mb-4" action="" method="post">
                <div class="mb-4 md:w-full">
                    <label for="email" class="block text-s mb-1">Username</label>
                    <input required class="w-full border rounded p-2 outline-none focus:shadow-outline" type="text" name="uname" id="uname" placeholder="Username">
                </div>
                <div class="mb-6 md:w-full">
                    <label for="password" class="block text-s mb-1">Password</label>
                    <input required class="w-full border rounded p-2 outline-none focus:shadow-outline" type="password" name="upassword" id="upassword" placeholder="Password">
                </div>
                <input name="login" class="bg-green-500 hover:bg-green-700 text-white uppercase text-sm font-semibold px-4 py-2 rounded" type="submit" value="Login">
            </form>
            <a class="text-blue-700 text-center text-sm" href="/login">Forgot password?</a>
        </div>
    </div>
</body>

</html>