<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        // load model
        $this->load->model('Login_model', '', TRUE);
        $this->load->model('Person_model');
        $this->load->model('Permission_model');
    }

    // all - view login (page)
    function index() {
        // load page
        $this->load->view('login/login');
    }

    // check login (local)
    function check() {
        //This method will have the credentials validation
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/login');
        } else {
            redirect('Competition/viewCompetitions');
        }
    }

    // all - check login in database (db)
    function check_database() {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        //$result = $this->Login_model->login($username, $password);

        $login = $this->Login_model->get($username);

        if ($this->bcrypt->check_password($this->input->post('password'), $login->Password)) {
            $sess_array = array(
                'Username' => $login->Username,
                'Permission' => $login->Permission
            );
            $this->session->set_userdata('logged_in', $sess_array);
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', $this->lang->line("wrong_username_or_password"));
            return false;
        }

//        if ($result) {
//            $sess_array = array();
//            foreach ($result as $row) {
//                $sess_array = array(
//                    'Username' => $row->Username,
//                    'Permission' => $row->Permission
//                );
//                $this->session->set_userdata('logged_in', $sess_array);
//            }
//            return TRUE;
//        } else {
//            $this->form_validation->set_message('check_database', $this->lang->line("wrong_username_or_password"));
//            return false;
//        }
    }

    // all - view change password (page)
    function viewChangePassword() {
        if ($this->session->userdata('logged_in') && ($this->session->userdata('logged_in')['Permission'] == "Admin" || $this->session->userdata('logged_in')['Permission'] == "Pilot")) {
            $data['current'] = $data['title'] = $data['active'] = $this->lang->line("change_password");

            $partials = array('content' => 'login/change_password');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('Login');
        }
    }

    // all - change password (db)
    function changePassword() {
        if ($this->session->userdata('logged_in') && ($this->session->userdata('logged_in')['Permission'] == "Admin" || $this->session->userdata('logged_in')['Permission'] == "Pilot")) {
            $this->form_validation->set_rules('current_password', 'lang:current_password', 'trim|required|callback_checkPasswordMatch');
            $this->form_validation->set_rules('new_password', 'lang:new_password', 'trim|required|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', 'lang:password_confirm', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->viewChangePassword();
            } else {
                $login = new stdClass();
                $login->Username = $this->session->userdata('logged_in')['Username'];
                $login->Password = $this->bcrypt->hash_password($this->input->post('new_password'));
                $login->Permission = $this->session->userdata('logged_in')['Permission'];

                $this->Login_model->update($login);

                redirect('Competition/viewCompetitions');
            }
        } else {
            redirect('Login');
        }
    }

    // check password match (local)
    function checkPasswordMatch() {
        $login = $this->Login_model->get($this->session->userdata('logged_in')['Username']);

        if ($this->bcrypt->check_password($this->input->post('current_password'), $login->Password)) {
            return true;
        } else {
            $this->form_validation->set_message('checkPasswordMatch', $this->lang->line("current_password_doesnt_match"));
            return false;
        }
    }

    // admin - view logins (page)
    function viewLogins() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Admin") {
            $data['active'] = 'Logins';
            $data['current'] = $data['title'] = $this->lang->line("logins");

            $logins = $this->Login_model->getAll();

            foreach ($logins as $login) {
                if ($this->Person_model->getPersonWithLoginExists($login->Username)) {
                    $login->PersonExists = true;
                }
            }

            $data['logins'] = $logins;

            $partials = array('content' => 'login/admin/logins');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // admin - view create login (page)
    function viewCreateLogin($pilot) {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Admin") {
            $data['active'] = 'Logins';
            $data['current'] = $data['title'] = $this->lang->line("new_login");

            $data['permissions'] = $this->Permission_model->getAll();

            $data['pilot'] = $pilot;

            $data['js'][] = "<script type='text/javascript'>
            $('#permission').on('change',function(){
                if( $(this).val()==='Pilot'){
                    $('#personal_details').show()
                } else{
                    $('#personal_details').hide()
                }});
            </script>";

            $partials = array('content' => 'login/admin/create_login');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // admin - create login (db)
    function createLogin() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Admin") {
            $pilot = 0;

            $this->form_validation->set_rules('username', 'lang:username', 'required|is_unique[login.Username]');
            $this->form_validation->set_rules('password', 'lang:password', 'required|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', 'lang:password_confirm', 'required');

            if ($this->input->post('permission') == 'Pilot') {
                $this->form_validation->set_rules('first_name', 'lang:first_name', 'required');
                $this->form_validation->set_rules('last_name', 'lang:last_name', 'required');
                $this->form_validation->set_rules('email_address', 'lang:email_address', 'required|valid_email');

                $pilot = 1;
            }

            if ($this->form_validation->run() == FALSE) {
                $this->viewCreateLogin($pilot);
            } else {
                $login = new stdClass();
                $login->Username = $this->input->post('username');
                $login->Password = $this->bcrypt->hash_password($this->input->post('password'));
                $login->Permission = $this->input->post('permission');

                $this->Login_model->insert($login);

                if ($this->input->post('permission') == 'Pilot') {
                    $person = new stdClass();
                    $person->Username = $this->input->post('username');
                    $person->FirstName = $this->input->post('first_name');
                    $person->LastName = $this->input->post('last_name');
                    $person->EmailAddress = $this->input->post('email_address');

                    $this->Person_model->insert($person);
                }

                $this->viewLogins();
            }
        } else {
            redirect('login');
        }
    }

    // all - log out (local)
    function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('');
    }

}
