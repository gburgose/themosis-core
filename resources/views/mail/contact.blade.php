@extends('layouts.mail')

@section('content')
    <h1>Nuevo mensaje de contacto</h1>
    <p>Ha recibido el siguiente mensaje:</p>
    <ul>
        <li>Nombre: {{ $name }}</li>
        <li>Email: {{ $email }}</li>
        <li>Asjunto: {{ $subject}}</li>
    </ul>
    <blockquote>
        {!! nl2br($content) !!}
    </blockquote>
    <p>
        Saludos.<br>
    </p>
@endsection
