<?php

class Elavon { 
	protected $url = "https://api.demo.convergepay.com/VirtualMerchantDemo/processxml.do";
	protected $userId = "webpage";
	protected $marchantID = "005454";
	protected $pin = "Y5KSOF";
	protected $test_mode = true;

	public function saleTransaction($trans_data){
		$xmldata = '<txn>
        <ssl_merchant_id>'.$this->marchantID.'</ssl_merchant_id>
        <ssl_user_id>'.$this->userId.'</ssl_user_id>
        <ssl_pin>'.$this->pin.'</ssl_pin>
        <ssl_test_mode>'.$this->test_mode.'</ssl_test_mode>
        <ssl_transaction_type>ccsale</ssl_transaction_type>
        <ssl_card_number>'.$trans_data->card_number.'</ssl_card_number>
        <ssl_exp_date>'.$trans_data->cc_mon.' '.$trans_data->cc_yr.'</ssl_exp_date>
        <ssl_amount>'.$trans_data->total.'/ssl_amount>
        <ssl_first_name>'.$trans_data->first_name.'</ssl_first_name>
        </txn>';
        return $this->sendRequest($xmldata);
	}

	public function sendRequest($xmldata){
		$url = $this->url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS,
		    "xmlRequest=" . $xmldata);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
		$data = curl_exec($ch);
		curl_close($ch);
		$response = json_decode(json_encode(simplexml_load_string($data)), true);

		return $response;
	}
}

    