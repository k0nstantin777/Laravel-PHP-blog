<?php

/**
 * Определение IP пользователя
 * @return string
 */
function getIp()
{
    if ( getenv('REMOTE_ADDR') && strcasecmp( getenv('REMOTE_ADDR'), 'unknown') )
        return getenv("REMOTE_ADDR");
    elseif ( !empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown'))
        return $_SERVER['REMOTE_ADDR'];
    else
        return "unknown";
}



/**
 * Определние города по IP
 * @param string $ip
 * @return string
 */
function detectCity($ip) {
        
        $default = 'UNKNOWN';
 
        if (!is_string($ip) || strlen($ip) < 1 || $ip == '127.0.0.1' || $ip == 'localhost')
            $ip = '8.8.8.8';
 
        $curlopt_useragent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6 (.NET CLR 3.5.30729)';
        
        $url = 'http://ipinfodb.com/ip_locator.php?ip=' . urlencode($ip);
        $ch = curl_init();
        
        $curl_opt = array(
            CURLOPT_FOLLOWLOCATION  => 1,
            CURLOPT_HEADER      => 0,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_USERAGENT   => $curlopt_useragent,
            CURLOPT_URL       => $url,
            CURLOPT_TIMEOUT         => 1,
            CURLOPT_REFERER         => 'http://' . $_SERVER['HTTP_HOST'],
        );
        
        curl_setopt_array($ch, $curl_opt);
        
        $content = curl_exec($ch);
        
        if (!is_null($curl_info)) {
            $curl_info = curl_getinfo($ch);
        }
        
        curl_close($ch);
        
        if ( preg_match('{<li>City : ([^<]*)</li>}i', $content, $regs) )  {
            $city = $regs[1];
        }
        if ( preg_match('{<li>State/Province : ([^<]*)</li>}i', $content, $regs) )  {
            $state = $regs[1];
        }
 
        if( $city!='' && $state!='' ){
          $location = $city . ', ' . $state;
          return $location;
        }else{
          return $default; 
        }
        
    }

