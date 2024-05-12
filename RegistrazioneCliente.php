<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione Cliente</title>
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
<?php
$messaggio = "";
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "delregno2014"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id_cliente = $_POST["id_cliente"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $telefono = $_POST["telefono"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }
    $sql = "INSERT INTO cliente (id_cliente, nome, cognome, telefono) VALUES ('$id_cliente', '$nome', '$cognome', '$telefono')";
    if ($conn->query($sql) === TRUE) {
        $messaggio = "Registrazione effettuata con successo.";
    } else {
        echo "Errore: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
$sql_last_id = "SELECT MAX(id_cliente) AS last_id FROM cliente";
$result = $conn->query($sql_last_id);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $last_id = $row["last_id"]; 
} else {
    $last_id = 1; 
}
$conn->close();
?>
<h2>Inserisci le informazioni richieste per registrarti</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="id_cliente">ID Cliente (Ultimo ID: <?php echo $last_id; ?>):</label><br>
    <input type="text" id="id_cliente" name="id_cliente"  required><br><br>
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" required><br><br>
    <label for="cognome">Cognome:</label><br>
    <input type="text" id="cognome" name="cognome" required><br><br>
    <label for="telefono">Telefono:</label><br>
    <input type="text" id="telefono" name="telefono" required><br><br>
    <input type="submit" value="Registrati">
</form>

<p><?php echo $messaggio; ?></p>
<?php
if ($messaggio == "Registrazione effettuata con successo.") {
    header("refresh:2;url=DelRegnoHomepage.html");
    exit();
}
?>
</body>
</html>