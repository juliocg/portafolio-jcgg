<?php
// Pear Mail Library
require_once "Mail.php";

// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));


$from = "contacto.jcgg@gmail.com"; //change this to your email address
$to = "juliocgfi@gmail.com"; // change to address
$subject = "Mensaje desde el formulario de contacto del portafolio:  $name"; // subject of mail
$body = "Ha recibido un nuevo mensaje desde el formulario de contacto del portafolio.\n\n"."Detalles:\nNombre: $name\n\nCorreo electrónico: $email_address\n\nTelefono: $phone\nMensaje:\n$message"; //content of mail

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'contacto.jcgg@gmail.com', //your gmail account
        'password' => 'n3wt0n#1988' // your password
    ));

// Send the mail
$mail = $smtp->send($to, $headers, $body);


/*// Create the email and send the message
$to = 'juliocgfi@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Mensaje desde el formulario de contacto del portafolio:  $name";
$email_body = "Ha recibido un nuevo mensaje desde el formulario de contacto del portafolio.\n\n"."Detalles:\n\Nombre: $name\n\nCorreo electrónico: $email_address\n\nTelefono: $phone\n\Mensaje:\n$message";
$headers = "From: contacto.jcgg@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);*/
return true;			
?>
