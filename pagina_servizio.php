<!DOCTYPE html>
<html>
<head>
    <title>Dettagli del Servizio scelto</title>
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
if(isset($_GET['servizio'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "delregno2014";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }
    $servizio_selezionato = $_GET['servizio'];
    $sql = "SELECT * FROM servizi WHERE descrizioneServizio = '$servizio_selezionato'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>Dettagli del Servizio: " . $row['descrizioneServizio'] . "</h2>";
        echo "<p>Prezzo: " . $row['costoOrario'] . " € l'ora</p>"; 
    } else {
        echo "Nessun dettaglio trovato per il servizio selezionato.";
    }
    $conn->close();
} else {
    echo "Nessun servizio selezionato.";
}
?>
<button onclick="window.location.href = 'DelRegnoHomePage.html';">Ritorna alla homepage</button>
</body>
</html>
