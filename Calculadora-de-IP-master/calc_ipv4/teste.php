<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 11/07/18
 * Time: 14:01
 */

$regexp = '/^[0-9]{1,3}\.[0-9]{1,3}/';
$end    = "123.234";


//echo preg_match( $regexp, $end);

//192.2.0.1/24
//.[0-9]{1,3}\.[0-9]{1,3}\/[0-9]{1,2}$/

$ip = gethostbyname('www.example.com');
$out = "The following URLs are equivalent:\n";
$out .= 'http://www.example.com/, http://' . $ip . '/, and http://' . sprintf("%u", ip2long($ip)) . "\n";
echo $out;