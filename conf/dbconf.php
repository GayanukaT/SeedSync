<?php
define('SERVERNAME','127.0.0.1');
define('USERNAME','root');
define('PASSWORD','mariadb');
define('DBNAME','online_seed_marketplace');

try {
    $connect = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DBNAME);
    if (!$connect){
        die("Connection Failed!");
    }

    function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if (empty($full_name) || empty($email) || empty($password) || empty($confirm_password)) {
            echo "Please fill in all fields.";
            exit;
        }

        if ($password !== $confirm_password) {
            echo "Passwords do not match.";
            exit;
        }

        $stmt = $connect->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Email already exists.";
            exit;
        }

        $password_hash = hashPassword($password);
        $stmt = $connect->prepare("INSERT INTO users (full_name, email, password_hash) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $full_name, $email, $password_hash);
        if ($stmt->execute()) {
            echo "User registered successfully. You can now <a href='login.php'>login</a>.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            echo "Please fill in all fields.";
            exit;
        }

        $stmt = $connect->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            echo "Invalid email or password.";
            exit;
        }

        $user = $result->fetch_assoc();

        if (!verifyPassword($password, $user['password_hash'])) {
            echo "Invalid email or password.";
            exit;
        }

        session_start();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['email'] = $user['email'];

        echo "Login successful. Redirecting to your dashboard...";
        header("Location: dashboard.php");
        exit;
    }

    $connect->close();
}
catch (Exception $e){
    die($e->getMessage());
}
?>