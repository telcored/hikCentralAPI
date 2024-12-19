<?php
class CurlRequest {

	public $apiKey = "";
	public $accessKey = "";
	public $urlQuery = "";
	public $header = array();
	public $hashType = "sha256";

	public function buildToken(): string {
		$transactionDT = gmdate( "Y-m-d\TH:i:s\Z" );
		$signature     = hash( $this->hashType, $this->apiKey . "," . $this->accessKey . "," . $transactionDT );

		return ( "apiKey=" . $this->apiKey . "&utcTimeStamp=" . $transactionDT . "&signature=" . $signature );
	}

	public function getRequest() {
		$token        = $this->buildToken();
		$this->header = array(
			"Accept: application/json",
			"Authorization: Bearer " . $token,
		);
		$ch           = curl_init( $this->urlQuery );
		curl_setopt( $ch, CURLOPT_URL, $this->urlQuery );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, $this->header );

		$JSONresult = ( curl_exec( $ch ) );
		if ( $JSONresult === false ) {
			die( curl_error( $ch ) );
		}
		curl_close( $ch );

		return ( json_decode( $JSONresult ) );
	}
}