<?php

//form contacto
add_action('wp_ajax_nopriv_contacto', 'enviar_mail_contacto');
add_action('wp_ajax_contacto', 'enviar_mail_contacto');

//suscribir news
add_action('wp_ajax_nopriv_suscribir', 'suscribir_email');
add_action('wp_ajax_suscribir', 'suscribir_email');


//contacto propiedad
add_action('wp_ajax_nopriv_propiedad', 'consulta_propiedad');
add_action('wp_ajax_propiedad', 'consulta_propiedad');

function consulta_propiedad() {

    header('Content-type: application/json');

    $honeyPot = filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_STRING);

    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $propiedad = filter_input(INPUT_POST, 'propiedad', FILTER_SANITIZE_STRING);

//Descarto por ser un bot!
    if ($honeyPot !== '') {
        echo json_encode(array('enviado' => TRUE, 'trucho-sex' => TRUE));
        die();
    }

    if (is_null($nombre) || is_null($email)) {
        echo json_encode(array('enviado' => TRUE, 'trucho-vacio' => TRUE));
        die();
    }

    $cuerpo_email = "<h3>Nueva Consulta de Propiedad:</h3>
                    <p>Propiedad: <b>{$propiedad}</b></p><hr/>
                    <p>Nombre: <b>{$nombre}</b> </p>                    
                    <p>Email: <b>{$email}</b></p>                    
                    <p>Telefono: <b>{$telefono}</b></p>";

    $asunto = 'Consulta Propiedad Ideale';
    enviar_email('Consulta Propiedad desde Web', $cuerpo_email, $asunto);
}

function suscribir_email() {

    header('Content-type: application/json');

    $honeyPot = filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);


    //Descarto por ser un bot!
    if ($honeyPot !== '') {
        echo json_encode(array('enviado' => TRUE, 'trucho-sex' => TRUE));
        die();
    }

    if (is_null($email)) {
        echo json_encode(array('enviado' => TRUE, 'trucho-vacio' => TRUE));
        die();
    }

    $cuerpo_email = "<h3>Nueva Subscripcion a Newsletter de Ideale</h3>                                    
                    <p>Email: <b>{$email}</b></p>";

    $asunto = 'Subscripcion Newsletter IDEALE';
    enviar_email('Newsletter IDEALE', $cuerpo_email, $asunto);
}

function enviar_mail_contacto() {


    header('Content-type: application/json');

    $honeyPot = filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_STRING);

    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mensaje = filter_input(INPUT_POST, 'mensaje', FILTER_SANITIZE_STRING);


//Descarto por ser un bot!
    if ($honeyPot !== '') {
        echo json_encode(array('enviado' => TRUE, 'trucho-sex' => TRUE));
        die();
    }

    if (is_null($nombre) || is_null($email)) {
        echo json_encode(array('enviado' => TRUE, 'trucho-vacio' => TRUE));
        die();
    }

//REGLAS DE SPAM
    if (substr_count($mensaje, '$') > 2 || substr_count($mensaje, '.com') > 3 || substr_count($mensaje, '.xxx') > 1) {
        echo json_encode(array('enviado' => TRUE, 'trucho' => TRUE, 'spam-loco' => TRUE));
        die();
    }

    $cuerpo_email = "<h3>Nueva Consulta desde el Formulario Web de Ideale</h3>
                    <p>Nombre: <b>{$nombre}</b> </p>                    
                    <p>Email: <b>{$email}</b></p>
                    <p>Mensaje: <b>{$mensaje}</b></p>
                    <p>Telefono: <b>{$telefono}</b></p>";

    $asunto = 'Consulta Ideale';
    enviar_email('Formulario de contacto Ideale', $cuerpo_email, $asunto);
}

function enviar_email($from, $cuerpo_email, $asunto, $replyName = 'Contacto Ideale', $replyEmail = 'contacto@idealepropiedades.com') {


    include_once 'class.phpmailer.php';
    $mail = new PHPMailer;
    $mail->IsSMTP();                           // tell the class to use SMTP

    $mail->SMTPAuth = true;                  // enable SMTP authentication  
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;                    // set the SMTP server port
    $mail->Host = "smtp.gmail.com"; // SMTP server
    $mail->Username = "formulario@worq.com.ar";     // SMTP server username
    $mail->Password = "f0rmulario_de_worq_con_q";            // SMTP server password

    $mail->From = 'formulario@worq.com.ar';
    $mail->FromName = $from;
    $mail->addAddress($replyEmail, $replyName);
    $mail->addBCC('nicolas@worq.com.ar', 'Nicolas');
    $mail->addReplyTo('formulario@worq.com.ar', 'Form');

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $asunto;
    $mail->Body = $cuerpo_email;

    if (!$mail->send()) {
        echo json_encode(array('enviado' => FALSE, 'error-mailer' => $mail->ErrorInfo));
        exit;
    }
    echo json_encode(array('enviado' => TRUE));
    die(); // Siempre hay que terminar con die
}
