<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Balletlist extends CI_Controller {

    function __construct() {
        parent::__construct();
        // load model
        $this->load->model('Balletlist_model');
        $this->load->model('Trick_model');
        $this->load->model('Score_type_model');
        $this->load->model('Competition_model');
        $this->load->model('Person_model');
        $this->load->model('Selected_balletlist_model');
        $this->load->model('Score_model');
        $this->load->model('Result_type_model');
    }

    // pilot - view balletlist (page)
    public function viewBalletlist($competitionID) {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Pilot") {
            $competition = $this->Competition_model->get($competitionID);
            $data['active'] = 'Competitions';
            $data['current'] = $data['title'] = $this->lang->line("balletlist");

            $balletlistsA = $this->Balletlist_model->getAllByPilotUsernameCompetitionAndListEnum($this->session->userdata('logged_in')['Username'], $competitionID, 'A');
            foreach ($balletlistsA as $balletlistA) {
                $balletlistA->Trick = $this->Trick_model->get($balletlistA->Trick);
            }
            $balletlistsB = $this->Balletlist_model->getAllByPilotUsernameCompetitionAndListEnum($this->session->userdata('logged_in')['Username'], $competitionID, 'B');
            foreach ($balletlistsB as $balletlistB) {
                $balletlistB->Trick = $this->Trick_model->get($balletlistB->Trick);
            }
            $data['balletlistsA'] = $balletlistsA;
            $data['balletlistsB'] = $balletlistsB;
            $data['competition'] = $competition;

            $partials = array('content' => 'balletlist/pilot/balletlist');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // pilot - view create balletlist (page)
    public function viewCreateBalletlist($competitionID) {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Pilot") {
            $competition = $this->Competition_model->get($competitionID);

            $data['active'] = 'Competitions';
            $data['current'] = $data['title'] = $this->lang->line("new_balletlist");
            $trickgroups = $this->Trick_model->getAllTrickGroups();
            foreach ($trickgroups as $trickgroup) {
                $trickgroup->Tricks = $this->Trick_model->getAllByTrickGroup($trickgroup->TrickGroup);
            }
            $data['trickgroups'] = $trickgroups;
            //$data['tricks'] = $this->Trick_model->getAll();
            $data['scoretypes'] = $this->Score_type_model->getAllBalletTrickTypes();
            $data['competition'] = $competition;

            $data['js'][] = "<script type='text/javascript'>
            $(document).ready(function() {
              $('.js-example-basic-single').select2();
            });
            </script>";

            $partials = array('content' => 'balletlist/pilot/create_balletlist');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // pilot - view edit balletlist (page)
    public function viewEditBalletlist($competitionID) {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Pilot") {
            $competition = $this->Competition_model->get($competitionID);
            $data['active'] = 'Competitions';
            $data['current'] = $data['title'] = $this->lang->line("edit_balletlist");
            $trickgroups = $this->Trick_model->getAllTrickGroups();
            foreach ($trickgroups as $trickgroup) {
                $trickgroup->Tricks = $this->Trick_model->getAllByTrickGroup($trickgroup->TrickGroup);
            }
            $data['trickgroups'] = $trickgroups;
            $data['competition'] = $competition;

            $data['balletlistsA'] = $this->Balletlist_model->getAllByPilotUsernameCompetitionAndListEnum($this->session->userdata('logged_in')['Username'], $competitionID, 'A');
            $data['balletlistsB'] = $this->Balletlist_model->getAllByPilotUsernameCompetitionAndListEnum($this->session->userdata('logged_in')['Username'], $competitionID, 'B');

            $data['js'][] = "<script type='text/javascript'>
            $(document).ready(function() {
              $('.js-example-basic-single').select2();
            });
            </script>";

            $partials = array('content' => 'balletlist/pilot/edit_balletlist');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // plot - create balletlist (db)
    public function createBalletlist() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Pilot") {
            $this->form_validation->set_rules('BT1', 'BT1', 'callback_check_duplicate_tricks');
            $this->form_validation->set_message('check_duplicate_tricks', $this->lang->line("balletlist_duplicate_tricks"));

            if ($this->form_validation->run() == FALSE) {
                $this->viewCreateBalletlist($this->input->post('competitionID'));
            } else {
                $scoretypes = $this->Score_type_model->getAllBalletTrickTypes();

                // for list A
                foreach ($scoretypes as $scoretype) {
                    $balletlist = new stdClass();
                    $balletlist->PilotUsername = $this->session->userdata('logged_in')['Username'];
                    $balletlist->CompetitionID = $this->input->post('competitionID');
                    $balletlist->ScoreType = $scoretype->ScoreType;
                    $balletlist->Trick = $this->input->post('A' . $scoretype->ScoreType);
                    $balletlist->ListEnum = 'A';

                    $this->Balletlist_model->insert($balletlist);
                }

                // for list B
                foreach ($scoretypes as $scoretype) {
                    $balletlist = new stdClass();
                    $balletlist->PilotUsername = $this->session->userdata('logged_in')['Username'];
                    $balletlist->CompetitionID = $this->input->post('competitionID');
                    $balletlist->ScoreType = $scoretype->ScoreType;
                    $balletlist->Trick = $this->input->post('B' . $scoretype->ScoreType);
                    $balletlist->ListEnum = 'B';

                    $this->Balletlist_model->insert($balletlist);
                }

                redirect('Balletlist/viewBalletlist/' . $this->input->post('competitionID'));
            }
        } else {
            redirect('login');
        }
    }

    // pilot - check duplicate tricks (local)
    function check_duplicate_tricks() {
        $a = array();
        $b = array();
        $scoretypes = $this->Score_type_model->getAllBalletTrickTypes();

        foreach ($scoretypes as $scoretype) {
            array_push($a, $this->input->post('A' . $scoretype->ScoreType));
            array_push($b, $this->input->post('B' . $scoretype->ScoreType));
        }

        $a_value_count = array_count_values($a);
        $b_value_count = array_count_values($b);

        foreach ($a_value_count as $key => $value) {
            if ($value > 2) {
                return false;
            }
        }

        foreach ($b_value_count as $key => $value) {
            if ($value > 2) {
                return false;
            }
        }

        return true;
    }

    // pilot - edit balletlist (db)
    public function editBalletlist() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Pilot") {
            $this->form_validation->set_rules('BT1', 'BT1', 'callback_check_duplicate_tricks[]');
            $this->form_validation->set_message('check_duplicate_tricks', $this->lang->line("balletlist_duplicate_tricks"));

            if ($this->form_validation->run() == FALSE) {
                $this->viewEditBalletlist($this->input->post('competitionID'));
            } else {
                $scoretypes = $this->Score_type_model->getAllBalletTrickTypes();

                // for list A
                foreach ($scoretypes as $scoretype) {
                    $balletlist = new stdClass();
                    $balletlist->PilotUsername = $this->session->userdata('logged_in')['Username'];
                    $balletlist->CompetitionID = $this->input->post('competitionID');
                    $balletlist->ScoreType = $scoretype->ScoreType;
                    $balletlist->Trick = $this->input->post('A' . $scoretype->ScoreType);
                    $balletlist->ListEnum = 'A';

                    $this->Balletlist_model->update($balletlist);
                }

                // for list B
                foreach ($scoretypes as $scoretype) {
                    $balletlist = new stdClass();
                    $balletlist->PilotUsername = $this->session->userdata('logged_in')['Username'];
                    $balletlist->CompetitionID = $this->input->post('competitionID');
                    $balletlist->ScoreType = $scoretype->ScoreType;
                    $balletlist->Trick = $this->input->post('B' . $scoretype->ScoreType);
                    $balletlist->ListEnum = 'B';

                    $this->Balletlist_model->update($balletlist);
                }

                redirect('Balletlist/viewBalletlist/' . $this->input->post('competitionID'));
            }
        } else {
            redirect('login');
        }
    }

    // field director - view select balletlist (page)
    public function viewSelectBalletlist($pilotUsername, $competitionID) {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Field director") {
            $competition = $this->Competition_model->get($competitionID);
            $person = $this->Person_model->get($pilotUsername);

            $data['active'] = 'Competitions';
            $data['current'] = $data['title'] = $this->lang->line("select_balletlist");

            $balletlistsA = $this->Balletlist_model->getAllByPilotUsernameCompetitionAndListEnum($pilotUsername, $competitionID, 'A');
            foreach ($balletlistsA as $balletlistA) {
                $balletlistA->Trick = $this->Trick_model->get($balletlistA->Trick);
            }
            $balletlistsB = $this->Balletlist_model->getAllByPilotUsernameCompetitionAndListEnum($pilotUsername, $competitionID, 'B');
            foreach ($balletlistsB as $balletlistB) {
                $balletlistB->Trick = $this->Trick_model->get($balletlistB->Trick);
            }
            $data['balletlistsA'] = $balletlistsA;
            $data['balletlistsB'] = $balletlistsB;
            $data['competition'] = $competition;
            $data['person'] = $person;

            $partials = array('content' => 'balletlist/field_director/select_balletlist');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // field director - set selected balletlist (db)
    public function setSelectedBalletlist() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Field director") {
            $selected_balletlist = new stdClass();
            $selected_balletlist->PilotUsername = $this->input->post('pilot_username');
            $selected_balletlist->CompetitionID = $this->input->post('competitionID');
            $selected_balletlist->ListEnum = $this->input->post('balletlist');

            $this->Selected_balletlist_model->insert($selected_balletlist);

            $this->viewBalletlistAsFieldDirector($this->input->post('pilot_username'), $this->input->post('competitionID'));
        } else {
            redirect('login');
        }
    }

    // field director - view ballet list as field director (page)
    public function viewBalletlistAsFieldDirector($pilotUsername, $competitionID) {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Field director") {
            $competition = $this->Competition_model->get($competitionID);
            $person = $this->Person_model->get($pilotUsername);

            $selected_balletlist = $this->Selected_balletlist_model->getSelectedBalletlist($pilotUsername, $competitionID);
            $balletlists = $this->Balletlist_model->getAllByPilotUsernameCompetitionAndListEnum($pilotUsername, $competitionID, $selected_balletlist->ListEnum);

            // populate data
            $data['active'] = 'Competitions';
            $data['current'] = $data['title'] = $this->lang->line("ballet");
            $data['competition'] = $competition;
            $data['person'] = $person;
            $data['balletlists'] = $balletlists;

            $partials = array('content' => 'balletlist/field_director/balletlist');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // judge - view give scores for ballet (page)
    public function viewGiveScores($pilotUsername, $competitionID, $balletlists = null) {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Judge") {
            $competition = $this->Competition_model->get($competitionID);
            $person = $this->Person_model->get($pilotUsername);

            $bad = $this->Result_type_model->get('Bad');

            if (!isset($balletlists)) {
                $selected_balletlist = $this->Selected_balletlist_model->getSelectedBalletlist($pilotUsername, $competitionID);
                $balletlists = $this->Balletlist_model->getAllByPilotUsernameCompetitionAndListEnum($pilotUsername, $competitionID, $selected_balletlist->ListEnum);

                foreach ($balletlists as $balletlist) {
                    $balletlist->Active = "";
                }
            }

            $data['bad'] = $bad;
            $data['average'] = $this->Result_type_model->get('Average');
            $data['good'] = $this->Result_type_model->get('Good');
            $data['excellent'] = $this->Result_type_model->get('Excellent');
            $data['extra_score_types'] = $this->Score_type_model->getAllExtraBalletTypes();

            // populate data
            $data['active'] = 'Competitions';
            $data['current'] = $data['title'] = $this->lang->line("ballet");
            $data['competition'] = $competition;
            $data['person'] = $person;
            $data['balletlists'] = $balletlists;

            $partials = array('content' => 'balletlist/judge/give_scores');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // judge - give scores for ballet (db)
    public function giveScores() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Judge") {
            
            $selected_balletlist = $this->Selected_balletlist_model->getSelectedBalletlist($this->input->post("pilot_username"), $this->input->post("competitionID"));
            $balletlists = $this->Balletlist_model->getAllByPilotUsernameCompetitionAndListEnum($this->input->post("pilot_username"), $this->input->post("competitionID"), $selected_balletlist->ListEnum);
            
            for ($i = 0; $i < count($balletlists); $i++){
                $this->form_validation->set_rules($balletlists[$i]->ScoreType, $this->lang->line("trick") . ' ' . ($i+1) . ': ' . $balletlists[$i]->Trick, 'required');
            }
            
            $extra_ballet_types = $this->Score_type_model->getAllExtraBalletTypes();

            foreach ($extra_ballet_types as $extra_ballet_type) {
                $this->form_validation->set_rules(strtolower($extra_ballet_type->ScoreType), $extra_ballet_type->ScoreType, 'required');
            }

            if ($this->form_validation->run() == FALSE) {
                $bad = $this->Result_type_model->get('Bad');
                $average = $this->Result_type_model->get('Average');
                $good = $this->Result_type_model->get('Good');
                $excellent = $this->Result_type_model->get('Excellent');

                foreach ($balletlists as $balletlist) {
                    if ($this->input->post($balletlist->ScoreType) == $bad->ResultType) {
                        $balletlist->Active = $bad->ResultType;
                    } else if ($this->input->post($balletlist->ScoreType) == $average->ResultType) {
                        $balletlist->Active = $average->ResultType;
                    } else if ($this->input->post($balletlist->ScoreType) == $good->ResultType) {
                        $balletlist->Active = $good->ResultType;
                    } else if ($this->input->post($balletlist->ScoreType) == $excellent->ResultType) {
                        $balletlist->Active = $excellent->ResultType;
                    } else {
                        $balletlist->Active = "";
                    }
                }

                $this->viewGiveScores($this->input->post("pilot_username"), $this->input->post("competitionID"), $balletlists);
            } else {

                $ballet_trick_types = $this->Score_type_model->getAllBalletTrickTypes();

                foreach ($ballet_trick_types as $ballet_trick_type) {
                    $score = new stdClass();
                    $score->CompetitionID = $this->input->post("competitionID");
                    $score->JudgeUsername = $this->session->userdata('logged_in')['Username'];
                    $score->PilotUsername = $this->input->post("pilot_username");
                    $score->ScoreType = $ballet_trick_type->ScoreType;
                    $score->ResultType = $this->input->post($ballet_trick_type->ScoreType);

                    $this->Score_model->insert($score);
                }

                foreach ($extra_ballet_types as $extra_ballet_type) {
                    $score = new stdClass();
                    $score->CompetitionID = $this->input->post("competitionID");
                    $score->JudgeUsername = $this->session->userdata('logged_in')['Username'];
                    $score->PilotUsername = $this->input->post("pilot_username");
                    $score->ScoreType = $extra_ballet_type->ScoreType;
                    $score->ResultType = $this->input->post(strtolower($extra_ballet_type->ScoreType));

                    $this->Score_model->insert($score);
                }

                redirect('Competition/viewParticipants/' . $this->input->post("competitionID"));
            }
        } else {
            redirect('login');
        }
    }

}
