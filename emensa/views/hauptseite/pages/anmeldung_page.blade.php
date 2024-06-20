<?php
/**
 * Praktikum DBWT. Autoren:
 * Amelie, Petersen, 3661323
 * Nele, Mikkelsen, 3650167
 */
?>

@extends('hauptseite.layout.werbeseite_layout')

@section('main')
    <main>
        <form action="" method="post">
            <label for="email">Ihre E-Mail</label>
            <br>
            <input type="text" id="email" name="email" required>
            <br>
            <label for="passwort">Ihr Passwort</label>
            <br>
            <input type="text" id="passwort" name="passwort" required>
            <br>
            <input id="bestätigen" type="submit" name="submit" value="Bestätigen">
        </form>
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
