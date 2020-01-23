<?php
class Blacklist extends Controller{   
    public function index(){
        $data=[
            'metatitle'=>'Access forbidden'
        ];
        $this->view('pages/404', $data);        
    }
}