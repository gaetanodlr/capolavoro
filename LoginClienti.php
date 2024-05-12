<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Cliente</title>
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
<h2>Inserisci il tuo ID cliente </h2>
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
   
    $id_cliente = $_POST["id_cliente"];
    

  
    $sql = "SELECT * FROM cliente WHERE id_cliente = '$id_cliente'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      
        header("Location: DelRegnoHomePage.html");
        exit();
    } else {
        
        echo "<p>Credenziali errate. Riprova.</p>";
    }
}

$conn->close();
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="id_cliente">id_cliente:</label><br>
    <input type="text" id="id_cliente" name="id_cliente" required><br><br>
    <input type="submit" value="Login">
</form>

</body>
</html>