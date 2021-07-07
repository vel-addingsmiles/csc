<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use Cake\Event\Event;

class PaymentComponent extends Component
{
	private $working_key;
    private $merchant_id;
    private $amount;
    private $order_id;
    private $url;
    private $billing_name;
    private $billing_address;
    private $billing_country;
    private $billing_state;
    private $billing_city;
    private $billing_zip;
    private $billing_tel;
    private $billing_email;
    private $delivery_name;
    private $delivery_address;
    private $delivery_country;
    private $delivery_state;
    private $delivery_city;
    private $delivery_zip;
    private $delivery_tel;
    private $billing_notes;

    // public $this->merchant_id = '66558';
    // public $this->working_key = '05CC990BF106022BCD39BDB7BAA7EA5C';
    // public $this->url = 'http://localhost/chennis/pages/test';

// echo  $merchant_id; die;

    // public function __construct( $merchant_id, $working_key, $url )
    // {
    //     $this->merchant_id = $merchant_id;
    //     $this->working_key = $working_key;
    //     $this->url = $url;
    // }

    public function getWorkingKey() {
        return '05CC990BF106022BCD39BDB7BAA7EA5C';
    }

    public function getMerchantId() {
        return 66558;
    }

    public function setWorkingKey( $working_key ) {
        $this->working_key = $working_key;
    }

    public function setMerchantId( $merchant_id ) {
        $this->merchant_id = $merchant_id;
    }

