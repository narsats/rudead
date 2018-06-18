<?php
function send_email($to, $subject, $body) {
	$CI = &get_instance();
	
	$config = array();
	$config['protocol'] = 'smtp';
	$config['smtp_host'] = 'mail.hipstercat.fr';
	$config['smtp_user'] = 'hipstercat/mx1-hipstercat-fr';
	$config['smtp_pass'] = 'hsh7GyJaHr4T60s0H3Dw5yGO';
	$config['smtp_port'] = 25;
	$config['smtp_crypto'] = 'tls';
	$config['mailtype'] = 'html';

	$CI->load->library('email');
	
	$CI->email->initialize($config);

	$CI->email->from('rudead@hipstercat.fr', 'RUDEAD');
	$CI->email->to($to);

	$CI->email->subject($subject);
	$CI->email->message($body);

	$CI->email->send();
}
