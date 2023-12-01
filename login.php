<?php

// include 'views/navbar.php';

// $host = 'localhost';
// $dbname = 'management';
// $username = 'root';
// $password = 'rootroot';

// $db = new mysqli($host, $username, $password, $dbname);

// if ($db->connect_error) {
//     die("Connection failed: " . $db->connect_error);
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $enteredUsername = $_POST['email'];
//     $enteredPassword = $_POST['password'];

//     $stmt = $db->prepare("SELECT id, name, password FROM users WHERE email = ?");
//     $stmt->bind_param("s", $enteredUsername);
//     $stmt->execute();
//     $stmt->bind_result($userId, $username, $hashedPassword);

//     if ($stmt->fetch() && password_verify($enteredPassword, $hashedPassword)) {

//         session_start();
//         $_SESSION['user_id'] = $userId;
//         $_SESSION['name'] = $username;
//         header("Location: index.php");
//         exit;
//     } else {
//         echo "Invalid username or password";
//     }

//     $stmt->close();
// }

// 
// $db->close();
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" name="email" class="form-control">

                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control">

                <button type="submit" class="btn btn-dark mt-2">Login</button>
            </form>
        </div>
</div>
