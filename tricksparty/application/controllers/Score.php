<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Score extends CI_Controller {

    function __construct() {
        parent::__construct();
        // load model
        $this->load->model('Person_model');
        $this->load->model('Competition_model');
        $this->load->model('Balletlist_model');
        $this->load->model('Score_model');
        $this->load->model('Trick_model');
        $this->load->model('Score_type_model');
        $this->load->model('Selected_balletlist_model');
        $this->load->model('Trick_group_model');
        $this->load->model('Person_model');
        $this->load->model('Ranking_model');
        $this->load->model('Ranking_score_model');
        $this->load->model('Imposed_trick_model');
    }

    // field director - calculate score for all participants (local)
    public function calculateScoreForAllParticipants($competitionID) {
        if ($this->session->userdata('logged_in') && $this->session->userdata('logged_in')['Permission'] == "Field director") {
            $pilots = $this->Balletlist_model->getAllPilotsByCompetition($competitionID);
            $competition = $this->Competition_model->get($competitionID);
            foreach ($pilots as $pilot) {
                $pilot->Person = $this->Person_model->get($pilot->PilotUsername);

                $ranking = new stdClass();
                $ranking->Location = $competition->Location;
                $ranking->Date = $competition->Date;
                $ranking->PilotUsername = $pilot->PilotUsername;
                $ranking->PilotFirstName = $pilot->Person->FirstName;
                $ranking->PilotLastName = $pilot->Person->LastName;
                $ranking->PilotEmailAddress = $pilot->Person->EmailAddress;
                $ranking->NumberOfJudges = $competition->NumberOfJudges;
                $ranking->BalletTricksPercentage = 30;
                $ranking->ArtisticPercentage = 30;
                $ranking->ArtisticMultiplier = 3;
                $ranking->TechnicalPercentage = 30;
                $ranking->TechnicalMultiplier = 2;
                $ranking->ImposedTricksPercentage = 40;
                $ranking->FreeExpressionPercentage = 100;

                $rankingID = $this->Ranking_model->insert($ranking);

                $this->calculateBalletTricksScore($pilot, $competitionID, $rankingID);
                $this->calculateArtisticScore($pilot, $competitionID, $rankingID);
                $this->calculateTechnicalScore($pilot, $competitionID, $rankingID);
                $this->calculateImposedTricksScore($pilot, $competitionID, $rankingID);
                $this->calculateFreeExpressionScore($pilot, $competitionID, $rankingID);
            }

            $imposed_tricks = $this->Imposed_trick_model->getByCompetitionToDelete($competitionID);
            foreach ($imposed_tricks as $imposed_trick) {
                $this->Imposed_trick_model->delete($imposed_trick);
            }

            $this->viewRanking($competition->Location, $competition->Date);

            $this->Competition_model->delete($competitionID);
        } else {
            redirect('Login');
        }
    }

    // field director - calculate ballet tricks score (local)
    function calculateBalletTricksScore($pilot, $competitionID, $rankingID) {
        // get all the ballet trick types
        $ballet_trick_types = $this->Score_type_model->getAllBalletTrickTypes();

        // get the selected ballet list
        $selected_balletlist = $this->Selected_balletlist_model->getSelectedBalletlist($pilot->PilotUsername, $competitionID);

        foreach ($ballet_trick_types as $ballet_trick_type) {
            // get the score for a trick from the different judges
            $ballet_trick_scores = $this->Score_model->getScoreFromAllJudges($competitionID, $pilot->PilotUsername, $ballet_trick_type->ScoreType);

            // get the ballet trick
            $balletlist_trick = $this->Balletlist_model->get($pilot->PilotUsername, $competitionID, $ballet_trick_type->ScoreType, $selected_balletlist->ListEnum);

            // get the trick
            $trick = $this->Trick_model->get($balletlist_trick->Trick);

            $total_ballet_trick_score = 0;

            // get the score for the trick
            foreach ($ballet_trick_scores as $ballet_trick_score) {
                $trick_score = $this->Trick_group_model->get($trick->TrickGroup, $ballet_trick_score->ResultType);
                $total_ballet_trick_score += $trick_score->Score;

                $this->Score_model->delete($ballet_trick_score);
            }

            $this->insertRankingScore($rankingID, $ballet_trick_type->ScoreType, $total_ballet_trick_score, $balletlist_trick->Trick);
        }

        $balletlists = $this->Balletlist_model->getAllByPilotUsernameAndCompetition($pilot->PilotUsername, $competitionID);

        foreach ($balletlists as $balletlist) {
            $this->Balletlist_model->delete($balletlist);
        }

        $this->Selected_balletlist_model->delete($selected_balletlist);
    }

    // field director - calculate artistic score (local)
    function calculateArtisticScore($pilot, $competitionID, $rankingID) {
        $total_artistic_score = 0;

        $artistic_scores = $this->Score_model->getScoreFromAllJudges($competitionID, $pilot->PilotUsername, 'Artistic');

        foreach ($artistic_scores as $artistic_score) {
            $total_artistic_score += $artistic_score->ResultType;

            $this->Score_model->delete($artistic_score);
        }

        $this->insertRankingScore($rankingID, 'Total artistic', $total_artistic_score);
    }

    // field director - calculate technical score (local)
    function calculateTechnicalScore($pilot, $competitionID, $rankingID) {
        $total_technical_score = 0;

        $technical_scores = $this->Score_model->getScoreFromAllJudges($competitionID, $pilot->PilotUsername, 'Technical');

        foreach ($technical_scores as $technical_score) {
            $total_technical_score += $technical_score->ResultType;

            $this->Score_model->delete($technical_score);
        }

        $this->insertRankingScore($rankingID, 'Total technical', $total_technical_score);
    }

    // field director - calculate imposed tricks score (local)
    function calculateImposedTricksScore($pilot, $competitionID, $rankingID) {
        $imposed_trick_types = $this->Score_type_model->getAllImposedTrickTypesWithoutAttempts();

        foreach ($imposed_trick_types as $imposed_trick_type) {
            $imposed_trick = $this->Imposed_trick_model->getByCompetitionAndScoreType($competitionID, $imposed_trick_type->ScoreType);

            $imposed_trick_A1_scores = $this->Score_model->getScoreFromAllJudges($competitionID, $pilot->PilotUsername, $imposed_trick_type->ScoreType);
            $imposed_trick_A2_scores = $this->Score_model->getScoreFromAllJudges($competitionID, $pilot->PilotUsername, substr($imposed_trick_type->ScoreType, 0, 3) . 'A2');

            $A1_total_imposed_trick_score = 0;
            $A2_total_imposed_trick_score = 0;

            foreach ($imposed_trick_A1_scores as $imposed_trick_A1_score) {
                $A1_total_imposed_trick_score += $imposed_trick_A1_score->ResultType;

                $this->Score_model->delete($imposed_trick_A1_score);
            }

            foreach ($imposed_trick_A2_scores as $imposed_trick_A2_score) {
                $A2_total_imposed_trick_score += $imposed_trick_A2_score->ResultType * 0.80;

                $this->Score_model->delete($imposed_trick_A2_score);
            }

            if ($A1_total_imposed_trick_score > $A2_total_imposed_trick_score) {
                $this->insertRankingScore($rankingID, substr($imposed_trick_type->ScoreType, 0, 3), $A1_total_imposed_trick_score, $imposed_trick->Trick);
            } else {
                $this->insertRankingScore($rankingID, substr($imposed_trick_type->ScoreType, 0, 3), $A2_total_imposed_trick_score, $imposed_trick->Trick);
            }
        }
    }

    // field director - calculate free expression score (local)
    function calculateFreeExpressionScore($pilot, $competitionID, $rankingID) {
        $total_free_expression_score = 0;

        $free_expression_scores = $this->Score_model->getScoreFromAllJudges($competitionID, $pilot->PilotUsername, 'Free expression');

        foreach ($free_expression_scores as $free_expression_score) {
            $total_free_expression_score += $free_expression_score->ResultType;

            $this->Score_model->delete($free_expression_score);
        }

        $this->insertRankingScore($rankingID, 'Total free expression', $total_free_expression_score);
    }

    // field director - insert ranking score (db)
    function insertRankingScore($rankingID, $scoreType, $score, $trick = NULL) {
        $ranking_score = new stdClass();
        $ranking_score->RankingID = $rankingID;
        $ranking_score->ScoreType = $scoreType;
        $ranking_score->Score = $score;
        $ranking_score->Trick = $trick;

        $this->Ranking_score_model->insert($ranking_score);
    }

    // all - view ranking (page)
    public function viewRanking($location, $date) {
        if ($this->session->userdata('logged_in')) {
            $data['active'] = 'Competitions';
            $data['current'] = $data['title'] = $this->lang->line("ranking");

            $location = urldecode($location);
            $date = urldecode($date);
            
            $competition = $this->Ranking_model->getDistinctByLocationAndDate($location, $date);

            $rankings = $this->calculateScoreForRanking($location, $date);

            function cmp($a, $b) {
                return strcmp($a->Points, $b->Points);
            }

            usort($rankings, "cmp");

            $rankings = array_reverse($rankings);

            $counter = 0;
            $highest_points = 0;

            foreach ($rankings as $ranking) {
                $counter++;
                if ($counter == 1) {
                    $ranking->Percentage = 100;
                    $highest_points = $ranking->Points;
                } else {
                    $ranking->Percentage = $ranking->Points / $highest_points * 100;
                }
            }

            $data['rankings'] = $rankings;
            $data['competition'] = $competition;

            $partials = array('content' => 'competition/ranking');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    // all - view detailed result (page)
    public function viewDetailedResult($rankingID) {
        if ($this->session->userdata('logged_in')) {
            $data['active'] = 'Competitions';
            $data['current'] = $data['title'] = $this->lang->line("detailed_result");

            $detailed_result = $this->Ranking_model->get($rankingID);

            $ballet_trick_types = $this->Score_type_model->getAllBalletTrickTypes();
            $imposed_trick_types = $this->Score_type_model->getAllImposedTrickTypesWithoutAttempts();

            // ballet tricks
            $ballet_tricks = [];

            $total_ballet_tricks = 0;

            foreach ($ballet_trick_types as $ballet_trick_type) {
                array_push($ballet_tricks, $this->Ranking_score_model->get($detailed_result->ID, $ballet_trick_type->ScoreType));
                $total_ballet_tricks += $this->Ranking_score_model->get($detailed_result->ID, $ballet_trick_type->ScoreType)->Score;
            }

            foreach ($ballet_tricks as $ballet_trick) {
                $ballet_trick->ScorePerJudge = $ballet_trick->Score / $detailed_result->NumberOfJudges;
            }

            $detailed_result->BalletTricks = $total_ballet_tricks;
            $detailed_result->BalletTricksPerJudge = $detailed_result->BalletTricks / $detailed_result->NumberOfJudges;
            $detailed_result->BalletTricksPartTotal = $detailed_result->BalletTricksPerJudge / 100 * $detailed_result->BalletTricksPercentage;

            // artistic
            $detailed_result->Artistic = $this->Ranking_score_model->get($detailed_result->ID, 'Total artistic')->Score;
            $detailed_result->ArtisticPerJudgeWithoutMultiplier = $detailed_result->Artistic / $detailed_result->NumberOfJudges;
            $detailed_result->ArtisticPerJudgeWithMultiplier = $detailed_result->ArtisticPerJudgeWithoutMultiplier * $detailed_result->ArtisticMultiplier;
            $detailed_result->ArtisticPartTotal = $detailed_result->ArtisticPerJudgeWithMultiplier / 100 * $detailed_result->ArtisticPercentage;

            // technical
            $detailed_result->Technical = $this->Ranking_score_model->get($detailed_result->ID, 'Total technical')->Score;
            $detailed_result->TechnicalPerJudgeWithoutMultiplier = $detailed_result->Technical / $detailed_result->NumberOfJudges;
            $detailed_result->TechnicalPerJudgeWithMultiplier = $detailed_result->TechnicalPerJudgeWithoutMultiplier * $detailed_result->TechnicalMultiplier;
            $detailed_result->TechnicalPartTotal = $detailed_result->TechnicalPerJudgeWithMultiplier / 100 * $detailed_result->TechnicalPercentage;

            // imposed tricks
            $imposed_tricks = [];

            $total_imposed_tricks = 0;

            foreach ($imposed_trick_types as $imposed_trick_type) {
                array_push($imposed_tricks, $this->Ranking_score_model->get($detailed_result->ID, substr($imposed_trick_type->ScoreType, 0, 3)));
                $total_imposed_tricks += $this->Ranking_score_model->get($detailed_result->ID, substr($imposed_trick_type->ScoreType, 0, 3))->Score;
            }

            foreach ($imposed_tricks as $imposed_trick) {
                $imposed_trick->ScorePerJudge = $imposed_trick->Score / $detailed_result->NumberOfJudges;
            }

            $detailed_result->ImposedTricks = $total_imposed_tricks;
            $detailed_result->ImposedTricksPerJudge = $detailed_result->ImposedTricks / $detailed_result->NumberOfJudges;
            $detailed_result->ImposedTricksPartTotal = $detailed_result->ImposedTricksPerJudge / 100 * $detailed_result->ImposedTricksPercentage;

            // free expression
            $detailed_result->FreeExpression = $this->Ranking_score_model->get($detailed_result->ID, 'Total free expression')->Score;
            $detailed_result->FreeExpressionPerJudge = $detailed_result->FreeExpression / $detailed_result->NumberOfJudges;
            $detailed_result->FreeExpressionPartTotal = $detailed_result->FreeExpressionPerJudge / 100 * $detailed_result->FreeExpressionPercentage;

            // points
            $detailed_result->Points = $detailed_result->BalletTricksPartTotal +
                    $detailed_result->ArtisticPartTotal +
                    $detailed_result->TechnicalPartTotal +
                    $detailed_result->ImposedTricksPartTotal +
                    $detailed_result->FreeExpressionPartTotal;

            $rankings = $this->calculateScoreForRanking($detailed_result->Location, $detailed_result->Date);

            function cmp($a, $b) {
                return strcmp($a->Points, $b->Points);
            }

            usort($rankings, "cmp");

            $rankings = array_reverse($rankings);

            $counter = 0;
            $highest_points = 0;

            foreach ($rankings as $ranking) {
                $counter++;
                if ($counter == 1) {
                    $ranking->Percentage = 100;
                    $highest_points = $ranking->Points;
                } else {
                    $ranking->Percentage = $ranking->Points / $highest_points * 100;
                }
            }

            for ($i = 0; $i < count($rankings); ++$i) {
                if ($rankings[$i]->PilotUsername == $detailed_result->PilotUsername) {
                    $detailed_result->Rank = $i + 1;
                    $detailed_result->Percentage = $rankings[$i]->Percentage;
                }
            }

            //$data['rankings'] = $rankings;
            $data['detailed_result'] = $detailed_result;
            $data['ballet_tricks'] = $ballet_tricks;
            $data['imposed_tricks'] = $imposed_tricks;

            $pilot_rankings = $this->Ranking_model->getAllByPilot($detailed_result->PilotFirstName, $detailed_result->PilotLastName);

            foreach ($pilot_rankings as $pilot_ranking) {
                // ballet tricks
                $total_ballet_tricks = 0;

                foreach ($ballet_trick_types as $ballet_trick_type) {
                    $total_ballet_tricks += $this->Ranking_score_model->get($pilot_ranking->ID, $ballet_trick_type->ScoreType)->Score;
                }

                $pilot_ranking->BalletTricks = $total_ballet_tricks / $pilot_ranking->NumberOfJudges / 100 * $pilot_ranking->BalletTricksPercentage;

                // artistic
                $pilot_ranking->Artistic = $this->Ranking_score_model->get($pilot_ranking->ID, 'Total artistic')->Score / $pilot_ranking->NumberOfJudges * $pilot_ranking->ArtisticMultiplier / 100 * $pilot_ranking->ArtisticPercentage;

                // technical
                $pilot_ranking->Technical = $this->Ranking_score_model->get($pilot_ranking->ID, 'Total technical')->Score / $pilot_ranking->NumberOfJudges * $pilot_ranking->TechnicalMultiplier / 100 * $pilot_ranking->TechnicalPercentage;

                // imposed tricks
                $total_imposed_tricks = 0;

                foreach ($imposed_trick_types as $imposed_trick_type) {
                    $total_imposed_tricks += $this->Ranking_score_model->get($pilot_ranking->ID, substr($imposed_trick_type->ScoreType, 0, 3))->Score;
                }

                $pilot_ranking->ImposedTricks = $total_imposed_tricks / $pilot_ranking->NumberOfJudges / 100 * $pilot_ranking->ImposedTricksPercentage;

                // free expression
                $pilot_ranking->FreeExpression = $this->Ranking_score_model->get($pilot_ranking->ID, 'Total free expression')->Score / $pilot_ranking->NumberOfJudges / 100 * $pilot_ranking->FreeExpressionPercentage;
            }

//            $contentadmin = $this->load->view('email/individual_ranking', $data, TRUE);
//            $this->sendmail($detailed_result->PilotEmailAddress,
//                    'Individual ranking for ' . $detailed_result->PilotFirstName . ' ' . $detailed_result->PilotLastName . ' at ' . $detailed_result->Location . '(' . $detailed_result->Date . ')',
//                    $contentadmin);

            $data['js'][] = "<script>
            new Morris.Area({
            // ID of the element in which to draw the chart.
            element: 'myfirstchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: " . json_encode($pilot_rankings) . ",
            xkey: 'Date',
            ykeys: ['BalletTricks', 'Artistic', 'Technical', 'ImposedTricks', 'FreeExpression'],
            labels: ['" . $this->lang->line("ballet_tricks") . "', '" . $this->lang->line("artistic") . "', '" . $this->lang->line("technical") . "', '" . $this->lang->line("imposed_tricks") . "', '" . $this->lang->line("free_expression") . "'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true }); </script>";

            $partials = array('content' => 'competition/detailed_result');
            $this->template->load('general/main', $partials, $data);
        } else {
            redirect('login');
        }
    }

    private function sendmail($emailto, $subject, $content) {
        $this->load->library('email');

        $this->email->from('wouter.eskens@gmail.com', 'Tricksparty');
        //$this->email->reply_to($replyto, $replytoname);
        $this->email->to($emailto);
        $this->email->set_mailtype("html");

        $this->email->subject($subject);
        $this->email->message($content);

        $this->email->send();
        return $this->email->print_debugger();
    }

    // all - calculate score for ranking (local)
    function calculateScoreForRanking($location, $date) {
        $rankings = $this->Ranking_model->getAllByLocationAndDate($location, $date);

        $ballet_trick_types = $this->Score_type_model->getAllBalletTrickTypes();
        $imposed_trick_types = $this->Score_type_model->getAllImposedTrickTypesWithoutAttempts();

        foreach ($rankings as $ranking) {
            // ballet tricks
            $total_ballet_tricks = 0;

            foreach ($ballet_trick_types as $ballet_trick_type) {
                $total_ballet_tricks += $this->Ranking_score_model->get($ranking->ID, $ballet_trick_type->ScoreType)->Score;
            }

            $ranking->BalletTricks = $total_ballet_tricks / $ranking->NumberOfJudges / 100 * $ranking->BalletTricksPercentage;

            // artistic
            $artistic = $this->Ranking_score_model->get($ranking->ID, 'Total artistic')->Score / $ranking->NumberOfJudges * $ranking->ArtisticMultiplier / 100 * $ranking->ArtisticPercentage;

            // technical
            $technical = $this->Ranking_score_model->get($ranking->ID, 'Total technical')->Score / $ranking->NumberOfJudges * $ranking->TechnicalMultiplier / 100 * $ranking->TechnicalPercentage;

            // style (artistic + technical)
            $ranking->Style = $artistic + $technical;

            // ballet (style + ballet tricks)
            $ranking->Ballet = $ranking->Style + $ranking->BalletTricks;

            // imposed tricks
            $total_imposed_tricks = 0;

            foreach ($imposed_trick_types as $imposed_trick_type) {
                $total_imposed_tricks += $this->Ranking_score_model->get($ranking->ID, substr($imposed_trick_type->ScoreType, 0, 3))->Score;
            }

            $ranking->ImposedTricks = $total_imposed_tricks / $ranking->NumberOfJudges / 100 * $ranking->ImposedTricksPercentage;

            // free expression
            $ranking->FreeExpression = $this->Ranking_score_model->get($ranking->ID, 'Total free expression')->Score / $ranking->NumberOfJudges / 100 * $ranking->FreeExpressionPercentage;

            // points
            $ranking->Points = $ranking->Ballet +
                    $ranking->ImposedTricks +
                    $ranking->FreeExpression;
        }

        return $rankings;
    }

}
