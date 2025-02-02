<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Little Explorers</title>
    <link rel="icon" href="img1.png/panda-bear.png" type="image/png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylef.css">
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
        <h1 class="text-center mb-4" style="color: black;"><b>Register Here</b></h1>
        
        <!-- Display success or error messages -->
        <?php if (isset($message)) { ?>
            <div class="alert alert-<?php echo $message_type; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php } ?>
        
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="POST" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="name" style="color: black;"><b>Full Name</b></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email" style="color: black;"><b>Email</b></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" required>
                    </div>
                    <div class="form-group">
                        <label for="activities" style="color: black;"><b>Activities</b></label>
                        <select class="form-control" id="activities" name="activities" required>
                            <option value="" disabled selected>Select your favorite Activities</option>
                            <option value="poems">Poems</option>
                            <option value="cartoons">Cartoons</option>
                            <option value="games">Games</option>
                            <option value="minecraft activity">Minecraft activity</option>
                            <option value="animations">Animations</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="age" style="color: black;"><b>Age</b></label>
                        <select class="form-control" id="age" name="age" required>
                            <option value="" disabled selected>Select your Age</option>
                            <option value="0-2">0-2</option>
                            <option value="2-4">2-4</option>
                            <option value="4-6">4-6</option>
                            <option value="6-8">6-8</option>
                            <option value="8-10">8-10</option>
                            <option value="10-12">10-12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password" style="color: black;"><b>Password</b></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword" style="color: black;"><b>Confirm Password</b></label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                    </div>
                    <div class="text-center">
                        <a href="login.html">
                        <button type showAlert() ="submit" name="register" class="btn btn-success" style="background-color: green;" onclick="showAlert()">Register</button></a>
                        <button type="reset" class="btn btn-secondary" style="background-color: red;" onclick="showAlert2()">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "web_dev";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
        // Retrieve form data
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $activities = trim($_POST['activities']);
        $age = trim($_POST['age']);
        $password = trim($_POST['password']);
        $confirmPassword = trim($_POST['confirmPassword']);

        // Validate form fields
        if (empty($name) || empty($email) || empty($activities) || empty($age) || empty($password) || empty($confirmPassword)) {
            $message = "Please fill in all fields.";
            $message_type = "danger";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Invalid email format.";
            $message_type = "danger";
        } elseif ($password !== $confirmPassword) {
            $message = "Passwords do not match.";
            $message_type = "danger";
        } else {
            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Prepare SQL statement
            $stmt = $conn->prepare("INSERT INTO users (name, email, activities, age, password) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $email, $activities, $age, $hashedPassword);

            if ($stmt->execute()) {
                $message = "Registration successful! Welcome, " . htmlspecialchars($name) . "!";
                $message_type = "success";
            } else {
                $message = "Error: " . $stmt->error;
                $message_type = "danger";
            }
            $stmt->close();
        }
    }
    
    $conn->close();
    ?>


<div class="footer">
        <div class="wrapper2">
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