    public function setAmount( $amount ) {
        $this->amount = $amount;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setOrderId( $order_id ) {
        $this->order_id = $order_id;
    }

    public function getOrderId() {
        return $this->order_id;
    }

    public function setRedirectUrl( $url ) {
        $this->url = $url;
    }

    public function getRedirectUrl() {
        return $this->url;
    }

    public function setBillingName( $billing_name ) {
        $this->billing_name = $billing_name;
    }

    public function getBillingName() {
        return $this->billing_name;
    }

    public function setBillingAddress( $billing_address ) {
        $this->billing_address = $billing_address;
    }

    public function getBillingAddress() {
        return $this->billing_address;
    }

    public function setBillingCountry( $billing_country ) {
        $this->billing_country = $billing_country;
    }

    public function getBillingCountry() {
        return $this->billing_country;
    }

    public function setBillingState( $billing_state ) {
        $this->billing_state = $billing_state;
    }

    public function getBillingState() {
        return $this->billing_state;
    }

    public function setBillingCity( $billing_city ) {
        $this->billing_city = $billing_city;
    }

    public function getBillingCity() {
        return $this->billing_city;
    }

    public function setBillingZip( $billing_zip ) {
        $this->billing_zip = $billing_zip;
    }

    public function getBillingZip() {
        return $this->billing_zip;
    }

    public function setBillingTel( $billing_tel ) {
        $this->billing_tel = $billing_tel;
    }

    public function getBillingTel() {
        return $this->billing_tel;
    }

    public function setBillingEmail( $billing_email ) {
        $this->billing_email = $billing_email;
    }

    public function getBillingEmail() {
        return $this->billing_email;
    }

        public function setDeliveryName( $delivery_name ) {
        $this->delivery_name = $delivery_name;
    }

    public function getDeliveryName() {
        return $this->delivery_name;
    }

    public function setDeliveryAddress( $delivery_address ) {
        $this->delivery_address = $delivery_address;
    }

    public function getDeliveryAddress() {
        return $this->delivery_address;
    }

    public function setDeliveryCountry( $delivery_country ) {
        $this->delivery_country = $delivery_country;
    }

    public function getDeliveryCountry() {
        return $this->delivery_country;
    }

    public function setDeliveryState( $delivery_state ) {
        $this->delivery_state = $delivery_state;
    }

    public function getDeliveryState() {
        return $this->delivery_state;
    }

    public function setDeliveryCity( $delivery_city ) {
        $this->delivery_city = $delivery_city;
    }

    public function getDeliveryCity() {
        return $this->delivery_city;
    }

    public function setDeliveryZip( $delivery_zip ) {
        $this->delivery_zip = $delivery_zip;
    }

    public function getDeliveryZip() {
        return $this->delivery_zip;
    }

    public function setDeliveryTel( $delivery_tel ) {
        $this->delivery_tel = $delivery_tel;
    }

    public function getDeliveryTel() {
        return $this->delivery_tel;
    }

    public function setBillingNotes( $billing_notes ) {
        $this->billing_notes = $billing_notes;
    }

    public function getBillingNotes() {
        return $this->billing_notes;
    }

    public function billingSameAsShipping() {
        $this->delivery_name = $this->billing_name;
        $this->delivery_address = $this->billing_address;
        $this->delivery_country = $this->billing_country;
        $this->delivery_state = $this->billing_state;
        $this->delivery_city = $this->billing_city;
        $this->delivery_zip = $this->billing_zip;
        $this->delivery_tel = $this->billing_tel;
    }

    public function getMerchantData( $checksum ) {
        // $merchant_data= 'Merchant_Id='.$this->getMerchantId();
        // $merchant_data .= '&Amount='.$this->getAmount();
        // $merchant_data .= '&Order_Id='.$this->getOrderId();
        // $merchant_data .= '&Redirect_Url='.$this->getRedirectUrl();
        // $merchant_data .= '&billing_cust_name='.$this->getBillingName();
        // $merchant_data .= '&billing_cust_address='.$this->getBillingAddress();
        // $merchant_data .= '&billing_cust_country='.$this->getBillingCountry();
        // $merchant_data .= '&billing_cust_state='.$this->getBillingState();
        // $merchant_data .= '&billing_cust_city='.$this->getBillingCity();
        // $merchant_data .= '&billing_zip_code='.$this->getBillingZip();
        // $merchant_data .= '&billing_cust_tel='.$this->getBillingTel();
        // $merchant_data .= '&billing_cust_email='.$this->getBillingEmail();
        // $merchant_data .= '&delivery_cust_name='.$this->getDeliveryName();
        // $merchant_data .= '&delivery_cust_address='.$this->getDeliveryAddress();
        // $merchant_data .= '&delivery_cust_country='.$this->getDeliveryCountry();
        // $merchant_data .= '&delivery_cust_state='.$this->getDeliveryState();
        // $merchant_data .= '&delivery_cust_city='.$this->getDeliveryCity();
        // $merchant_data .= '&delivery_zip_code='.$this->getDeliveryZip();
        // $merchant_data .= '&delivery_cust_tel='.$this->getDeliveryTel();
        // $merchant_data .= '&billing_cust_notes='.$this->getBillingNotes();
        // $merchant_data .= '&Checksum='.$checksum  ;

        $merchant_data= 'Merchant_Id=66558';
        $merchant_data .= '&Amount=10';
        $merchant_data .= '&Order_Id='.uniqid();
        $merchant_data .= '&Redirect_Url=http://localhost/chennis/pages/test';
        $merchant_data .= '&billing_cust_name=Arulldass';
        $merchant_data .= '&billing_cust_address=rajapalayam';
        $merchant_data .= '&billing_cust_country=india';
        $merchant_data .= '&billing_cust_state=Tamilnadu';
        $merchant_data .= '&billing_cust_city=Rajapalayam';
        $merchant_data .= '&billing_zip_code=626117';
        $merchant_data .= '&billing_cust_tel=9597028953';
        $merchant_data .= '&billing_cust_email=aruldass@gmail.com';
        $merchant_data .= '&delivery_cust_name=Arulldass';
        $merchant_data .= '&delivery_cust_address=rajapalayam';
        $merchant_data .= '&delivery_cust_country=india';
        $merchant_data .= '&delivery_cust_state=Tamilnadu';
        $merchant_data .= '&delivery_cust_city=Rajapalayam';
        $merchant_data .= '&delivery_zip_code=626117';
        $merchant_data .= '&delivery_cust_tel=9597028953';
        $merchant_data .= '&billing_cust_notes=test notes';
        $merchant_data .= '&Checksum='.$checksum  ;

        return $merchant_data;
    }

    public function getEncryptedData() {
        // $utils = new Utils( $this );
        // $utils = $this;
        $merchant_data = $this->getMerchantData( $this->getChecksum() );
        return $this->encrypt($merchant_data,$this->getWorkingKey());
    }

    public function response( $response ) {
        // $utils = new Utils( $this );
        // $utils = $this;
        $resonse_data = $this->decrypt( $response, $this->getWorkingKey() );
        $payment_data=explode('&', $resonse_data);
        $data_size=sizeof($payment_data);

        $auth_desc = null;
        $checksum = null;

        for($i = 0; $i < $data_size; $i++) 
        {
            $information = explode('=',$payment_data[$i]);
            if( $i==0 ) 
                $this->setMerchantId( $information[1] );    
            if($i==1)   
                $this->setOrderId( $information[1] );
            if($i==2)   
                $this->setAmount( $information[1] );    
            if($i==3)   
                $auth_desc = $information[1];
            if($i==4)   
                $checksum = $information[1];    
        }

        $payment_data_string = $this->getMerchantId().'|'.$this->getOrderId().'|'.$this->getAmount().'|'.$auth_desc.'|'.$this->getWorkingKey();
        $verify_checksum = $this->verifyChecksum( $this->genchecksum( $payment_data_string ), $checksum );


        if($verify_checksum==TRUE && $auth_desc==="Y")
        {
            return "success";
        }
        else if($verify_checksum==TRUE && $auth_desc==="B")
        {
            return "pending";
        }
        else if($verify_checksum==TRUE && $auth_desc==="N")
        {
            return "declined";
        }
        else
        {
            return "error";
        }

    }






    public function getChecksum()
    {
        $str = $this->getMerchantId();
        $str .= "|". $this->getOrderId();
        $str .= "|". $this->getAmount();
        $str .= "|". $this->getRedirectUrl();
        $str .= "|". $this->getWorkingKey();
        $adler = 1;
        $adler = $this->adler32($adler,$str);
        return $adler;
    }

    public function genChecksum($str)
    {
        $adler = 1;
        $adler = $this->adler32($adler,$str);
        return $adler;
    }

    public function verifyChecksum($getCheck, $avnChecksum)
    {
        $verify=false;
        if($getCheck==$avnChecksum) $verify=true;
        return $verify;
    }

    public function adler32($adler , $str)
    {
        $BASE =  65521 ;
        $s1 = $adler & 0xffff ;
        $s2 = ($adler >> 16) & 0xffff;
        for($i = 0 ; $i < strlen($str) ; $i++)
        {
            $s1 = ($s1 + Ord($str[$i])) % $BASE ;
            $s2 = ($s2 + $s1) % $BASE ;
        }
        return $this->leftshift($s2 , 16) + $s1;
    }

    public function leftshift($str , $num)
    {

        $str = DecBin($str);

        for( $i = 0 ; $i < (64 - strlen($str)) ; $i++)
            $str = "0".$str ;

        for($i = 0 ; $i < $num ; $i++)
        {
            $str = $str."0";
            $str = substr($str , 1 ) ;
            //echo "str : $str <BR>";
        }
        return $this->cdec($str) ;
    }

    public function cdec($num)
    {
        $dec=0;
        for ($n = 0 ; $n < strlen($num) ; $n++)
        {
           $temp = $num[$n] ;
           $dec =  $dec + $temp*pow(2 , strlen($num) - $n - 1);
        }

        return $dec;
    }

    public function encrypt($plainText,$key)
{
    $secretKey = $this->hextobin(md5($key));
    $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
    $encryptedText = openssl_encrypt($plainText, "AES-128-CBC", $secretKey, OPENSSL_RAW_DATA, $initVector);
    $encryptedText = bin2hex($encryptedText);
    return $encryptedText;
}

public function decrypt($encryptedText,$key)
{
    $secretKey         = $this->hextobin(md5($key));
    $initVector         =  pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
    $encryptedText      = $this->hextobin($encryptedText);
    $decryptedText         =  openssl_decrypt($encryptedText,"AES-128-CBC", $secretKey, OPENSSL_RAW_DATA, $initVector);
    return $decryptedText;
}
    //*********** Padding Function *********************

     public function pkcs5_pad ($plainText, $blockSize)
    {
        $pad = $blockSize - (strlen($plainText) % $blockSize);
        return $plainText . str_repeat(chr($pad), $pad);
    }

    //********** Hexadecimal to Binary function for php 4.0 version ********

    public function hextobin($hexString) 
     { 
            $length = strlen($hexString); 
            $binString="";   
            $count=0; 
            while($count<$length) 
            {       
                $subString =substr($hexString,$count,2);           
                $packedString = pack("H*",$subString); 
                if ($count==0)
            {
                $binString=$packedString;
            } 
                
            else 
            {
                $binString.=$packedString;
            } 
                
            $count+=2; 
            } 
            return $binString; 
          } 
}