<ol class="breadcrumb">
    <li><?php echo anchor('Competition/viewCompetitions/', 'Home'); ?></li>
    <li><?php echo anchor('Competition/viewCompetitions/', $active); ?></li>
    <li><?php echo anchor('Competition/viewParticipants/' . $competition->ID, $this->lang->line('participants')); ?></li>
    <li class="active"><?php echo $current; ?></li>
</ol>
<div class="page-header">
    <h2><?php echo $current; ?></h2>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $this->lang->line("pilot_info"); ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-3"> <strong><?php echo $this->lang->line("first_name"); ?></strong></div>
                    <div class="col-sm-7"><?php echo $person->FirstName; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3"><strong><?php echo $this->lang->line("last_name"); ?></strong></div>
                    <div class="col-sm-7"><?php echo $person->LastName; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3"><strong><?php echo $this->lang->line("email_address"); ?></strong></div>
                    <div class="col-sm-7"><?php echo $person->EmailAddress; ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $this->lang->line("competition_info"); ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-2"> <strong><?php echo $this->lang->line("location"); ?></strong></div>
                    <div class="col-lg-10"><?php echo $competition->Location; ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-2"><strong><?php echo $this->lang->line("date"); ?></strong></div>
                    <div class="col-lg-10"><?php echo $competition->Date; ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-2"><strong><?php echo $this->lang->line("number_of_judges"); ?></strong></div>
                    <div class="col-lg-10"><?php echo $competition->NumberOfJudges; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<h3 class="page-header"><?php echo $this->lang->line("balletlist"); ?></h3>
<?php if (validation_errors()) { ?>
    <div class="alert alert-warning" role="alert">
        <?php echo validation_errors(); ?>
    </div>
<?php } ?>
<?php
echo form_open('Balletlist/giveScores', array('role' => 'form'));
$counter = 0;
foreach ($balletlists as $balletlist) {
    $counter++;
    ?>
    <div class="form-group" data-toggle="buttons">
        <h4><?php echo $this->lang->line("trick") . ' ' . $counter . ': ' . $balletlist->Trick; ?></h4>
        <label class="btn btn-sample <?php
        if ($balletlist->Active == $bad->ResultType) {
            echo 'active';
        }
        ?>"><input type="radio" name="<?php echo $balletlist->ScoreType; ?>" value="<?php echo $bad->ResultType; ?>" autocomplete="off" <?php
                   if ($balletlist->Active == $bad->ResultType) {
                       echo 'checked';
                   }
                   ?>><?php echo $bad->ResultType; ?></label>
        <label class="btn btn-sample <?php
        if ($balletlist->Active == $average->ResultType) {
            echo 'active';
        }
        ?>"><input type="radio" name="<?php echo $balletlist->ScoreType; ?>" value="<?php echo $average->ResultType; ?>" autocomplete="off" <?php
                   if ($balletlist->Active == $average->ResultType) {
                       echo 'checked';
                   }
                   ?>><?php echo $average->ResultType; ?></label>
        <label class="btn btn-sample <?php
        if ($balletlist->Active == $good->ResultType) {
            echo 'active';
        }
        ?>"><input type="radio" name="<?php echo $balletlist->ScoreType; ?>" value="<?php echo $good->ResultType; ?>" autocomplete="off" <?php
                   if ($balletlist->Active == $good->ResultType) {
                       echo 'checked';
                   }
                   ?>><?php echo $good->ResultType; ?></label>
        <label class="btn btn-sample <?php
        if ($balletlist->Active == $excellent->ResultType) {
            echo 'active';
        }
        ?>"><input type="radio" name="<?php echo $balletlist->ScoreType; ?>" value="<?php echo $excellent->ResultType; ?>" autocomplete="off" <?php
                   if ($balletlist->Active == $excellent->ResultType) {
                       echo 'checked';
                   }
                   ?>><?php echo $excellent->ResultType; ?></label>
    </div>
<?php } ?>
<div><hr/></div>
<?php foreach ($extra_score_types as $extra_score_type) { ?>
    <div class="form-group row">
        <label for="<?php echo strtolower($extra_score_type->ScoreType); ?>" class="col-lg-2 control-label"><?php echo $this->lang->line(strtolower($extra_score_type->ScoreType)); ?></label>
        <div class="col-lg-10">
            <select class="form-control" id="<?php echo strtolower($extra_score_type->ScoreType); ?>" name="<?php echo strtolower($extra_score_type->ScoreType); ?>">
                <option value="" <?php echo set_select(strtolower($extra_score_type->ScoreType), $this->lang->line("select_" . strtolower($extra_score_type->ScoreType) . "_score")); ?>><?php echo $this->lang->line("select_" . strtolower($extra_score_type->ScoreType) . "_score"); ?></option>
                <?php for ($i = 0; $i <= 20; $i++) { ?>
                    <option value="<?php echo $i; ?>" <?php echo set_select(strtolower($extra_score_type->ScoreType), $i); ?>><?php echo $i; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
<?php } ?>
<div><hr/></div>
<?php echo form_hidden('pilot_username', $person->Username); ?>
<?php echo form_hidden('competitionID', $competition->ID); ?>
<div class="form-group">
    <button type="submit" class="btn btn-primary">
        <?php echo $this->lang->line("submit"); ?>
    </button>
    <?php echo anchor('Competition/viewParticipants/' . $competition->ID, $this->lang->line('cancel'), ' class="btn btn-default"'); ?>
</div>
<div>&nbsp;</div>
<?php form_close(); ?>

