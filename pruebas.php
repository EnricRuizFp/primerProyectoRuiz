<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input con botón</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f5f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .input-container {
            display: flex;
            align-items: center;
            border-bottom: 2px solid black;
            background-color: #f8f5f0;
            padding: 5px;
            width: 300px;
        }

        .input-container input {
            border: none;
            outline: none;
            background-color: transparent;
            flex: 1;
            font-size: 14px;
            color: black;
        }

        .input-container button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            margin-left: 10px;
        }

        .input-container button::after {
            content: "→";
            font-size: 16px;
            color: black;
        }
    </style>
</head>
<body>
    <div class="input-container">
        <input type="text" placeholder="Introducir código">
        <button></button>
    </div>
</body>
</html>
