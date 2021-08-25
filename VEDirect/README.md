# VEDirect
Beschreibung des Moduls.

### Inhaltsverzeichnis

1. [Funktionsumfang](#1-funktionsumfang)
2. [Voraussetzungen](#2-voraussetzungen)
3. [Software-Installation](#3-software-installation)
4. [Einrichten der Instanzen in IP-Symcon](#4-einrichten-der-instanzen-in-ip-symcon)
5. [Statusvariablen und Profile](#5-statusvariablen-und-profile)
6. [WebFront](#6-webfront)
7. [PHP-Befehlsreferenz](#7-php-befehlsreferenz)

### 1. Funktionsumfang

Dazu ist eine VE-Direct Kabelverbindung zu IP-Symcon nötig. Die Verbindung kann über einen Client Socket oder einem seriellen Port erfolgen. (https://www.victronenergy.de/solar-charge-controllers) 

Variablen werden nach erfolgreicher Verbindung automatisch angelegt. Für einige Variablen, die Victron nicht dokumentiert hat, sind ggf. keine sprechenden Namen oder Profile vorhanden. Die Werte werden trotzdem angezeigt.

Folgende Laderegler werden auch in der Gerätebezeichnung erkannt:

    BMV 700
    BMV 702
    BMV 700H
    BlueSolar MPPT 70|15
    BlueSolar MPPT 75|50
    BlueSolar MPPT 150|35
    BlueSolar MPPT 75|15
    BlueSolar MPPT 100|15
    BlueSolar MPPT 100|30
    BlueSolar MPPT 100|50
    BlueSolar MPPT 150|70
    BlueSolar MPPT 150|100
    BlueSolar MPPT 75|50 rev2
    BlueSolar MPPT 100|50 rev2
    BlueSolar MPPT 100|30 rev2
    BlueSolar MPPT 150|35 rev2
    BlueSolar MPPT 75|10
    BlueSolar MPPT 150|45
    BlueSolar MPPT 150|60
    BlueSolar MPPT 150|85
    SmartSolar MPPT 250|100
    SmartSolar MPPT 150|100
    SmartSolar MPPT 150|85
    SmartSolar MPPT 75|15
    SmartSolar MPPT 75|10
    SmartSolar MPPT 100|15
    SmartSolar MPPT 100|30
    SmartSolar MPPT 100|50
    SmartSolar MPPT 150|235
    SmartSolar MPPT 150|100 rev2
    SmartSolar MPPT 150|85 rev2
    SmartSolar MPPT 250|70
    SmartSolar MPPT 250|85
    SmartSolar MPPT 250|60
    SmartSolar MPPT 250|45
    SmartSolar MPPT 100|20
    SmartSolar MPPT 100|20 48V
    SmartSolar MPPT 150|45
    SmartSolar MPPT 150|60
    SmartSolar MPPT 150|70
    SmartSolar MPPT 250|85 rev2
    SmartSolar MPPT 250|100 rev2
    BlueSolar MPPT 100|20
    BlueSolar MPPT 100|20 48V
    SmartSolar MPPT 250|60 rev2
    SmartSolar MPPT 250|70 rev2
    SmartSolar MPPT 150|45 rev2
    SmartSolar MPPT 150|60 rev2
    SmartSolar MPPT 150|70 rev2
    SmartSolar MPPT 150|85 rev2
    SmartSolar MPPT 150|100 rev3
    BlueSolar MPPT 150|45 rev2
    BlueSolar MPPT 150|60 rev2
    BlueSolar MPPT 150|70 rev2
    SmartSolar MPPT VE.Can 150/70
    SmartSolar MPPT VE.Can 150/45
    SmartSolar MPPT VE.Can 150/60
    SmartSolar MPPT VE.Can 150/85
    SmartSolar MPPT VE.Can 150/100
    SmartSolar MPPT VE.Can 250/45
    SmartSolar MPPT VE.Can 250/60
    SmartSolar MPPT VE.Can 250/70
    SmartSolar MPPT VE.Can 250/85
    SmartSolar MPPT VE.Can 250/100
    SmartSolar MPPT VE.Can 150/70 rev2
    SmartSolar MPPT VE.Can 150/85 rev2
    SmartSolar MPPT VE.Can 150/100 rev2
    BlueSolar MPPT VE.Can 150/100
    BlueSolar MPPT VE.Can 250/70
    BlueSolar MPPT VE.Can 250/100
    SmartSolar MPPT VE.Can 250/70 rev2
    SmartSolar MPPT VE.Can 250/100 rev2
    SmartSolar MPPT VE.Can 250/85 rev2
    
### 2. Vorraussetzungen

- IP-Symcon ab Version 5.3

### 3. Software-Installation

* Über den Module Store das 'VEDirect'-Modul installieren
* Alternativ über das Module Control folgende URL hinzufügen https://github.com/paresy/Victron

### 4. Einrichten der Instanzen in IP-Symcon

 Unter 'Instanz hinzufügen' kann das 'VEDirect'-Modul mithilfe des Schnellfilters gefunden werden.  
	- Weitere Informationen zum Hinzufügen von Instanzen in der [Dokumentation der Instanzen](https://www.symcon.de/service/dokumentation/konzepte/instanzen/#Instanz_hinzufügen)

__Konfigurationsseite__:

Name              | Beschreibung
----------------- | ------------------
Gateway Modus     | Gibt an, ob eine serielle- oder eine Netzwerkverbindung genutzt werden soll
Gerätetyp         | Gibt an, ob das Gerät ein BMV, MPPT, Inverter oder Charger ist

### 5. Statusvariablen und Profile

Die Statusvariablen/Kategorien werden automatisch angelegt. Das Löschen einzelner kann zu Fehlfunktionen führen.

### 6. WebFront

Alle Werte werden entsprechend im WebFront dargestellt

### 7. PHP-Befehlsreferenz

Es sind keine Befehle zum Schalten verfügbar.