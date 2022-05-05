<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require("header.php"); ?>
    <header>
        <h2>Login</h2>
    </header>

    <main>
        <form action="login.php" method="POST">

            <section class="input-group">
                
                    <label>Username</label>
                    <input type="text" name="username">
            </section>

            <section class="input-group">
                <label>Password</label>
                <input type="password" name="password">
            </section>

            <section class="input-group">
                <input type="submit" name="login_btn" value="Login" class="btn">
            </section>

            <section class="input-group">
                <p>Don't have an account? <a href="register.php" class="btn">Sign Up</a></p>
            </section>
        </form>
    </main>
    <?php require("footer.php"); ?>

</body>
</html>