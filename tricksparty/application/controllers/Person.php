<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends CI_Controller {

    function __construct() {
        parent::__construct();
        // load model
        $this->load->model('Person_model');
    }

    // admin - view personal details (page)
    public function viewPersonalDetails($username) {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Admin") {
            $data['active'] = 'Logins';
            $data['current'] = $data['title'] = $this->lang->line("personal_details");

            $data['person'] = $this->Person_model->get($username);

            $partials = array('content' => 'personal_details/admin/personal_details');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // pilot - view personail details (page)
    public function viewPersonalDetailsAsPilot() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Pilot") {
            $data['active'] = '';
            $data['current'] = $data['title'] = $this->lang->line("personal_details");

            $data['person'] = $this->Person_model->get($this->session->userdata('logged_in')['Username']);

            $partials = array('content' => 'personal_details/pilot/personal_details');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // pilot - view create edit personal details (page)
    public function viewCreateEditPersonalDetailsAsPilot() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Pilot") {
            $data['active'] = '';

            if ($this->Person_model->getPersonWithLoginExists($this->session->userdata('logged_in')['Username'])) {
                $data['current'] = $data['title'] = $this->lang->line("edit_personal_details");
                $data['person'] = $this->Person_model->get($this->session->userdata('logged_in')['Username']);
            } else {
                $data['current'] = $data['title'] = $this->lang->line("new_personal_details");

                $person = new stdClass();
                $person->Username = $this->session->userdata('logged_in')['Username'];
                $person->FirstName = '';
                $person->LastName = '';
                $person->EmailAddress = '';

                $data['person'] = $person;
            }

            $partials = array('content' => 'personal_details/pilot/create_edit_personal_details');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // pilot - create edit personal details (db)
    public function createEditPersonalDetailsAsPilot() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Pilot") {
            $this->form_validation->set_rules('email_address', 'lang:email_address', 'required|valid_email');

            if ($this->form_validation->run() == FALSE) {
                $this->viewCreateEditPersonalDetailsAsPilot();
            } else {
                $person = new stdClass();
                $person->Username = $this->input->post('username');
                $person->FirstName = $this->input->post('first_name');
                $person->LastName = $this->input->post('last_name');
                $person->EmailAddress = $this->input->post('email_address');

                if ($this->Person_model->getPersonWithLoginExists($this->input->post('username'))) {
                    $this->Person_model->update($person);
                } else {
                    $this->Person_model->insert($person);
                }

                $this->viewPersonalDetailsAsPilot();
            }
        } else {
            redirect('Login');
        }
    }

    // admin - view create edit personal details (page)
    public function viewCreateEditPersonalDetails($username) {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Admin") {
            $data['active'] = 'Logins';

            if ($this->Person_model->getPersonWithLoginExists($username)) {
                $data['current'] = $data['title'] = $this->lang->line("edit_personal_details");
                $data['person'] = $this->Person_model->get($username);
            } else {
                $data['current'] = $data['title'] = $this->lang->line("new_personal_details");

                $person = new stdClass();
                $person->Username = $username;
                $person->FirstName = '';
                $person->LastName = '';
                $person->EmailAddress = '';

                $data['person'] = $person;
            }

            $partials = array('content' => 'personal_details/admin/create_edit_personal_details');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // admin - create edit personal details (db)
    public function createEditPersonalDetails() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Admin") {
            $this->form_validation->set_rules('first_name', 'lang:first_name', 'required');
            $this->form_validation->set_rules('last_name', 'lang:last_name', 'required');
            $this->form_validation->set_rules('email_address', 'lang:email_address', 'required|valid_email');

            if ($this->form_validation->run() == FALSE) {
                $this->viewCreateEditPersonalDetails($this->input->post('username'));
            } else {
                $person = new stdClass();
                $person->Username = $this->input->post('username');
                $person->FirstName = $this->input->post('first_name');
                $person->LastName = $this->input->post('last_name');
                $person->EmailAddress = $this->input->post('email_address');

                if ($this->Person_model->getPersonWithLoginExists($this->input->post('username'))) {
                    $this->Person_model->update($person);
                } else {
                    $this->Person_model->insert($person);
                }

                $this->viewPersonalDetails($this->input->post('username'));
            }
        } else {
            redirect('Login');
        }
    }

}
