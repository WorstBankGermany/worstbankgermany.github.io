<?php
// Hier fangen wir die POST-Daten ab
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $accountType = htmlspecialchars($_POST['accountType']);
    $password = htmlspecialchars($_POST['password']);

    // Für den echten Einsatz sollte man die Daten in einer Datenbank speichern
    // Hier speichern wir sie in einer einfachen Textdatei für das Beispiel.
    
    $file = fopen("kontodaten.txt", "a");
    fwrite($file, "Name: $name\nE-Mail: $email\nKontotyp: $accountType\nPasswort: $password\n\n");
    fclose($file);

    // Erfolgsnachricht
    echo "<h1>Konto erfolgreich eröffnet!</h1>";
    echo "<p>Danke, $name! Ihr Konto wurde als $accountType eröffnet. Wir werden Ihre Daten verlieren, keine Sorge!</p>";
    echo "<p>Zurück zur <a href='index.html'>Startseite</a></p>";
} else {
    echo "<p>Fehler: Konto konnte nicht eröffnet werden.</p>";
}
?>
