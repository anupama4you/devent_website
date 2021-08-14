<?php
//get data from form  
$name = $_POST['name'];
$email= $_POST['email'];
$contact= $_POST['phone_no'];
$type= $_POST['type_of_event'];
$message= $_POST['message'];

$to = "info@devent.lk";
$subject = "Contact | DEVENT";
$txt ="Name = ". $name . "\r\n Email = " . $email ."\r\n Contact No = " . $contact ."\r\n Event Type = " . $type. "\r\n Message =" . $message;
$headers = "From:".$name. "| DEVENT" . "\r\n" .
"CC: anupama.dilshan@aiesec.net";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
echo "<script>
alert('Your message was successfully sent!');
window.location.href='contact.html';
</script>";
?>