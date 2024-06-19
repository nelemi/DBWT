@extends ('examples.layout.m4_7d_layout')

@section ('title', 'Nummer 1')

@section ('header')
    <ul>
        <li> Warum das erste Layout?</li>
        <li> Darum</li>
        <li> Test</li>
    </ul>
@endsection
@section ('main')
    <p> Antwort: Weil der Controller durch die URL den Parameter no=1 erhalten hat</p>
@endsection
@section('footer')
    Rechte gehören Nele Mikkelsen und Amelie Petersen
@endsection