<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        // load model
        //$this->load->model('login_model', '', TRUE);
    }

    // index (page)
    function index() {
        // populate data
        $data['active'] = $data['current'] = $data['title'] = $this->lang->line("home");

        // load page
        $partials = array('content' => 'home');
        $this->template->load('general/main', $partials, $data);
    }

}
