<?php
require '../../../vendors/PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$params = $_REQUEST;
$toadd = $_POST['eto'];
$tocc = $_POST['ecc'];
$subject = $_POST['esubject'];
$content = $_POST['summernote'];

// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'fauzanricky09@gmail.com';
$mail->Password = 'RICKYff09';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('fauzanricky09@gmail.com', 'Admin e-CRM');
$mail->addReplyTo('fauzanricky09@gmail.com', 'Admin e-CRM');

// Menambahkan penerima
$mail->addAddress($toadd);

// Menambahkan beberapa penerima
//$mail->addAddress('penerima2@contoh.com');
//$mail->addAddress('penerima3@contoh.com');

// Menambahkan cc atau bcc 
$mail->addCC($tocc);
//$mail->addBCC('bcc@contoh.com');

// Subjek email
$mail->Subject = "$subject";

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = "$content";
$mail->Body = $mailContent;

// Menambahakn lampiran
// $mail->addAttachment('lmp/file1.pdf');
// $mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

// Kirim email
if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim. ';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    echo 'Pesan telah terkirim';
}