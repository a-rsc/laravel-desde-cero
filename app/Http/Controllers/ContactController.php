<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactReceived;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Video 17: Laravel desde cero (Aprendible)
        // return $request->all();

        // Validación con mensajes personalizados...
        $msg = $request->validate([
            'name' => 'required|between:2,80',
            'email' => 'required|email',
            'subject' => 'required|between:2,80',
            'content' => 'required|between:3,2048',
        ], [
            'name.required' => __('I need your name'),
        ]);

/* 1r método
        // Enviar el email -> config/mail.php / cambiamos .env
        // Se ha cambiado la variable de entorno MAIL_MAILER= de smtp a log
        // MAIL_MAILER=log
        // php artisan make:mail ContactReceived

        // Mail::to('a_rsc@hotmail.com')->send(new ContactReceived($msg));
        Mail::to('a_rsc@hotmail.com')->queue(new ContactReceived($msg));

        //
        // Recomendación: utilizar queue antes que send. Las queues nos ayudan a realizar procesos en segundo plano para evitar que el usuario tenga que esperar que termine el proceso (en este caso, enviar el email para obtener una respuesta). En este caso la respuesta es 'Mensaje enviado'.
        // Para utilizar queues se requiere una configuración adicional, pero si no está configurada utilizará el método send...

        return 'Mensaje enviado';
 */

/*
         // La forma más rápida para visualizarlo al navegador. Es simplemente, retornando una nueva instancia de la clase Mailable
        return new ContactReceived($msg);
 */


        // https://mailtrap.io (utilizada cuenta alvaro.rodriguez.ars@gmail.com)
        // Otra forma de revisar el email cuando estamos en local es mediante Mailtrap. En el archivo .env, Laravel nos trae soporta para Mailtrap y MAIL_MAILER= debe ser stmp.

        // https://mailtrap.io/
        // Integrations: Ruby on Rails
        // config.action_mailer.delivery_method = :smtp
        // config.action_mailer.smtp_settings = {
        //     :user_name => '',
        //     :password => '',
        //     :address => 'smtp.mailtrap.io',
        //     :domain => 'smtp.mailtrap.io',
        //     :port => '2525',
        //     :authentication => :cram_md5
        // }

        Mail::to('a_rsc@hotmail.com')->queue(new ContactReceived($msg));

        return back()->with('status', __('Recibimos tu mensaje, te responderemos en menos de 24horas.'));

        // Producción (lo que haríamos en el servidor de producción / hosting)
        // En el archivo config/mail.php tenemos todos los drivers que soporta Laravel por defecto para producción. Jorge recomienda SendGrid los planes son muy correctos. Laravel por defecto no soporta SendGrid, pero hay un paquete que se puede utilizar https://github.com/s-ichikawa/laravel-sendgrid-driver

        // Se instala -> $ composer require s-ichikawa/laravel-sendgrid-driver
        // Seguimos la guía...
        // La instalación nos dice que se descubrió el paquete entonces podemos omitir añadir the SendGrid service en config/app.php
        // Se copian unas variables en el archivo .env, también se especifican en .env.example
        // MAIL_DRIVER=sendgrid
        // SENDGRID_API_KEY='YOUR_SENDGRID_API_KEY'
        // # Optional: for 7+ laravel projects
        // MAIL_MAILER=sendgrid

        // Vamos a app.sendgrid.com / settings / api keys / creamos una nueva llave api

        // Copiar en el archivo config/services.php
        // 'sendgrid' => [
        //     'api_key' => env('SENDGRID_API_KEY'),
        // ],

        // Copiar en el archivo config/mail.php
        // 'mailers' => [
        //     'sendgrid' => [
        //         'transport' => 'sendgrid',
        //     ],
        // ],

        // Todo esto va a funcionar sin cambiar nada en el ContactController
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
