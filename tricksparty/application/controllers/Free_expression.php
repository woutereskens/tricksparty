<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Free_expression extends CI_Controller {

    function __construct() {
        parent::__construct();
        // load model
        $this->load->model('Score_type_model');
        $this->load->model('Competition_model');
        $this->load->model('Score_model');
        $this->load->model('Person_model');
    }

    // judge - view give scores for free expression (page)
    public function viewGiveScores($pilotUsername, $competitionID, $free_expression_active = null) {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Judge") {
            $competition = $this->Competition_model->get($competitionID);
            $person = $this->Person_model->get($pilotUsername);

            if (!isset($free_expression_active)) {
                $free_expression_active = -1;
            }

            // populate data
            $data['active'] = 'Competitions';
            $data['current'] = $data['title'] = $this->lang->line("free_expression");
            $data['competition'] = $competition;
            $data['person'] = $person;
            $data['free_expression'] = $this->Score_type_model->get('Free expression');
            $data['free_expression_active'] = $free_expression_active;

            $partials = array('content' => 'free_expression/judge/give_scores');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // judge - give scores for free expression (db)
    public function giveScores() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Judge") {
            $free_expression = $this->Score_type_model->get('Free expression');

            $this->form_validation->set_rules('free_expression', 'lang:free_expression', 'required');

            if ($this->form_validation->run() == FALSE) {
                if (isset($_POST['free_expression'])) {
                    for ($i = 0; $i <= 10; $i++) {
                        if((int)$this->input->post('free_expression') === $i){
                            $free_expression_active = $i;
                        }
                    }
                } else {
                    $free_expression_active = -1;
                }
                
                $this->viewGiveScores($this->input->post("pilot_username"), $this->input->post("competitionID"), $free_expression_active);
            } else {
                $score = new stdClass();
                $score->CompetitionID = $this->input->post("competitionID");
                $score->JudgeUsername = $this->session->userdata('logged_in')['Username'];
                $score->PilotUsername = $this->input->post("pilot_username");
                $score->ScoreType = $free_expression->ScoreType;
                $score->ResultType = $this->input->post('free_expression');

                $this->Score_model->insert($score);

                redirect('Competition/viewParticipants/' . $this->input->post("competitionID"));
            }
        } else {
            redirect('login');
        }
    }

}
