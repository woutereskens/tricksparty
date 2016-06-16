<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Competition extends CI_Controller {

    function __construct() {
        parent::__construct();
        // load model
        $this->load->model('Competition_model');
        $this->load->model('Balletlist_model');
        $this->load->model('Person_model');
        $this->load->model('Selected_balletlist_model');
        $this->load->model('Imposed_trick_model');
        $this->load->model('Score_model');
        $this->load->model('Ranking_model');
    }

    // all - view competitions (page)
    public function viewCompetitions() {
        if ($this->session->userdata('logged_in')) {
            $data['active'] = 'Competitions';
            $data['current'] = $data['title'] = $this->lang->line("competitions");

            $competitions = $this->Competition_model->getAll();

            if ($this->session->userdata('logged_in')['Permission'] == "Pilot") {
                foreach ($competitions as $competition) {
                    $competition->BalletlistExists = $this->Balletlist_model->getBalletlistWithCompetitionExists($this->session->userdata('logged_in')['Username'], $competition->ID);

                    $competition->SelectedBalletlistExists = $this->Selected_balletlist_model->getSelectedBalletlistExists($this->session->userdata('logged_in')['Username'], $competition->ID);
                }
            }

            $data['upcoming_competitions'] = $competitions;

            $past_competitions = $this->Ranking_model->getAllDistinct();

            $data['past_competitions'] = $past_competitions;

            $partials = array('content' => 'competition/competitions');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // admin - view create edit competition (page)
    public function viewCreateEditCompetition($competitionID) {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Admin") {
            $data['active'] = 'Competitions';

            if ($competitionID != 0) {
                $data['current'] = $data['title'] = $this->lang->line("edit_competition");
                $data['competition'] = $this->Competition_model->get($competitionID);
            } else {
                $data['current'] = $data['title'] = $this->lang->line("new_competition");

                $competition = new stdClass();
                $competition->ID = 0;
                $competition->Location = '';
                $competition->Date = '';
                $competition->NumberOfJudges = 0;
                $data['competition'] = $competition;
            }

            $data['js'][] = "<script type='text/javascript'>
            $(function () {
                $('.datepicker').datepicker();
            </script>";

            $partials = array('content' => 'competition/create_edit_competition');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // admin - create edit competition (db)
    public function createEditCompetition() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Admin") {
            $this->form_validation->set_rules('location', 'lang:location', 'required');
            $this->form_validation->set_rules('date', 'lang:date', 'required|callback_valid_date');
            $this->form_validation->set_rules('location_date', 'location_date', 'callback_location_date');
            $this->form_validation->set_message('location_date', $this->lang->line("combination_of_date_and_location_already_exists"));
            $this->form_validation->set_rules('number_of_judges', 'lang:number_of_judges', 'greater_than[0]');

            if ($this->form_validation->run() == FALSE) {
                $this->viewCreateEditCompetition($this->input->post('competitionID'));
            } else {
                $competition = new stdClass();
                $competition->ID = $this->input->post('ID');
                $competition->Location = $this->input->post('location');
                $competition->Date = toYYYYMMDD($this->input->post('date'));
                $competition->NumberOfJudges = $this->input->post('number_of_judges');

                if ($competition->ID == 0) {
                    $competition->ID = $this->Competition_model->insert($competition);
                } else {
                    $this->Competition_model->update($competition);
                }

                redirect('Competition/viewCompetitions');
            }
        } else {
            redirect('login');
        }
    }

    // admin - valid date (local)
    public function valid_date($date) {
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
            return true;
        } else {
            return false;
        }
    }

    // admin - valid date (local)
    public function location_date() {
        $location = $this->input->post('location');
        $date = $this->input->post('date');

        $competition = $this->Competition_model->get($this->input->post('ID'));

        if ($competition != null) {
            if ($this->Competition_model->getLocationAndDateExistsExceptID($location, $date, $competition->ID) || $this->Ranking_model->getLocationAndDateExists($location, $date)) {
                return false;
            } else {
                return true;
            }
        } else {
            if ($this->Competition_model->getLocationAndDateExists($location, $date) || $this->Ranking_model->getLocationAndDateExists($location, $date)) {
                return false;
            } else {
                return true;
            }
        }
    }

    // all - view participants (page)
    public function viewParticipants($competitionID) {
        if ($this->session->userdata('logged_in')) {
            $data['active'] = 'Competitions';
            $data['current'] = $data['title'] = $this->lang->line("participants");

            $competition = $this->Competition_model->get($competitionID);
            $competition->ImposedTricksExist = $this->Imposed_trick_model->getImposedTricksExistForCompetition($competitionID);
            if ($competition->ImposedTricksExist) {
                $data['imposed_tricks'] = $this->Imposed_trick_model->getByCompetition($competitionID);
            }
            $pilots = $this->Balletlist_model->getAllPilotsByCompetition($competitionID);

            foreach ($pilots as $pilot) {
                $pilot->Person = $this->Person_model->get($pilot->PilotUsername);
                $pilot->SelectedBalletlistExists = $this->Selected_balletlist_model->getSelectedBalletlistExists($pilot->Person->Username, $competitionID);
                if ($this->session->userdata('logged_in')['Permission'] == "Judge") {
                    $pilot->BalletlistScoreFromJudgeExists = $this->Score_model->getScoreFromJudgeExists($competitionID, $this->session->userdata('logged_in')['Username'], $pilot->Person->Username, 'BT1');
                    $pilot->ImposedTricksScoreFromJudgeExists = $this->Score_model->getScoreFromJudgeExists($competitionID, $this->session->userdata('logged_in')['Username'], $pilot->Person->Username, 'IT1A1');
                    $pilot->FreeExpressionScoreFromJudgeExists = $this->Score_model->getScoreFromJudgeExists($competitionID, $this->session->userdata('logged_in')['Username'], $pilot->Person->Username, 'Free expression');
                }
            }

            $competition->ScoreFromAllJudgesForAllParticipantsExist = true;

            foreach ($pilots as $pilot) {
                if (!$this->Score_model->getScoreFromAllJudgesExists($competitionID, $pilot->Person->Username, 'BT1', $competition->NumberOfJudges) ||
                        !$this->Score_model->getScoreFromAllJudgesExists($competitionID, $pilot->Person->Username, 'IT1A1', $competition->NumberOfJudges) ||
                        !$this->Score_model->getScoreFromAllJudgesExists($competitionID, $pilot->Person->Username, 'Free expression', $competition->NumberOfJudges)) {
                    $competition->ScoreFromAllJudgesForAllParticipantsExist = false;
                }
            }

            $data['competition'] = $competition;

            $data['pilots'] = $pilots;

            $partials = array('content' => 'competition/participants');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

}
