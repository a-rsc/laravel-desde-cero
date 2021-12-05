<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contacto recibido</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
        </style>
    </head>
    <body>
        <h1>Contacto recibido</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, odit id temporibus eum quos quod natus quia repellendus reprehenderit neque unde ipsam aliquam maiores aspernatur cumque praesentium nihil officiis beatae?</p>

        {{-- {{ var_dump($message) }} No se puede llamar $message porque es una palabra reservada --}}

        {{ var_dump($msg) }}


        <p>Recibiste un mensaje de: {{ $msg['name'] }} - {{ $msg['email'] }}</p>
        <p><strong>Asunto:</strong> {{ $msg['subject'] }}</p>
        <p><strong>Contenido:</strong> {{ $msg['content'] }}</p>

    </body>
</html>
