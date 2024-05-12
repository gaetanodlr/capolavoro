<!DOCTYPE html>
<html>
<head>
    <title>Modifica dati di un'officina</title>
	<style>
        body {
            background-color: #e6f2ff; 
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

        button {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px; 
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "delregno2014";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_officina'])) {
    $id_officina = $_POST['id_officina'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

   
    $sql_check = "SELECT * FROM officina WHERE id_officina = '$id_officina'";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows > 0) {
     
        $row = $result_check->fetch_assoc();
        ?>
        <h2>Modifica Officina</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="id_officina" value="<?php echo $id_officina; ?>">
            Denominazione: <input type="text" name="denominazione" value="<?php echo $row['denominazione']; ?>"><br>
            Città: <input type="text" name="citta" value="<?php echo $row['citta']; ?>"><br>
            Indirizzo: <input type="text" name="indirizzo" value="<?php echo $row['indirizzo']; ?>"><br>
            <input type="submit" name="submit" value="Salva Modifiche">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['denominazione']) && isset($_POST['citta']) && isset($_POST['indirizzo'])) {
            $denominazione = $_POST['denominazione'];
            $citta = $_POST['citta'];
            $indirizzo = $_POST['indirizzo'];
            $sql_update = "UPDATE officina SET denominazione = '$denominazione', citta = '$citta', indirizzo = '$indirizzo' WHERE id_officina = '$id_officina'";
            if ($conn->query($sql_update) === TRUE) {
                echo "Modifiche salvate con successo!";
            } else {
                echo "Errore durante il salvataggio delle modifiche: " . $conn->error;
            }
        }
    } else {
        echo "Officina non trovata.";
    }

    $conn->close();
} else {
    ?>
    <h2>Inserisci l'ID dell'officina da modificare:</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        ID Officina: <input type="text" name="id_officina"><br>
        <input type="submit" name="submit" value="Modifica Officina">
    </form>
    <?php
}
?>
</body>
</html>