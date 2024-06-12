@extends ('viewa.examples.layout.m4_7d_layout.blade.php')

@section ('title', 'Nummer 2')

@section ('header')
    <ul>
        <li> Warum das zweite Layout?</li>
        <li> Darum</li>
        <li> Test</li>
    </ul>
@endsection
@section ('main')
    <p> Antwort: Weil der Controller durch die URL den Parameter no=2 erhalten hat</p>
@endsection
@section('footer')
    Rechte gehören Amelie Petersen und Nele Mikkelsen
@endsection