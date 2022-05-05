<?php require("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require("header.php"); ?>

    <main>
        <h2 class="title">Register</h2>

        <form action="register.php" method="POST">
            <!-- displaying error if form is not filled properly -->
            <?php echo display_error(); ?>

            <section class="input-group">
                <label>Username</label>
                <input type="text" name="username" value="<?= $username; ?>">
            </section>

            <section class="input-group">
                 <label>Email</label>
                <input type="email" name="email" value="<?= $email; ?>">
            </section>

            <section class="input-group">
                <label>Password</label>
                <input type="password" name="password_1">
            </section>

            <section class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="password_2">
            </section>

            <section class="input-group">
                <input type="submit" name="register_btn" value="Register" class="btn">
            </section>

            <p>Already have an account? <a href="login.php" class="btn">Sign In</a></p>
        </form>
    </main>

    <?php require("footer.php"); ?>

</body>
</html>