<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 90%;
            max-width: 400px;
        }

        h2 {
            color: #dc3545;
            font-size: 2em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            color: #333;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 1.1em;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Payment Failed</h2>
        <p>Unfortunately, your payment could not be processed. Please try again.</p>
        <a href="<?= base_url('/') ?>">Go to Home</a>
    </div>
</body>
</html>
