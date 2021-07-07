<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use Cake\Event\Event;

class AvenueComponent extends Component
{
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

	// *********** Padding Function *********************
	public function pkcs5_pad($plainText, $blockSize)
	{
	    $pad = $blockSize - (strlen($plainText) % $blockSize);
	    return $plainText . str_repeat(chr($pad), $pad);
	}

	// ********** Hexadecimal to Binary function for php 4.0 version ********
	public function hextobin($hexString)
	{
	    $length = strlen($hexString);
	    $binString = "";
	    $count = 0;
	    while ($count < $length) {
	        $subString = substr($hexString, $count, 2);
	        $packedString = pack("H*", $subString);
	        if ($count == 0) {
	            $binString = $packedString;
	        } 
	        else {
	            $binString .= $packedString;
	        }
	        
	        $count += 2;
	    }
	    return $binString;
	}
}

?>