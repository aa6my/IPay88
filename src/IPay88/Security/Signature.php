<?php

namespace IPay88\Security;

class Signature
{
	/**
     * Generate signature to be used for transaction.
     *
     * You may verify your signature with online tool provided by iPay88
     * https://payment.ipay88.com.my/epayment/testing/testsignature_256.asp
     *
     * @access public
     * 
     * accept arbitary amount of params
     * @example IPay88\Security\Signature::generateSignature($key,$code,$refNo,$amount,$currency,[, $status])
     */
    public static function generateSignature()
    {
        $args = func_get_args();
        $merchantKey = $args[0]; // Get merchantKey
        $stringToHash = implode('', $args); // Concatenate arguments

        return hash_hmac('sha512', $stringToHash, $merchantKey);
    }

    /**
     *
     * 2025 - removed this method, new security standard is using HMACSHA256
     * equivalent of php 5.4 hex2bin
     *
     * @access private
     * @param string $source The string to be converted
     */
    /*private static function _hex2bin($source)
    {
    	$bin = null;
    	for ($i=0; $i < strlen($source); $i=$i+2) {
    		$bin .= chr(hexdec(substr($source, $i, 2)));
    	}
    	return $bin;
    }*/
}
