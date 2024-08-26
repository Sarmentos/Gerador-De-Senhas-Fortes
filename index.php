<?php

if (isset($_POST['length'])) {
    $length = intval($_POST['length']);
    $lowercase = isset($_POST['lowercase']);
    $uppercase = isset($_POST['uppercase']);
    $symbols = isset($_POST['symbols']);
    $numbers =  isset($_POST['numbers']);

    if (!$lowercase && !$uppercase && !$symbols && !$numbers) {
        echo "Falled to generate passwrd. Chosse at least 1 type";
    }

    $lowercase_chars = "abcdefghijklnmopqrstuwxyz";
    $uppercase_chars = "ABCDEFGHIJKLNMOPQRSTUWXYZ";
    $symbols_chars = "!@#$%&*?()_=/";
    $numbers_chars = "0123456789";

    $password = "";
    $valid_option = "";

    if ($lowercase) {
        $valid_option .= $lowercase_chars;
    }
    if ($uppercase) {
        $valid_option .= $uppercase_chars;
    }
    if ($symbols) {
        $valid_option .= $symbols_chars;
    }
    if ($numbers) {
        $valid_option .= $numbers_chars;
    }

    for ($k = 0; $k < $length; $k++) {
        $radoom_number = rand(0, strlen($valid_option) - 1);
        $password .= $valid_option[$radoom_number];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Gerador</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        button {
            align-items: center;
            background-image: linear-gradient(144deg, #AF40FF, #5B42F3 50%, #00DDEB);
            border: 0;
            border-radius: 8px;
            box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
            box-sizing: border-box;
            color: #FFFFFF;
            display: flex;
            font-family: 'Arial', sans-serif;
            font-size: 18px;
            justify-content: center;
            line-height: 1em;
            max-width: 100%;
            min-width: 140px;
            padding: 3px;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            cursor: pointer;
            transition: all .3s;
            margin-top: 10px;
        }

        button:active,
        button:hover {
            outline: 0;
        }

        button span {
            background-color: rgb(5, 6, 45);
            padding: 16px 24px;
            border-radius: 6px;
            width: 100%;
            height: 100%;
            transition: 300ms;
        }

        button:hover span {
            background: none;
        }

        button:active {
            transform: scale(0.9);
        }

        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        input[type="text"],
        input[type="number"],
        input[type="checkbox"] {
            margin: 10px 0;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        h4 {
            text-align: center;
            color: #333;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            font-size: 1.1em;
        }

        p {
            font-size: 1em;
            color: #555;
            margin-bottom: 15px;
        }

        .form-container {
            max-width: 450px;
            margin: 20px auto;
            padding: 25px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
    </style>
</head>

<body>
    <?php if (isset($password)) { ?>
        <h4>Generated Password</h4>
        <input type="text" readonly value="<?php echo $password ?>">
    <?php } ?>
    <h4>Generate a Password</h4>
    <form method="POST" action="">
        <p>
            <label for="length">Password Length</label>
            <input type="number" min="8" required value="16" name="length" id="length">
        </p>

        <p>
            <label for="lowercase">Include Lowercase</label>
            <input type="checkbox" value="1" checked name="lowercase" id="lowercase">
        </p>

        <p>
            <label for="uppercase">Include Uppercase</label>
            <input type="checkbox" value="1" checked name="uppercase" id="uppercase">
        </p>

        <p>
            <label for="symbols">Include Symbols</label>
            <input type="checkbox" value="1" checked name="symbols" id="symbols">
        </p>

        <p>
            <label for="numbers">Include Numbers</label>
            <input type="checkbox" value="1" checked name="numbers" id="numbers">
        </p>

        <p>
            <button type="submit">Generate</button>
        </p>
    </form>
</body>

</html>