<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Failure Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fce4ec;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .message-box {
            background-color: #f44336;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .message-box h1 {
            font-size: 36px;
            margin: 0;
        }

        .message-box p {
            font-size: 18px;
            margin-top: 10px;
        }

        .button {
            background-color: white;
            color: #f44336;
            padding: 10px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .button:hover {
            background-color: #e53935;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message-box">
            <h1>Oops! Something went wrong</h1>
            <p>Your action couldn't be completed. Please try again later.</p>
            <button class="button" onclick="<?= base_url() ?>">Go Back</button>
        </div>
    </div>
</body>
</html>
