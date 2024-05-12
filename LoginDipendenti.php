<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dipendenti</title>
    <style>
        body {
            background-color: #e6f2ff; /* Blu chiaro */
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        form {
            margin: 0 auto;
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Inserisci le tue credenziali da dipendente per modificare un'officina</h2>
    <?php
    $servername = "localhost"; 
    $username = "root"; 
    $password = "";
    $dbname = "delregno2014"; 
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM dipendenti WHERE username = '$username' AND pass = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
           
            header("Location: DelRegnoOfficina3.php");
            exit();
        } else {
            
            echo "<p class='error-message'>Credenziali errate. Riprova.</p>";
        }
    }
    $conn->close();
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
