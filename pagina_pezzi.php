<!DOCTYPE html>
<html>
<head>
    <title>Dettagli del Pezzo scelto</title>
	<style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #e6f2ff; 
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        p {
            margin-bottom: 20px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php

if(isset($_GET['pezzo'])) {
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "delregno2014";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }
    
    $pezzo_selezionato = $_GET['pezzo'];
    
   
    $sql = "SELECT * FROM pezzidiricambio WHERE descPezzo = '$pezzo_selezionato'";
    $result = $conn->query($sql);

    
    if ($result->num_rows > 0) {
       
        $row = $result->fetch_assoc();
        echo "<h2>Dettagli del Pezzo: " . $row['descPezzo'] . "</h2>";
        echo "<p>Quantità: " . $row['quantita'] . "</p>";
        echo "<p>Prezzo: " . $row['costoPezzo'] . "€</p>";
       
    } else {
        echo "Nessun dettaglio trovato per il pezzo selezionato.";
    }
    $conn->close();
} else {
    echo "Nessun pezzo selezionato.";
}
?>
<button onclick="window.location.href = 'DelRegnoHomePage.html';">Ritorna alla homepage</button>
</body>
</html>