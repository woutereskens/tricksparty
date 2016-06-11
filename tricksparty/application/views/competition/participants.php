<ol class="breadcrumb">
    <li><?php echo anchor('Competition/viewCompetitions/', 'Home'); ?></li>
    <li><?php echo anchor('Competition/viewCompetitions/', $active); ?></li>
    <li class="active"><?php echo $current; ?></li>
</ol>
<div class="page-header">
    <h2><?php echo $current; ?></h2>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $this->lang->line("competition_info"); ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2"> <strong><?php echo $this->lang->line("location"); ?></strong></div>
                    <div class="col-md-10"><?php echo $competition->Location; ?></div>
                </div>
                <div class="row">
                    <div class="col-md-2"><strong><?php echo $this->lang->line("date"); ?></strong></div>
                    <div class="col-md-10"><?php echo $competition->Date; ?></div>
                </div>
                <div class="row">
                    <div class="col-md-2"><strong><?php echo $this->lang->line("number_of_judges"); ?></strong></div>
                    <div class="col-md-10"><?php echo $competition->NumberOfJudges; ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $this->lang->line("imposed_tricks"); ?></h3>
            </div>
            <div class="panel-body">
                <?php
                if ($competition->ImposedTricksExist) {
                    $counter = 0;
                    foreach ($imposed_tricks as $imposed_trick) {
                        echo '<div class="row col-lg-12">' . $imposed_trick->Trick . '</div>';
                    }
                } else {
                    ?>
                    <?php
                    if ($this->session->userdata('logged_in')['Permission'] == "Field director") {
                        echo anchor('Trick/viewSelectImposedTricks/' . $competition->ID, $this->lang->line("select_imposed_tricks"), 'class="btn btn-primary"');
                    } else if ($this->session->userdata('logged_in')['Permission'] == "Judge") {
                        echo $this->lang->line("waiting_for_field_director_to_select_imposed_tricks");
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php if ($this->session->userdata('logged_in')['Permission'] == "Field director") { ?>
    <div class="page-header">
        <h3><?php echo $this->lang->line("generate_ranking"); ?></h3>
    </div>
    <?php
    if ($pilots != null && $competition->ScoreFromAllJudgesForAllParticipantsExist) {
        echo anchor('Score/calculateScoreForAllParticipants/' . $competition->ID, $this->lang->line("generate_ranking"), ' class="btn btn-danger"');
    } else {
        echo '<button type="button" class="btn btn-danger" disabled="disabled">' . $this->lang->line("not_all_judges_have_given_all_scores_yet") . '</button>';
    }
}
?>
<div class="page-header">
    <h3><?php echo $this->lang->line("pilots"); ?></h3>
</div>
<?php if ($pilots != null) { ?>
    <div class="table-responsive">
        <table class="table">
            <?php
            $counter = 0;
            echo '<tr><th>#</th><th>' . $this->lang->line('pilot') . '</th>';
            if ($this->session->userdata('logged_in')['Permission'] == "Judge") {
                echo '<th class="text-center">' . $this->lang->line('imposed_tricks') . '</th><th class="text-center">' . $this->lang->line('free_expression') . '</th>';
            }
            if ($this->session->userdata('logged_in')['Permission'] != "Field director") {
                echo '<th class="text-center">' . $this->lang->line('ballet') . '</tr>';
            } else {
                echo '<th class="text-center">' . $this->lang->line('balletlist') . '</tr>';
            }
            foreach ($pilots as $pilot) {
                $counter += 1;

                echo '<tr><td>' . $counter . '</td>' . '<td>';
                echo $pilot->Person->FirstName . ' ' . $pilot->Person->LastName;
                echo '</td><td class="text-center">';
                if ($this->session->userdata('logged_in')['Permission'] == "Judge") {
                    // imposed tricks
                    if ($pilot->ImposedTricksScoreFromJudgeExists) {
                        echo '<button type="button" class="btn btn-default" disabled="disabled">' . $this->lang->line("score_already_given") . '</button>';
                    } else {
                        if ($competition->ImposedTricksExist) {
                            echo anchor('Trick/viewGiveScores/' . $pilot->PilotUsername . '/' . $competition->ID, $this->lang->line("give_score"), ' class="btn btn-primary"');
                        } else {
                            echo '<button type="button" class="btn btn-primary" disabled="disabled">' . $this->lang->line("waiting_for_field_director_to_select_imposed_tricks") . '</button>';
                        }
                    }

                    // free expression
                    echo '</td><td class="text-center">';
                    if ($pilot->FreeExpressionScoreFromJudgeExists) {
                        echo '<button type="button" class="btn btn-default" disabled="disabled">' . $this->lang->line("score_already_given") . '</button>';
                    } else {
                        echo anchor('Free_expression/viewGiveScores/' . $pilot->PilotUsername . '/' . $competition->ID, $this->lang->line("give_score"), ' class="btn btn-primary"');
                    }
                    echo '</td><td class="text-center">';

                    // balletlist
                    if ($pilot->BalletlistScoreFromJudgeExists) {
                        echo '<button type="button" class="btn btn-default" disabled="disabled">' . $this->lang->line("score_already_given") . '</button>';
                    } else {
                        if ($pilot->SelectedBalletlistExists) {
                            echo anchor('Balletlist/viewGiveScores/' . $pilot->PilotUsername . '/' . $competition->ID, $this->lang->line("give_score"), ' class="btn btn-primary"');
                        } else {
                            echo '<button type="button" class="btn btn-primary" disabled="disabled">' . $this->lang->line("waiting_for_field_director_to_select_balletlist") . '</button>';
                        }
                    }
                }
                if ($this->session->userdata('logged_in')['Permission'] == "Field director") {
                    // balletlist
                    if ($pilot->SelectedBalletlistExists) {
                        echo anchor('Balletlist/viewBalletlistAsFieldDirector/' . $pilot->PilotUsername . '/' . $competition->ID, '<i class="fa fa-eye fa-fw"></i> ' . $this->lang->line("view"), 'class="btn btn-info"');
                    } else {
                        echo anchor('Balletlist/viewSelectBalletlist/' . $pilot->PilotUsername . '/' . $competition->ID, $this->lang->line("select_balletlist"), ' class="btn btn-primary"');
                    }
                }
                echo '</td></tr>';
            }
            ?>
        </table>
    </div>
<?php } else {
    ?>
    <div><?php echo $this->lang->line("no_participants_to_show"); ?></div>
<?php } ?>