<?php
// create_account.php

// Datenbankverbindung
$servername = "localhost"; // Normalerweise "localhost"
$username = "dein_benutzername"; // Dein MySQL-Benutzername
$password = "dein_passwort"; // Dein MySQL-Passwort
$dbname = "worst_bank"; // Dein Datenbankname

// Verbindung zur Datenbank herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen der Verbindung
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// Daten aus dem Formular empfangen
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Passwort sicher speichern

// SQL-Befehl zum Einfügen des Kontos
$sql = "INSERT INTO accounts (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Konto erfolgreich eröffnet!";
} else {
    echo "Fehler: " . $sql . "<br>" . $conn->error;
}

// Verbindung schließen
$conn->close();
?>
