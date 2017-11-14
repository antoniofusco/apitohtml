<?php
/**
* This class is the controller class of the application
 * In this class we have two method 
*  index method controll the index page of my application
 * partialRiver method controll the internal page of my application where user pass the name of the tag
* @author     Antonio Fusco
* @version    1
 */

class ControllerHome extends Controller{
    
    public function index(){
        
        $data= array();	
        $data["title"] = "Home Page";
        // Load the model of the application
        $this->load->model('journalApi');
        
        // Extract all the river
        $river= $this->model_journalApi->retrieveAllRiver();
        
        if($river){
            $data["river"] = $river;
        }else{
            $data["warning"] = "No data to show";
        }
        // Render the page
        $this->response->setOutput($this->load->view('defaultTheme/home.tpl', $data));

    }
    
    public function partialRiver(){
        if($this->request->get['__pagina__']){
            
             $data= array();	
            $data["title"] = "Tag-".$this->request->get['__pagina__'];
            // Load the model of the application
            $this->load->model('journalApi');

            // Extract all the river
            $river= $this->model_journalApi->retrievePartialRiver($this->request->get['__pagina__']);

            if($river){
                $data["river"] = $river;
            }else{
                $data["warning"] = "No data to show";
            }
            // Render the page
            $this->response->setOutput($this->load->view('defaultTheme/home.tpl', $data));
        }
    }
    
}