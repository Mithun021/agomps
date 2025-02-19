<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
</head>
<body>
    <h2>Payment for Investment</h2>
    <p>Please complete the payment to proceed with your investment.</p>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "<?= $key ?>",
            "amount": "<?= $amount * 100 ?>",
            "currency": "INR",
            "order_id": "<?= $order_id ?>",
            "name": "Investment Plan",
            "description": "Investment fee",
            "image": "https://example.com/logo.png",
            "prefill": {
                "email": "<?= $player_email ?>",
                "contact": "<?= $player_phone ?>"
            },
            "handler": function (response) {
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = '<?= base_url('invest-verify-payment') ?>';

                for (var key in response) {
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = key;
                    input.value = response[key];
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
