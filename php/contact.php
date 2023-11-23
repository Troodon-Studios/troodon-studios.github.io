<?php
if(!isset($_REQUEST['first_name']) || !isset($_REQUEST['contact_email']) || !isset($_REQUEST['message'])):
  echo "error";
  die();
endif;

if ($_REQUEST['first_name'] == '' || $_REQUEST['contact_email'] == '' || $_REQUEST['message'] == ''):
  echo "error";
  die();
endif;

if (filter_var($_REQUEST['contact_email'], FILTER_VALIDATE_EMAIL)):
  $subject = 'Troodon Studios Email - contact'; // Asunto de tu correo electrónico

  // Dirección de correo electrónico del destinatario
  $to = 'trodon.studios@gmail.com';  // Cambia la dirección de correo electrónico por la tuya

  // Preparar encabezado
  $header = 'From: '. htmlspecialchars($_REQUEST['first_name'] . " " .$_REQUEST['last_name']) . ' <'. $_REQUEST['contact_email'] .'>'. "\r\n";
  $header .= 'Reply-To:  '. htmlspecialchars($_REQUEST['first_name'] . " " .$_REQUEST['last_name']) . ' <'. $_REQUEST['contact_email'] .'>'. "\r\n";
  $header .= 'X-Mailer: PHP/' . phpversion();

  // Preparar mensaje
  $message = 'Name: ' . htmlspecialchars($_REQUEST['first_name'] . " " .$_REQUEST['last_name']) . "\n";
  $message .= 'Email: ' . $_REQUEST['contact_email'] . "\n";
  $message .= 'Subject: ' . htmlspecialchars($_REQUEST['contact_subject']) . "\n";
  $message .= 'Message: '. htmlspecialchars($_REQUEST['message']);

  // Enviar información de contacto
  $mail = mail($to, $subject, $message, $header);

  if ($mail):
    echo 'sent';
  else:
    echo 'error';
  endif;

else:
  echo 'error';
endif;
?>
