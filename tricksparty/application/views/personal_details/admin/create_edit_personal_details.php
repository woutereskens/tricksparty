<ol class="breadcrumb">
    <li><?php echo anchor('Competition/viewCompetitions/', 'Home'); ?></li>
    <li><?php echo anchor('Login/viewLogins', $active); ?></li>
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
<?php echo form_open('Person/createEditPersonalDetails', array('role' => 'form', 'class' => 'form-horizontal')); ?>
<div class="form-group">
    <label for="username" class="col-sm-2 control-label"><?php echo $this->lang->line("username"); ?></label>
    <div class="col-sm-10">
        <input class="form-control" value="<?php echo $person->Username; ?>" disabled>
    </div>
</div>
<div class="form-group">
    <label for="first_name" class="col-sm-2 control-label"><?php echo $this->lang->line("first_name"); ?>*</label>
    <div class="col-sm-10">
        <input type="text" id="first_name" class="form-control" name="first_name" autofocus="" placeholder="<?php echo $this->lang->line("first_name"); ?>"  value="<?php echo set_value('first_name', $person->FirstName); ?>" >
    </div>
</div>
<div class="form-group">
    <label for="last_name" class="col-sm-2 control-label"><?php echo $this->lang->line("last_name"); ?>*</label>
    <div class="col-sm-10">
        <input type="text" id="first_name" class="form-control" name="last_name" autofocus="" placeholder="<?php echo $this->lang->line("last_name"); ?>"  value="<?php echo set_value('last_name', $person->LastName); ?>" >
    </div>
</div>
<div class="form-group">
    <label for="email_address" class="col-sm-2 control-label"><?php echo $this->lang->line("email_address"); ?>*</label>
    <div class="col-sm-10">
        <input type="text" id="email_address" class="form-control" name="email_address" placeholder="<?php echo $this->lang->line("email_address"); ?>"  value="<?php echo set_value('email_address', $person->EmailAddress); ?>" >
    </div>
</div>
<input type="hidden" name="username" value="<?php echo $person->Username; ?>"/>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">
            <?php echo $this->lang->line("submit"); ?>
        </button>
        <?php echo anchor('Login/viewLogins', $this->lang->line("cancel"), ' class="btn btn-default"'); ?>
    </div>
</div>
<?php echo form_close(); ?>