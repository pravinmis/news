


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
</head>
<body>
    <form action="charge.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="number" name="amount" placeholder="Amount">
        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="YOUR_PUBLISHABLE_KEY"
            data-amount="100"
            data-name="Demo Site"
            data-description="Widget"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto"
            data-currency="usd">
        </script>
    </form>
</body>
</html>
