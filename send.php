<?php
ini_set('display_errors', 'On');
date_default_timezone_set('Europe/Moscow');

$thanks_file = 'form-ok.php';

if(isset($_POST['phone'])) {
	

		$name = trim($_REQUEST['name']);
		$phone = trim($_REQUEST['phone']);
		$email = trim($_REQUEST['email']);
		$comment = trim($_REQUEST['comment']);
        $ip = $_SERVER['REMOTE_ADDR'];
		
		$site = $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URL']);

		
		$from = array('noreply@' . $site);
		$to = file(__DIR__ . '/email.cnf');
		$to = array_map('trim', $to);
		$subject = 'Новый заказ с сайта ' . $site;
		$message = 'Поступил новый заказ с сайта ' . $site . ':
			<table>
				<tr>
					<td><b>Дата:</b></td>
					<td>' . date('d.m.Y H:i') . '</td>
				</tr>';
      		if($name != '') {
				$message .= '<tr>
					<td><b>Имя:</b></td>
					<td>' . $name . '</td>
				</tr>';
			}	
			if($phone != '') {
				$message .= '<tr>
					<td><b>Телефон:</b></td>
					<td>' . $phone . '</td>
				</tr>';
			}
			if($email != '') {
				$message .= '<tr>
					<td><b>Email:</b></td>
					<td>' . $email . '</td>
				</tr>';
			}
			if($comment != '') {
				$message .= '<tr>
					<td><b>Комментарий:</b></td>
					<td>' . $comment . '</td>
				</tr>';
			}
     		if($ip != '') {
				$message .= '<tr>
					<td><b>IP address:</b></td>
					<td>' . $ip . '</td>
				</tr>';
			}
						
	    $message .= '</table>';				
		
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		$headers .= "From: " . implode(',', $from) . "\r\n";

		$result = mail(implode(',', $to), $subject, $message, $headers);
		
		if($result) {
			header('Location: ' . $thanks_file);
		}
		else {
			echo 'Ошибка';
		}
}
