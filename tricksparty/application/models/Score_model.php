<?php

class Score_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getScoreFromAllJudges($competitionID, $pilotUsername, $scoreType) {
        $this->db->where('CompetitionID', $competitionID);
        $this->db->where('PilotUsername', $pilotUsername);
        $this->db->where('ScoreType', $scoreType);
        $query = $this->db->get('score');
        return $query->result();
    }

    function getScoreFromJudgeExists($competitionID, $judgeUsername, $pilotUsername, $scoreType) {
        $this->db->where('CompetitionID', $competitionID);
        $this->db->where('PilotUsername', $pilotUsername);
        $this->db->where('JudgeUsername', $judgeUsername);
        $this->db->where('ScoreType', $scoreType);
        $query = $this->db->get('score');
        $count = $query->num_rows(); //counting result from query

        if ($count == 0) {
            return false;
        } else {
            return true;
        }
    }

    function getScoreFromAllJudgesExists($competitionID, $pilotUsername, $scoreType, $numberOfJudges) {
        $this->db->where('CompetitionID', $competitionID);
        $this->db->where('PilotUsername', $pilotUsername);
        $this->db->where('ScoreType', $scoreType);
        $query = $this->db->get('score');
        $count = $query->num_rows(); //counting result from query

        if ($count < $numberOfJudges) {
            return false;
        } else {
            return true;
        }
    }

    // create score
    function insert($score) {
        $this->db->insert('score', $score);
    }

    // delete score
    function delete($artistic_score) {
        $this->db->where('CompetitionID', $artistic_score->CompetitionID);
        $this->db->where('JudgeUsername', $artistic_score->JudgeUsername);
        $this->db->where('PilotUsername', $artistic_score->PilotUsername);
        $this->db->where('ScoreType', $artistic_score->ScoreType);
        $this->db->delete('score');
    }

}

?>
