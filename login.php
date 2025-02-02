<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Little Explorers</title>
    <link rel="icon" href="img1.png/panda-bear.png" type="image/png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="nav">
        <div class="wrapper1">
            <div class="logo">
                <img src="img1.png/panda-bear.png" alt="icon" class="icon"><b>Little Explorer</b>
            </div>
            <div class="atag">
                <b><a href="MAIN.html">Home</a></b>
                <b><a href="login.html">Login</a></b>
                <b><a href="">For Kids</a></b>
                <b><a href="aboutus.html">About us</a></b>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h1 class="text-center mb-4" style="color: black;"><b>LOGIN</b></h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                <form action="" method="POST">
                    <label for="email" style="color: black;"><b>Email</b></label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email" required>
                </div>
            
                <div class="form-group">
                    <label for="password" style="color: black;"><b>Password</b></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password" required>
                </div>
                <div class="text-center">
                    <button type  ="submit" name="register" class="btn btn-success" style="background-color: green;">Login</button>
                    <button type="register here" class="btn btn-secondary" style="background-color:red;" >Register here</button>
                </div>
                <?php
// Database connection
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password (empty)
$dbname = "web_dev"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password

    // Insert data into users table
    $sql = "INSERT INTO users2 (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    
    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}

$conn->close();
?>

                <div class="footer">
                    <div class="wrapper5">
                        <div class="pfooter">
                            <img src="img1.png/panda-bear.png" class="two">
                            <i class="fa-brands fa-facebook-f" style="color: black;"></i>
                            <i class="fa-brands fa-square-x-twitter" style="color: black;"></i>
                            <i class="fa-brands fa-youtube" style="color: black;"></i>
                            <i class="fa-brands fa-linkedin" style="color: black;"></i>
                        </div>
                        <div class="ppfooter">
                            <b><a href="MAIN.html">Home</a></b>
                            <b><a href="login.html">Login</a></b>
                            <b><a href="">For Kids</a></b>
                            <b><a href="aboutus.html">About us</a></b>
                        </div>
                    </div>
                </div>

  <script src="scriptt.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>