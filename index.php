<?php 
include('functions.php');
// CHECKING IF USER IS LOGGED IN
if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User - Home</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <h2>Home Page</h2>
        </header>

        <main>
            <!-- notification message -->
            <?php if (isset($_SESSION['success'])) : ?>
                <section class="error success">
                    <h3>
                        <?php 
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </h3>
                </section>
            <?php endif ?>
            
            <!-- logged in user information -->
            <section class="profile_info"> 
                <img src="images/profile.jpg" alt="user profile">

                <section>
                    <?php  if (isset($_SESSION['user'])) : ?>
                        <strong><?php echo $_SESSION['user']['username']; ?></strong>

                        <small>
                            <i class="user_type">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
                            <br>
                            <a href="index.php?logout='1'">logout</a>
                        </small>

                    <?php endif ?>
                </section>
            </section>
        </main>
    </body>
</html>