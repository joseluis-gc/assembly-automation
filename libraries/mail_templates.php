<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);


try {
    $mail->SMTPDebug = 2;                                            // Enable verbose debug output con 2
    $mail->isSMTP(false);                                            // Set mailer to use SMTP
    $mail->Host = '192.168.2.8';                         // Specify main and backup SMTP servers
    $mail->SMTPAuth = false;                                         // Enable SMTP authentication
    $mail->Username = 'jgomez@martechmedical.com';                   // SMTP username
    $mail->Password = 'joseLuis15!';                                 // SMTP password
    $mail->SMTPSecure = 'tls';                                       // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                                // TCP port to connect to 587
    //antes en 465
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
    );
    $mail->setFrom('magui.campos.281296@gmail.com', '⚠ Hour by Hour Alert');
    $mail->addAddress('MCampos1@martechmedical.com', 'Magui Martech');     //Add a recipient

    //Content
    $subject = "Changes has been update in planning system";
    $body = "
    <head>
    <style>
    #styled-table {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      text-align: center;
      font-size: 10px;
    }
    
    #styled-table td, #styled-table th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #styled-table tr:nth-child(even){background-color: #f2f2f2;}
    
    #styled-table tr:hover {background-color: #ddd;}
    
    #styled-table th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: center;
      background-color: #6B0FEB;
      color: white;
    }
    </style>
    </head>
    <body>
    
    <h2 style='text-align: center;'>Changes has been update in planning system</h2>
    
    <table id='styled-table'>
      <tr>
        <th>PLANT</th>
        <th>AREA</th>
        <th>OUTPUT</th>
        <th>SHIFT</th>
        <th>HC</th>
        <th>DATE</th>
        <th>SUPERVISOR</th>
      </tr>
      <tr>
        <td>Ensamble</td>
        <td>Dilators</td>
        <td>TIP321</td>
        <td>1</td>
        <td>10</td>
        <td>12-29-2021 15:20:45</td>
        <td>M.C.Lagunas</td>
      </tr>
    </table>
    <br/>
    <table id='styled-table'>
    <tr>
      <th>HR</th>
      <th>HC</th>
      <th>ITEM NUMBER</th>
      <th>WO NUMBER</th>
      <th>PLAN BY HR</th>
      <th>CUM PLAN</th>
      <th>PLANNED INTERRUPTION</th>
      <th>LESS TIME</th>
      <th>STD TIME</th>
      <th>CALCULATED QTY BY HR</th>
    </tr>
    <tr>
      <td>07:00AM - 08:00AM</td>
      <td>10</td>
      <td>AC1004HFC</td>
      <td>M1E30</td>
      <td>40</td>
      <td>40</td>
      <td>Lunch</td>
      <td>0.5</td>
      <td>0.01</td>
      <td>950</td>
    </tr>
    </table>
    </body>
    ";


    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
