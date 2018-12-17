# Bbc MVC

Willkommen bei FirstPass. In diesem Repository findest du den Code sowie eine Anleitung dazu.

## Wichtige Informationen

Dieses App funktioniert am besten mit Google Chrome. Kompatibilität mit anderen Browsern wird nicht gewährleistet.

## Installation unter Windows

### Vorbereitung

Bevor du mit der Installation beginnen kannst, ist es wichtig, dass du auf deinem PC einen funktionierenden XAMPP Stack am laufen hast. Sollte das nicht der Fall sein, findest du im Internet eine Anleitung dazu.

### Installation

Kopiere zuert alle Dateien aus der Branch, welche du verwenden möchtest, in den Ordner in dem du Dein Projekt entwickeln möchtest. Hier wird das Verzeichnis `C:\dev\my-project` verwendet.

Um später mit einem DNS Namen auf die Seite zugreifen zu können, musst du den gewünschten DNS Namen in der `hosts`-Datei eintagen. Wir den Namen `firstpass.local`.

`C:\Windows\System32\drivers\etc\hosts`
```
# [...]

127.0.0.1    firstpass.local
```

Damit der Apache Webserver aus dem XAMPP Stack weiss, welcher DNS Namen zu welchem Ordner auf dem Dateisystem gehört, musst du einen VirtualHost erstellen. Dazu musst du die Datei `C:\xampp\apache\conf\extra\httpd-vhosts.conf` folgendermassen anpassen.

```
# [...]

# Wird benötigt um VirtualHosts für alle Requests auf Port 80 zu aktivieren
NameVirtualHost *:80

# [...]

# Eigentliche VHost Konfiguration
<VirtualHost 127.0.0.1>
    # DNS Name auf den der VHost hören soll
    ServerName firstpass.local

    # Ort an dem Das Projekt zu finden ist
    DocumentRoot "c:/<projektpfad>"

    # Nochmals
    <Directory "c:/<projektpfad>">
        Options Indexes FollowSymLinks
        Options +Includes
        AllowOverride All
        Order allow,deny
        Require all granted
        Allow from All
        DirectoryIndex index.php
    </Directory>
</VirtualHost>
```

Nun starte den Apache über das XAMPP Control Panel neu und du solltest mit dem Browser deines Vertrauens auf die Seite `http://firstpass.local` zugreifen können.
