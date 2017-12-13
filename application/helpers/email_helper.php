<?php
function send_email($to, $subject, $body) {
	$CI = &get_instance();
	
	$config = array();
	$config['protocol'] = 'smtp';
	$config['smtp_host'] = 'in-v3.mailjet.com';
	$config['smtp_user'] = 'ea85eb22a11adeb94c28b738be9be325';
	$config['smtp_pass'] = 'b1d65f1903a06f20a7e846a5e5555a39';
	$config['smtp_port'] = 587;
	$config['smtp_crypto'] = 'tls';
	$config['mailtype'] = 'html';

	$CI->load->library('email');
	
	$CI->email->initialize($config);

	$CI->email->from('toulza.jean@gmail.com', 'RUDEAD');
	$CI->email->to($to);

	$CI->email->subject($subject);
	$CI->email->message($body);

	$CI->email->send();
}