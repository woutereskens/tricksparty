<ol class="breadcrumb">
    <li><?php echo anchor('Competition/viewCompetitions/', 'Home'); ?></li>
    <li><?php echo anchor('Competition/viewCompetitions/', $active); ?></li>
    <li class="active"><?php echo $current; ?></li>
</ol>
<div class="page-header">
    <h2><?php echo $current; ?></h2>
</div> 
<?php if (validation_errors()) { ?>
    <div class="alert alert-warning" role="alert">
        <?php echo validation_errors(); ?>
    </div>
<?php } ?>
<?php echo form_open('Competition/createEditCompetition', array('role' => 'form', 'class' => 'form-horizontal')); ?>
<div class="form-group row">
    <label for="location" class="col-lg-2 control-label"><?php echo $this->lang->line("location"); ?>*</label>
    <div class="col-lg-10">
        <input type="text" id="location" class="form-control" name="location" placeholder="<?php echo $this->lang->line("location"); ?>"  value="<?php echo set_value('location', $competition->Location); ?>" autofocus>
    </div>
</div>
<div class="form-group row">
    <label for="date" class="col-lg-2 control-label"><?php echo $this->lang->line("date"); ?>*</label>
    <div class=" col-lg-10">
        <input type="text" class="form-control input-group date" value="<?php echo set_value('date', $competition->Date); ?>" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="date" placeholder="yyyy-mm-dd">
    </div>
</div>
<div class="form-group row">
    <label for="number_of_judges" class="col-lg-2 control-label"><?php echo $this->lang->line("number_of_judges"); ?>*</label>
    <div class="col-lg-10">
        <select class="form-control" id="numberofjudges" name="number_of_judges">
            <?php
            for ($i = 0; $i <= 3; $i++) {
                $default = false;

                if ($competition->NumberOfJudges == $i) {
                    $default = true;
                }
                ?>
                <option value="<?php echo $i; ?>" <?php echo set_select('number_of_judges', $i, $default); ?>><?php echo $i; ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<input type="hidden" name="ID" value="<?php echo $competition->ID; ?>"/>
<div class="form-group row">
    <div class="col-lg-offset-2 col-lg-10">
        <button type="submit" class="btn btn-primary">
            <?php echo $this->lang->line("submit"); ?>
        </button>
        <?php echo anchor('Competition/viewCompetitions', $this->lang->line("cancel"), ' class="btn btn-default"'); ?>
    </div>
</div>
<?php echo form_close(); ?>