<?php

class Mailer{
	public $apiKey;
	public $secretKey;
	public $subject;
	public $from;
	public $reply_to;
	public $name;
	public $to;
	public $body;
	private $sender;
	private $host;
	
	function __construct( $sender ){
		switch( $sender ){
			case 'mailjet':
				$this->host = 'in.mailjet.com';
				$this->apiKey = '';
				$this->secretKey = '';
				$this->port = 587;
				break;
			case 'amazon':
				$this->host = 'ssl://email-smtp.us-east-1.amazonaws.com';
				$this->apiKey = '';
				$this->secretKey = '';
				$this->port = 465;
				break;
			case 'mandrill':
				$this->host = 'smtp.mandrillapp.com';
				$this->apiKey = '';
				$this->secretKey = '';
				$this->port = 587;
				break;
		}
	}

	function send(){	
		if( is_array( $this->to ) ) $emails = $this->to;
		else $emails[] = $this->to;

		if( !class_exists('Mail') ) require 'Mail.php';
		
		$headers = array(
			'From' => $this->name . ' <' . $this->from . '>',
			'Subject' => $this->subject,
			'Content-type' => 'text/html; charset=UTF-8'
			);
			
		if( $this->reply_to ) $headers['Reply-To'] = $this->reply_to;
		 
		$smtp = Mail::factory('smtp',
		   		      array ('host' => $this->host,
	     		      	     'port' => $this->port,
	     		             'auth' => true,
	     		             'username' => $this->apiKey,
	     		             'password' => $this->secretKey));
		     		             	

		     		             	
		     		             	
		return $smtp->send($emails, $headers, $this->body );
	}
}

?>