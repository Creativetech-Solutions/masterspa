<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
 
	protected function processPayment(){
		$accountID = "Merchant's Account ID Here";
		$secretKey = "Merchant's Secret Key Here";
		$mode = "TEST";
		 
		$payment = new BluePay(
		    $accountID,
		    $secretKey,
		    $mode
		);
		$payment->setCustomerInformation(array(
		    'firstName' => 'Bob', 
		    'lastName' => 'Tester', 
		    'addr1' => '1234 Test St.', 
		    'addr2' => 'Apt #500', 
		    'city' => 'Testville', 
		    'state' => 'IL', 
		    'zip' =>'54321', 
		    'country' => 'USA', 
		    'phone' => '1231231234', 
		    'email' => 'test@bluepay.com' 
		));
		 
		$payment->setCCInformation(array(
		    'cardNumber' => '4111111111111111', // Card Number: 4111111111111111
		    'cardExpire' => '1225', // Card Expire: 12/25
		    'cvv2' => '123' // Card CVV2: 123
		));
		 
		$payment->sale('3.00'); // Sale Amount: $3.00
		 
		 // Makes the API request with BluePAy
		$payment->process();
		 
		// Reads the response from BluePay
		if($payment->isSuccessfulResponse()){
		    echo 
		    'Transaction Status: '. $payment->getStatus() . "\n" .
		    'Transaction Message: '. $payment->getMessage() . "\n" .
		    'Transaction ID: '. $payment->getTransID() . "\n" .
		    'AVS Response: ' . $payment->getAVSResponse() . "\n" .
		    'CVS Response: ' . $payment->getCVV2Response() . "\n" .
		    'Masked Account: ' . $payment->getMaskedAccount() . "\n" .
		    'Card Type: ' . $payment->getCardType() . "\n" .
		    'Authorization Code: ' . $payment->getAuthCode() . "\n";
		} else{
		    echo $payment->getMessage() . "\n";
		}
	}
}