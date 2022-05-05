<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php requre("header.php") ?>
    <header>
        <h2>Admin - Create User</h2>
    </header>

    <main>
        <form action="create_user.php">
            <section class="input-group">
				<label>Username</label>
				<input type="text" name="username" value="<?php echo $username; ?>">
			</section>
            
			<section class="input-group">
				<label>Email</label>
				<input type="email" name="email" value="<?php echo $email; ?>">
			</section>

			<section class="input-group">
				<label>User type</label>
				<select name="user_type" class="user_type" >
					<option value=""></option>
					<option value="admin">Admin</option>
					<option value="user">User</option>
				</select>
			</section>

			<section class="input-group">
				<label>Password</label>
				<input type="password" name="password_1">
			</section>

			<section class="input-group">
				<label>Confirm password</label>
				<input type="password" name="password_2">
			</section>

			<section class="input-group">
				<button type="submit" class="btn" name="register_btn"> + Create user</button>
			</section>
        </form>

		<?php require("footer.php") ?>
    </main>
</body>
</html>
