<!DOCTYPE html>
<html>
<head>
    <title>Selezione di un catalogo a scelta</title>
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

        form {
            margin-bottom: 20px;
        }

        select {
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
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
    <h2>Seleziona un'opzione:</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <select name="opzione">
            <option value="">Seleziona un'opzione</option>
            <option value="opzione1">pezzidiricambio</option>
            <option value="opzione2">accessori</option>
            <option value="opzione3">servizi</option>
        </select>
        <input type="submit" name="submit" value="Seleziona">
    </form>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "delregno2014";

    $sql = ""; 

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['opzione']) && $_POST['opzione'] != '') {
        $opzione_selezionata = $_POST['opzione'];
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }
       
        switch ($opzione_selezionata) {
            case 'opzione1':
                $sql = "SELECT * FROM pezzidiricambio";
                break;
            case 'opzione2':
                $sql = "SELECT * FROM accessori";
                break;
            case 'opzione3':
                $sql = "SELECT * FROM servizi";
                break;
            default:
                echo "Opzione non valida.";
                break;
        }
        
        if (!empty($sql)) {
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<h3>Visualizzazione del catalogo :</h3>";
                echo "<table>";
                echo "<tr>";
                
                while ($row = $result->fetch_assoc()) {
                    foreach ($row as $colonna => $valore) {
                        echo "<th>$colonna</th>";
                    }
                    break; /
                }
                echo "</tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    foreach ($row as $valore) {
                        echo "<td>$valore</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Nessun risultato trovato.";
            }
        }
        $conn->close();
    }
    ?>
    <button onclick="window.location.href = 'DelRegnoHomePage.html';">Ritorna alla homepage</button>
</body>
</html>
