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
        <form action="/anmeldung_verifizieren" method="post">
            <label for="email">Ihre E-Mail</label>
            <br>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="password">Ihr Passwort</label>
            <br>
            <input type="text" id="password" name="password" required>
            <br>
            <input id="bestätigen" type="submit" name="submit" value="Bestätigen">
        </form>
    </main>
@endsection

@section('footer')
    <footer>
        <p>{{$_SESSION['login_result_message']}}</p>
        <ul>
            <li>(c) E-Mensa GmbH</li>
            <li>Amelie Petersen und Nele Mikkelsen</li>
            <li><a>Impressum</a></li>
        </ul>
    </footer>
@endsection
