<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require("header.php"); ?>
    <header>
        <h2>Cart</h2>
    </header>

    <main>
        <div>
            <h3>Book</h3>
        </div>
        <div>
            <h3>Title</h3>
        </div>
        <div>
            <h3>Price</h3>
        </div>
        <div>
            <h3>Amount</h3>
        </div>
        <div>
            <h3>Total</h3>
        </div>
        
        <button class="checkout-btn btn">Check Out</button>
    </main>
    <?php require("footer.php"); ?>
</body>
</html>