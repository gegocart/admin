<?php

namespace App\Traits;
/**
* class MSG91 to send SMS on Mobile Numbers.
* @author Shashank Tiwari
*/

trait MobileMSG91
{
	
    //private $API_KEY = '270555AkIId3Lo5ca3740c';
    //private $API_KEY = '265776A84KtykRc4J5c7cf3f5';
    private $API_KEY = '270390Ack5vU5on5e9854a6P1';
    private $SENDER_ID = "611332";
    private $ROUTE_NO = 4;
    private $RESPONSE_TYPE = 'json';

    public function sendSMS($OTP, $mobileNumber)
    {
        $isError = 0;
        $errorMessage = true;
        //Your message to send, Adding URL encoding.
        $message = urlencode("Welcome to Gegocart , Your OTP is : $OTP");
        //Preparing post parameters
        //dump('dkfh');
        $postData = array(
            'authkey' => $this->API_KEY,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $this->SENDER_ID,
            'route' => $this->ROUTE_NO,
            'response' => $this->RESPONSE_TYPE
        );
        //dump($postData);
        $curl = curl_init();
           curl_setopt_array($curl, array(
            CURLOPT_URL => "http://control.msg91.com/api/sendotp.php?template=&otp_length=&authkey=".$this->API_KEY."&message=".$message."&sender=".$this->SENDER_ID."&mobile=".$mobileNumber."&otp=".$OTP."&country=0",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }

      }

}