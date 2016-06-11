<ol class="breadcrumb">
    <li><?php echo anchor('Competition/viewCompetitions/', 'Home'); ?></li>
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
<?php echo form_open('Person/createEditPersonalDetailsAsPilot', array('role' => 'form', 'class' => 'form-horizontal')); ?>
<div class="form-group">
    <label for="username" class="col-sm-2 control-label"><?php echo $this->lang->line("username"); ?></label>
    <div class="col-sm-10">
        <input class="form-control" value="<?php echo $person->Username; ?>" disabled>
    </div>
</div>
<div class="form-group">
    <label for="first_name" class="col-sm-2 control-label"><?php echo $this->lang->line("first_name"); ?>*</label>
    <div class="col-sm-10">
        <input class="form-control" value="<?php echo $person->FirstName; ?>" disabled>
    </div>
</div>
<div class="form-group">
    <label for="last_name" class="col-sm-2 control-label"><?php echo $this->lang->line("last_name"); ?>*</label>
    <div class="col-sm-10">
        <input class="form-control" value="<?php echo $person->LastName; ?>" disabled>
    </div>
</div>
<div class="form-group">
    <label for="email_address" class="col-sm-2 control-label"><?php echo $this->lang->line("email_address"); ?>*</label>
    <div class="col-sm-10">
        <input type="text" id="email_address" class="form-control" name="email_address" placeholder="<?php echo $this->lang->line("email_address"); ?>"  value="<?php echo set_value('email_address', $person->EmailAddress); ?>" >
    </div>
</div>
<input type="hidden" name="username" value="<?php echo $person->Username; ?>"/>
<input type="hidden" name="first_name" value="<?php echo $person->FirstName; ?>"/>
<input type="hidden" name="last_name" value="<?php echo $person->LastName ;?>"/>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" value="<?php echo $this->lang->line("submit"); ?>" class="btn btn-default"/>
        <?php echo anchor('Competition/viewCompetitions', $this->lang->line("cancel"), ' class="btn btn-default"'); ?>
    </div>
</div>
<?php echo form_close(); ?>