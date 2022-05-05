<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require("header.php"); ?>

    <header>
        <h2>Contact Us</h2>
    </header>

    <main>
        <section class="input-group">
            <label>Fist Name</label>
            <input type="text" name="first name">
        </section>

        <section class="input-group">
            <label>Last Name</label>
            <input type="text" name="last name">
        </section>

        <section class="input-group">
            <label>Message</label>
            <textarea name="contact-us-message" cols="78" rows="10"></textarea> 
        </section>

        <section class="input-group">
            <input type="submit" name="contact-us-btn" value="Send Message" class="btn">
        </section>
    </main>
    <?php require("footer.php"); ?>
</body>
</html>