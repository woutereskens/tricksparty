<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Trick extends CI_Controller {

    function __construct() {
        parent::__construct();
        // load model
        $this->load->model('Trick_model');
        $this->load->model('Competition_model');
        $this->load->model('Score_type_model');
        $this->load->model('Imposed_trick_model');
        $this->load->model('Person_model');
        $this->load->model('Score_model');
    }

    // all - view tricks (page)
    public function viewTricks() {
        if ($this->session->userdata('logged_in')) {
            $data['active'] = "Tricks";
            $data['current'] = $data['title'] = $this->lang->line("tricks");

            $data['tricks'] = $this->Trick_model->getAll();

            $partials = array('content' => 'trick/tricks');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // field director - view select imposed tricks (page)
    public function viewSelectImposedTricks($competitionID) {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Field director") {
            $competition = $this->Competition_model->get($competitionID);

            $data['active'] = 'Competitions';
            $data['current'] = $data['title'] = $this->lang->line("select_imposed_tricks");
            $trickgroups = $this->Trick_model->getAllTrickGroups();
            foreach ($trickgroups as $trickgroup) {
                $trickgroup->Tricks = $this->Trick_model->getAllByTrickGroup($trickgroup->TrickGroup);
            }
            $data['trickgroups'] = $trickgroups;
            $data['imposed_trick_types'] = $this->Score_type_model->getAllImposedTrickTypesWithoutAttempts();
            $data['competition'] = $competition;

            $data['js'][] = "<script type='text/javascript'>
            $(document).ready(function() {
              $('.js-example-basic-single').select2();
            });
            </script>";

            $partials = array('content' => 'imposed_trick/field_director/select_imposed_tricks');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // field director - select imposed tricks (db)
    public function selectImposedTricks() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Field director") {
            $this->form_validation->set_rules('BT1', 'BT1', 'callback_check_duplicate_tricks');
            $this->form_validation->set_message('check_duplicate_tricks', $this->lang->line("imposed_tricks_duplicate_tricks"));

            if ($this->form_validation->run() == FALSE) {
                $this->viewSelectImposedTricks($this->input->post('competitionID'));
            } else {
                $imposed_trick_types = $this->Score_type_model->getAllImposedTrickTypes();

                foreach ($imposed_trick_types as $imposed_trick_type) {
                    $imposed_trick = new stdClass();
                    $imposed_trick->CompetitionID = $this->input->post('competitionID');
                    $imposed_trick->ScoreType = $imposed_trick_type->ScoreType;
                    $imposed_trick->Trick = $this->input->post(substr($imposed_trick_type->ScoreType, 0, 3));

                    $this->Imposed_trick_model->insert($imposed_trick);
                }

                redirect('Competition/viewParticipants/' . $this->input->post('competitionID'));
            }
        } else {
            redirect('login');
        }
    }

    // check duplicate tricks (local)
    function check_duplicate_tricks() {
        $it = array();
        $imposed_trick_types = $this->Score_type_model->getAllImposedTrickTypesWithoutAttempts();

        foreach ($imposed_trick_types as $imposed_trick_type) {
            array_push($it, $this->input->post(substr($imposed_trick_type->ScoreType, 0, 3)));
        }

        $it_value_count = array_count_values($it);

        foreach ($it_value_count as $key => $value) {
            if ($value > 1) {
                return false;
            }
        }

        return true;
    }

    // judge - view give scores for imposed tricks (page)
    public function viewGiveScores($pilotUsername, $competitionID, $imposed_tricks = null) {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Judge") {
            $competition = $this->Competition_model->get($competitionID);
            $person = $this->Person_model->get($pilotUsername);

            if (!isset($imposed_tricks)) {
                $imposed_tricks = $this->Imposed_trick_model->getByCompetition($competitionID);

                foreach ($imposed_tricks as $imposed_trick) {
                    $imposed_trick->A1Active = -1;
                    $imposed_trick->A2Active = -1;
                }
            }

            // populate data
            $data['active'] = 'Competitions';
            $data['current'] = $data['title'] = $this->lang->line("imposed_tricks");
            $data['competition'] = $competition;
            $data['person'] = $person;
            $data['imposed_tricks'] = $imposed_tricks;

            $partials = array('content' => 'imposed_trick/judge/give_scores');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // judge - give scores for imposed tricks (db)
    public function giveScores() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Judge") {
            $imposed_tricks = $this->Imposed_trick_model->getByCompetition($this->input->post("competitionID"));

            for ($i = 0; $i < count($imposed_tricks); $i++) {
                $this->form_validation->set_rules($imposed_tricks[$i]->ScoreType, $this->lang->line("trick") . ' ' . ($i + 1) . ': ' . $imposed_tricks[$i]->Trick . ' (' . $this->lang->line("attempt") . ' 1)', 'required');
                $this->form_validation->set_rules(substr($imposed_tricks[$i]->ScoreType, 0, 3) . 'A2', $this->lang->line("trick") . ' ' . ($i + 1) . ': ' . $imposed_tricks[$i]->Trick . ' (' . $this->lang->line("attempt") . ' 2)', 'required');
            }

            if ($this->form_validation->run() == FALSE) {
                foreach ($imposed_tricks as $imposed_trick) {
                    if (isset($_POST[$imposed_trick->ScoreType])) {
                        for ($i = 0; $i <= 10; $i++) {
                            if ((int) $this->input->post($imposed_trick->ScoreType) === $i) {
                                $imposed_trick->A1Active = $i;
                            }
                        }
                    } else {
                        $imposed_trick->A1Active = -1;
                    }

                    if (isset($_POST[substr($imposed_trick->ScoreType, 0, 3) . 'A2'])) {
                        for ($i = 0; $i <= 10; $i++) {
                            if ((int)$this->input->post(substr($imposed_trick->ScoreType, 0, 3) . 'A2') === $i) {
                                $imposed_trick->A2Active = $i;
                            }
                        }
                    } else {
                        $imposed_trick->A2Active = -1;
                    }
                }

                $this->viewGiveScores($this->input->post('pilot_username'), $this->input->post('competitionID'), $imposed_tricks);
            } else {
                foreach ($imposed_tricks as $imposed_trick) {
                    // attempt 1
                    $score = new stdClass();
                    $score->CompetitionID = $this->input->post("competitionID");
                    $score->JudgeUsername = $this->session->userdata('logged_in')['Username'];
                    $score->PilotUsername = $this->input->post("pilot_username");
                    $score->ScoreType = $imposed_trick->ScoreType;
                    $score->ResultType = $this->input->post($imposed_trick->ScoreType);

                    $this->Score_model->insert($score);

                    // attempt 2
                    $score = new stdClass();
                    $score->CompetitionID = $this->input->post("competitionID");
                    $score->JudgeUsername = $this->session->userdata('logged_in')['Username'];
                    $score->PilotUsername = $this->input->post("pilot_username");
                    $score->ScoreType = substr($imposed_trick->ScoreType, 0, 3) . 'A2';
                    $score->ResultType = $this->input->post(substr($imposed_trick->ScoreType, 0, 3) . 'A2');

                    $this->Score_model->insert($score);
                }

                redirect('Competition/viewParticipants/' . $this->input->post("competitionID"));
            }
        } else {
            redirect('login');
        }
    }

}
