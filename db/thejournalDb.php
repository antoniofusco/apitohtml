<?php

/**
* This class is an abstraction of json river from the journal
* If you have another kind of river you can only change this class
* This class convert the json object as an array of data
* @author     Antonio Fusco
* @version    1
 * 
* ...
*/

class thejournalDb {
    
  
    /**
    * This method retrieve all data without tag
    * 
    * @return array of data
    */
    public function retrieveAllRiver($tag=null){
       // If I pass a tag to method I use the different address to enter in the api
       if($tag){
           
           $dataAPI = new HttpConnection((string)API_PARTIAL_URL.$tag,API_USR,API_PWD);
       }else{
           $dataAPI = new HttpConnection((string)API_COMPLETE_URL,API_USR,API_PWD);
       }
        // Extract the data from the api
        $dati = $dataAPI->extract();
        // Convert the data to a json object
        $jsonArray = json_decode($dati);
       
        $arrayData = array();
        
        if(isset($jsonArray->response->articles)){
            foreach($jsonArray->response->articles as $articles){
                
                
                
                if($articles->type=="post"){
                    
                    /*
                     * In this array if you use the key image with src,width,height the templete will render an html image
                     */
                    
                    $arrayData[]= array(
                        "title"     =>  $articles->title,
                        "excerpt"   =>  $articles->excerpt,
                        "image"     =>  array(
                            "src" =>$articles->images->thumbnail->image,
                            "width"     =>  $articles->images->thumbnail->width,
                            "height"    =>  $articles->images->thumbnail->height
                            )
                    );
                }
               
            }
        }
        return $arrayData;
   }
    
    
}