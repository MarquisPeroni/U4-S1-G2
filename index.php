<?php

echo '<pre>' . print_r($_POST, true) . '</pre>';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $password = $_POST['password'];

        $errors = [];

        if (empty($name)) {
            $errors['name'] = 'Name is required';
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email';
        }

        if (empty($message)) {
            $errors['message'] = 'Message is required';
        }

        if (empty($password)) {
            $errors['password'] = 'Password is required';
        } elseif (strlen($password) < 12) {
            $errors['password'] = 'Password must be at least 12 characters long';
        } elseif (!preg_match('/[0-9]/', $password)) {
            $errors['password'] = 'Password must contain at least one number';
        }

        if (empty($errors)) {
            $to = "marco_p2009@live.it"; 
            $subject = "New Contact Form Submission";
            $body = "Name: $name\nEmail: $email\nMessage: $message\nPassword: $password";

            if ($errors == []) {
                header('Location: /Backend/U4/U4-S1/U4-S1-G2/success.php');
            } else {
                echo "Error sending email";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #fff;
        }
        .form-control {
            background-color: #333;
            color: #fff;
            border-color: #666;
        }
        .btn-danger:hover {
            background-color: #30070c;
            border-color: #01101f;
        }
        .mb-3 label {
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5 mb-4">Contact Form</h2>
        <form action="" method="post" novalidate>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" required></textarea>
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
    <!-- Script di Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
