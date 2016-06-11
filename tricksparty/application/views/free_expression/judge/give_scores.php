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
<h3 class="page-header"><?php echo $this->lang->line("free_expression"); ?></h3>
<?php if (validation_errors()) { ?>
    <div class="alert alert-warning" role="alert">
        <?php echo validation_errors(); ?>
    </div>
<?php } ?>
<?php
echo form_open('Free_expression/giveScores', array('role' => 'form'));
?>
<div class="form-group" data-toggle="buttons">
    <?php for ($i = 0; $i <= 10; $i++) { ?>
        <label class="btn btn-sample <?php
        if ($free_expression_active == $i) {
            echo 'active';
        }
        ?>"><input type="radio" name="free_expression" value="<?php echo $i; ?>" autocomplete="off" <?php
                   if ($free_expression_active == $i) {
                       echo 'checked';
                   }
                   ?>><?php echo $i; ?></label>
        <?php } ?>
</div>
<?php echo form_hidden('pilot_username', $person->Username); ?>
<?php echo form_hidden('competitionID', $competition->ID); ?>
<div><hr/></div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">
        <?php echo $this->lang->line("submit"); ?>
    </button>
    <?php echo anchor('Competition/viewParticipants/' . $competition->ID, $this->lang->line('cancel'), ' class="btn btn-default"'); ?>
</div>
<div>&nbsp;</div>
<?php form_close(); ?>

