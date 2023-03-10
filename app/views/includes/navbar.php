<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/Rocambolesque-logo-black.png" type="image/x-icon">

    <!-- Styling for the footer and navbar -->
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="css/home.css">
    <!-- Hamburger link for small screens -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title><?= SITENAME; ?></title>
</head>

<body>
    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-title">
                <a href="/">
                    <img src="\img\Rocambolesque-logo-black.png" width="100em" height="60em" />
                </a>
            </div>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label> 
        </div>

        <div class="nav-links">
            <a href="<?= URLROOT ?>/">Home</a>
            <a href="<?= URLROOT ?>/overviews/menu">Menu</a>
            <a href="<?= URLROOT ?>/homepages/about">About</a>
            <a href="<?= URLROOT ?>/homepages/contact">Contact</a>
            <a href="<?= URLROOT ?>/homepages/faq">FAQ</a>

            <?php
            // Start session
            session_start();

            // Check if the user id is set.
            if (isset($_SESSION['user_id'])) {
                // Require Registration so we can fetch the role.
                require_once APPROOT . '/models/Registration.php';

                // Create new instance of Registration
                $registration = new Registration();
                 
                // Get the role
                $user = $registration->getRole();

                // Create role variable
                $role = $user->role;
            }

            if (isset($role)) {
                echo '<a href="' . URLROOT . '/reservation/index">Reservatie overzicht</a>';

                if ($role == 'admin') {
                    // Show the admin links
                   // echo '<a href="' . URLROOT . '/enquetes/index">Manage enquetes</a>';
                    echo '<a href="' . URLROOT . '/accounts/index">Manage accounts</a>';
                }

                echo '<a href="' . URLROOT . '/registrations/logout">Logout</a>';
            } else {
                echo '<a href="' . URLROOT . '/registrations/login">Login</a>';
                echo '<a href="' . URLROOT . '/registrations/register">Register</a>';
            }
            ?>
        </div>
    </div>
</body>
</html>
