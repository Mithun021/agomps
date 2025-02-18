<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
</head>
<body>
    <h2>Payment for Tournament Registration</h2>
    <p>Please complete the payment to proceed with your registration.</p>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "<?= $key ?>", // Razorpay API key
            "amount": "<?= $amount * 100 ?>", // Amount to be paid (converted to paise)
            "currency": "INR",
            "order_id": "<?= $order_id ?>", // Razorpay Order ID
            "name": "Tournament Registration Payment",
            "description": "Tournament registration fee",
            "image": "https://example.com/logo.png", // Optional logo URL
            "prefill": {
                "email": "<?= $player_email ?>",
                "contact": "<?= $player_phone ?>"
            },
            "handler": function (response) {
                // Handle payment success response and redirect to verify payment
                var paymentData = {
                    razorpay_order_id: response.razorpay_order_id,
                    razorpay_payment_id: response.razorpay_payment_id,
                    razorpay_signature: response.razorpay_signature
                };

                // Submit payment data to verify_payment method
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = '<?= base_url('verify-payment') ?>';

                for (var key in paymentData) {
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = key;
                    input.value = paymentData[key];
                    form.appendChild(input);
                }

                document.body.appendChild(form);
                form.submit();
            },
            "theme": {
                "color": "#F37254"
            }
        };

        var rzp1 = new Razorpay(options);
        rzp1.open();
    </script>
</body>
</html>
