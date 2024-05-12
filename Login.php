<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prima pagina</title>
    <style>
        body {
            background-color: #e6f2ff;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            color: #333;
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

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <hr>
    <h1>Benvenuto nella pagina di login:</h1>
    <hr>
    <h1>Scegli cosa fare:</h1>
    <button onclick="window.location.href = 'LoginDipendenti.php';">Inserisci le tue credenziali da dipendente</button>
    <button onclick="window.location.href = 'LoginClienti.php';">Inserisci le tue credenziali da cliente</button>
    <button onclick="window.location.href = 'RegistrazioneCliente.php';">Sei un nuovo cliente? Registrati</button>
</body>
</html>