<!DOCTYPE html>
<html>
<head>
    <title>Visualizzazione Officine</title>
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

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }
		 button {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<h2>Visualizzazione di tutte le nostre officine</h2>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "delregno2014";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$sql = "SELECT * FROM officina";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Denominazione</th><th>ID</th><th>Città</th><th>Indirizzo</th></tr>";
   
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
		echo "<td>" . $row['denominazione'] . "</td>";
        echo "<td>" . $row['id_officina'] . "</td>";
        echo "<td>" . $row['citta'] . "</td>";
        echo "<td>" . $row['indirizzo'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nessuna officina trovata";
}

$conn->close();
?>
<button onclick="window.location.href = 'DelRegnoHomePage.html';">Ritorna alla homepage</button>
</body>
</html>
