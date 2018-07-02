<?php

namespace App\Library;

class Elavon
{
    protected $url = "https://api.demo.convergepay.com/VirtualMerchantDemo/processxml.do";
    /*protected $userId = "devportal";
    protected $marchantID = "009005";
    protected $pin = "BDDZY5KOUDCNPV4L3821K7PETO4Z7TPYOJB06TYBI1CW771IDHXBVBP51HZ6ZANJ";
    protected $test_mode = false;*/
    protected $userId = "webpage";
    protected $marchantID = "005454";
    protected $pin = "Y5KSOF";
    protected $test_mode = true;

    /*protected $url = "https://api.convergepay.com/VirtualMerchant/processxml.do";
    protected $userId = "ISWEB";
    protected $marchantID = "871772";
    protected $pin = "R9TEB4P4M2PZXG4WQN06O493DWMSQ6Q9JT8EQO3PSAL1PFC3KDCUCYQ46G71AFD5";
    protected $test_mode = true;*/

    public function saleTransaction($trans_data)
    {
        $xmldata = '<txn>
         <ssl_merchant_id>' . $this->marchantID . '</ssl_merchant_id>
         <ssl_user_id>' . $this->userId . '</ssl_user_id>
         <ssl_pin>' . $this->pin . '</ssl_pin>
         <ssl_test_mode>' . $this->test_mode . '</ssl_test_mode>
         <ssl_transaction_type>ccsale</ssl_transaction_type>
         <ssl_card_number>' . $trans_data['card_number'] . '</ssl_card_number>
         <ssl_exp_date>' . $trans_data['cc_mon'] . $trans_data['cc_yr'] . '</ssl_exp_date>
         <ssl_amount>' . $trans_data['amount'].'</ssl_amount>
         <ssl_cvv2cvc2_indicator>1</ssl_cvv2cvc2_indicator> 
        <ssl_cvv2cvc2>' . $trans_data['ccv'] . '</ssl_cvv2cvc2>
         <ssl_first_name>' . $trans_data['first_name'] . '</ssl_first_name>
         </txn>';
        return simplexml_load_string($this->sendRequest($xmldata));
    }
    /*<ssl_amount>' . $trans_data['total'] . '</ssl_amount>*/
    public function CompleteTransaction($trans_data)
    {
        $xmldata = '<txn>
         <ssl_merchant_id>' . $this->marchantID . '</ssl_merchant_id>
         <ssl_user_id>' . $this->userId . '</ssl_user_id>
         <ssl_pin>' . $this->pin . '</ssl_pin>
         <ssl_test_mode>' . $this->test_mode . '</ssl_test_mode>
         <ssl_transaction_type>ccsale</ssl_transaction_type>
         <ssl_card_number>' . $trans_data['card_number'] . '</ssl_card_number>
         <ssl_exp_date>' . $trans_data['cc_mon'] . $trans_data['cc_yr'] . '</ssl_exp_date>
         <ssl_amount>' . $trans_data['amount'].'</ssl_amount>
         <ssl_cvv2cvc2_indicator>1</ssl_cvv2cvc2_indicator> 
        <ssl_cvv2cvc2>' . $trans_data['ccv'] . '</ssl_cvv2cvc2>
         <ssl_first_name>' . $trans_data['first_name'] . '</ssl_first_name>
         </txn>';

        return simplexml_load_string($this->sendRequest($xmldata));
    }

    public function deleteTransaction($trans_data)
    {
        $xmldata = '<txn>
        <ssl_merchant_id>' . $this->marchantID . '</ssl_merchant_id>
        <ssl_user_id>' . $this->userId . '</ssl_user_id>
        <ssl_pin>' . $this->pin . '</ssl_pin>
        <ssl_test_mode>' . $this->test_mode . '</ssl_test_mode>
        <ssl_transaction_type>ccdelete</ssl_transaction_type>
        <ssl_txn_id>'.$trans_data['txn_id'].'</ssl_txn_id>
        </txn>';
        return simplexml_load_string($this->sendRequest($xmldata));
    }

    public function sendRequest($xmldata)
    {
        $url = $this->url;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "xmldata=" . $xmldata);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //testing w/out SSL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //testing w/out SSL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);

        $response = curl_exec($ch);
        return $response;
        /*$rxml = simplexml_load_string($response);


        $status = $rxml->ssl_result_message;
        $error = $rxml->errorName."<br>".$rxml->errorMessage;

        if ($status == 'APPROVED') {
            echo "Transaction Approved"; die;
        }

        if ($error && $error != '<br>') {
            echo $error; die;
        }

        */

    }
}