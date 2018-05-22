<?php
class Curl {
	public function request($method, $url, $content) {
		// create curl resource
        $ch = curl_init();
		
		// set method
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);
		
		// return code
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // close curl resource to free up system resources
        curl_close($ch);
		
		return $httpCode;
	}
}
?>