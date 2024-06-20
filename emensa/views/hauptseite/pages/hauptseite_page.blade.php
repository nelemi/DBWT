<?php
/**
 * Praktikum DBWT. Autoren:
 * Amelie, Petersen, 3661323
 * Nele, Mikkelsen, 3650167
 */
?>

@extends('hauptseite.layout.werbeseite_layout')

@section('style')
    <link rel="stylesheet" href="css/hauptseite.css">
@endsection

@section('header')
<header>
    <img id="Logo" src="img/logo_groß.jpg" alt="Mensalogo: Ein Mann mit Schnurrbart in bunten Farben" width="60" height="60" title="Mensalogo">
    <nav>
        <ul class=navigation>
            <li class="navelement"><a href="#ankündigung" class="nav-link">Ankündigung</a></li>
            <li class="navelement"><a href="#speisen" class="nav-link">Speisen</a></li>
            <li class="navelement"><a href="#Zahlen" class="nav-link">Zahlen</a></li>
            <li class="navelement"><a href="#Kontakt" class="nav-link">Kontakt</a></li>
            <li class="navelement"><a href="#Wichtig" class="nav-link">Wichtig für uns</a></li>
        </ul>
    </nav>
</header>
@endsection

@section('main')
<main>
    <section id="bild">
        <img src="img/titelbild_final.jpg" alt="Ein Bild einer Mensa mit bunten Stühlen" width="400" height="267" title="Mensabild">
    </section>
    <section id="ankündigung">
        <h2>Bald gibt es Essen auch online ;)</h2>
        <div id="Message">
            Liebe Studierende,
            wir freuen uns, Ihnen mitteilen zu können, dass wir ab sofort einen neuen Service einführen, der
            Ihr Essenserlebnis bei unserer E-Mensa revolutionieren wird. Ab sofort haben Sie die Möglichkeit,
            Ihr Essen ganz bequem online zu bestellen!
            Nie wieder lange Warteschlangen oder verpasste Mahlzeiten! Mit unserem neuen Online-Bestellsystem
            können Sie Ihr Lieblingsessen im Voraus auswählen und bestellen, ganz bequem von Ihrem Smartphone,
            Tablet oder Computer aus. Egal, ob Sie in der Mensa essen möchten oder Ihr Essen lieber mitnehmen -
            mit nur wenigen Klicks ist Ihr Essen bereit, wenn Sie es möchten.
            Unser Online-Menü bietet Ihnen eine Vielzahl von Optionen, von gesunden Salaten bis hin zu herzhaften
            Hauptgerichten und vegetarischen Spezialitäten. Und das Beste daran? Sie können Ihre Bestellung ganz nach
            Ihren individuellen Vorlieben anpassen, damit Ihr Essen genau Ihren Wünschen entspricht.
            Wir sind stolz darauf, Ihnen diesen neuen Service anbieten zu können und freuen uns darauf,
            Ihr Essenserlebnis bei E-Mensa zu verbessern. Besuchen Sie noch heute unsere Website und
            entdecken Sie die Zukunft des Essens!
        </div>
    </section>
    <section id="speisen">
        <h2>Köstlichkeiten, die Sie erwarten</h2>
        <div class="gridcon">
            <table id ="auswahl">
                <thead>
                <tr>
                    <th>Name des Gerichts</th>
                    <th>Preis intern</th>
                    <th>Preis extern</th>
                    <th>Allergen</th>
                    <th>Bild des Gerichts</th>
                </tr>
                </thead>
                @foreach($gerichte as $gericht)
                    <tr>
                        <td>{{$gericht['name']}}</td>
                        <td>{{$gericht['preisintern']}}</td>
                        <td>{{$gericht['preisextern']}}</td>
                        <td>{{$gericht['allergen_codes']}}</td>
                        <td><img src="img/gerichte/{{$gericht['bildname']}}" alt='{{$gericht['bildname']}}' width = 50></td>
                    </tr>
                @endforeach


                <tr>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                </tr>
            </table>
        </div>
        <ul>
            @foreach($gericht_hat_allergen as $gha)
                <li>{{$gha['code']}} : {{$gha['name']}}</li>
            @endforeach

        </ul>
        
    </section>
</main>
@endsection

@section('footer')
<footer>
    <ul>
        <li>(c) E-Mensa GmbH</li>
        <li>Amelie Petersen und Nele Mikkelsen</li>
        <li><a>Impressum</a></li>
    </ul>
</footer>
@endsection
