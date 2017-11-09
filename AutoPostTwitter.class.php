<?php 

/**
 * TwiiterAPI [ HELPER ]
 * Classe para automaticar post automaticos
 * @copyright (c) 2017, Davson N. Santos - DAVTECH - SOLUÇÕES INTELIGENTES
 */


require 'OAuthTwitter/twitteroauth.php';

class TwitterAPI{

	private $Consumer_key = 'XOMSUMER_KEY';
	private $Consumer_secret = 'CONSUMER_SECRET';
	private $OAuth_token = 'OAUTH_TOKEN';
	private $OAuth_secret = 'OAUTH_SECRET';

	public $Conn; //Conexão com a API
	public $Auth; //Autenticação da API
	public $User; //Dados de Usuários
	public $Set;  //Set para as publicações

	function __construct(){
		$this->Conn = new TwitterOAuth($this->Consumer_key, $this->Consumer_secret, $this->OAuth_token, $this->OAuth_secret); //Instancia o Objeto
		$this->Auth = $this->Conn->get('account/verify_credentials'); // Verifica as Permissões
	}

	public function AutoPost($Data){
		return $this->Conn->post('statuses/update',array('status' => $Data['twiiter']));
	}

	public function getTimeLine($Data){
		return $this->Conn->get("statuses/user_timeline",array('count' => $Data['count'],'user_id'=>$Data['user_id']));
	}

	public function getMyData(){
		return $this->Conn->get("account/verify_credentials");
	}


}
