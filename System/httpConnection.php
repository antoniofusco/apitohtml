<?php

class HttpConnection
{
    
    private $url="";
    private $username="";
    private $Password="";
    
     function __construct($url, $username,$Password)
	{
            $this->url=$url;
            $this->username=$username;
            $this->password=$Password;
	}
    
    function extract()
	{
            
		$result = false;
		if ((extension_loaded('curl') === true))
		{
                    if(is_resource($curl = curl_init()) === true){
                    
                      
                            curl_setopt($curl, CURLOPT_URL,$this->url);
                            curl_setopt($curl, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
                            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

                            curl_setopt($curl, CURLOPT_USERPWD, "$this->username:$this->password");
                            $result=curl_exec ($curl);
                            $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);   //get status code
                            curl_close ($curl);
                            if($status_code==200){

                                return $result;    
                            }   
                        
                                  
                    }  
		} 
		return $result;
	}
    
}