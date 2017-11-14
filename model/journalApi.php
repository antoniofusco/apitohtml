<?php
/**
* This class is a connection class from controller to model
 * The method of this class retrieve the data from the api
*
* @author     Antonio Fusco
* @version    1
 * 
* ...
*/
class ModelJournalApi extends Model{
    
   /**
    * This method retrieve all data without tag
    * @return json object
    */
   function retrieveAllRiver(){
       $data = $this->db->retrieveAllRiver();
       return $data;
   }
   
   /**
    * 
    * This method retrieve all data based on passed tag
    * @param String $tag
    * @return json object
    */
   
    function retrievePartialRiver($tag){
        
       $data = $this->db->retrieveAllRiver($tag);
       return $data;
   }
    
    
}
