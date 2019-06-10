<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->load->view('bendahara/body/dasboard'); 
    }
}

?>