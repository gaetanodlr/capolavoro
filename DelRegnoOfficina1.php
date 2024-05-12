<!DOCTYPE html>
<html>
<head>
    <title>Visualizzazione dell'officina scelta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #e6f2ff; 
            padding: 20px;
        }

        h2, h3 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .officina-details {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            text-align: left;
        }

        .officina-details p {
            margin-bottom: 10px;
        }

        .officina-details h3 {
            margin-bottom: 15px;
        }

        .officina-details ul {
            list-style-type: none;
            padding: 0;
        }

        .officina-details ul li {
            margin-bottom: 5px;
        }

        .officina-details ul li a {
            text-decoration: none;
            color: #007bff;
        }

        .officina-details ul li a:hover {
            text-decoration: underline;
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
<h2>Inserisci l'id dell'officina che ti interessa:</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="text" name="id_officina">
    <input type="submit" name="submit" value="Visualizza">
</form>
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
    $sql = "SELECT o.*, s.descrizioneServizio, a.descAccessorio, p.descPezzo
            FROM officina o
            JOIN officina_servizi os ON o.id_officina = os.cod_officina
            JOIN servizi s ON os.cod_servizio = s.id_servizio
            JOIN officina_accessori oa ON o.id_officina = oa.cod_officina
            JOIN accessori a ON oa.cod_accessorio = a.id_accessorio
            JOIN officina_pezzi op ON o.id_officina = op.cod_officina
            JOIN pezzidiricambio p ON op.cod_pezzo = p.id_pezzo
            WHERE o.id_officina = $id_officina";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $servizi_unici = [];
        $accessori_unici = [];
        $pezzi_di_ricambio_unici = [];
        $riga_officina = $result->fetch_assoc();
        echo "<div class='officina-details'>";
        echo "<h3>Dati dell'officina:</h3>";
        echo "<p><strong>ID OFFICINA:</strong> " . $riga_officina["id_officina"]. "</p>";
        echo "<p><strong>DENOMINAZIONE:</strong> " . $riga_officina["denominazione"]. "</p>";
        echo "<p><strong>CITTÀ:</strong> " . $riga_officina["citta"]. "</p>";
        echo "<p><strong>INDIRIZZO:</strong> " . $riga_officina["indirizzo"]. "</p>";
        while ($riga = $result->fetch_assoc()) {
            $servizi = explode(", ", $riga["descrizioneServizio"]);
            foreach ($servizi as $servizio) {
                if (!in_array($servizio, $servizi_unici)) {
                    $servizi_unici[] = $servizio;
                }
            }
            $accessori = explode(", ", $riga["descAccessorio"]);
            foreach ($accessori as $accessorio) {
                if (!in_array($accessorio, $accessori_unici)) {
                    $accessori_unici[] = $accessorio;
                }
            }
            $pezzi_di_ricambio = explode(", ", $riga["descPezzo"]);
            foreach ($pezzi_di_ricambio as $pezzo) {
                if (!in_array($pezzo, $pezzi_di_ricambio_unici)) {
                    $pezzi_di_ricambio_unici[] = $pezzo;
                }
            }
        }
        echo "<h3>Servizi offerti:</h3>";
        echo "<ul>";
        foreach ($servizi_unici as $servizio) {
            echo "<li><a href='pagina_servizio.php?servizio=" . urlencode($servizio) . "'>$servizio</a></li>";
        }
        echo "</ul>";
        echo "<h3>Accessori disponibili:</h3>";
        echo "<ul>";
        foreach ($accessori_unici as $accessorio) {
           echo "<li><a href='pagina_accessori.php?accessorio=" . urlencode($accessorio) . "'>$accessorio</a></li>";
        }
        echo "</ul>";
        echo "<h3>Pezzi di ricambio disponibili:</h3>";
        echo "<ul>";
        foreach ($pezzi_di_ricambio_unici as $pezzo) {
            echo "<li><a href='pagina_pezzi.php?pezzo=" . urlencode($pezzo) . "'>$pezzo</a></li>";
        }
        echo "</ul>";
        echo "</div>";
    } else {
        echo "Nessuna officina trovata con l'ID specificato.";
    }

    $conn->close();
}
?>
<button onclick="window.location.href = 'DelRegnoHomePage.html';">Ritorna alla homepage</button>
</body>
</html>
