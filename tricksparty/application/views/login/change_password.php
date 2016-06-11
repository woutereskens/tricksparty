<ol class="breadcrumb">
    <li><?php echo anchor('Competition/viewCompetitions/', 'Home'); ?></li>
    <li class="active"><?php echo $current; ?></li>
</ol>
<div class="page-header">
    <h2><?php echo $current; ?></h2>
</div>
<?php echo form_open('Login/changePassword', array('role' => 'form')); ?>
<?php if (validation_errors()) { ?>
    <div class="alert alert-warning" role="alert"><?php echo validation_errors(); ?></div>
<?php } ?>
<div class="form-group row">
    <label for="current_password" class="col-sm-2 control-label"><?php echo $this->lang->line("current_password"); ?>*</label>
    <div class="col-sm-10">
        <input type="password" id="current_password" class="form-control" name="current_password" placeholder="<?php echo $this->lang->line("current_password"); ?>"  value="<?php echo set_value('current_password'); ?>" autofocus>
    </div>
</div>
<div class="form-group row">
    <label for="new_password" class="col-sm-2 control-label"><?php echo $this->lang->line("new_password"); ?>*</label>
    <div class="col-sm-10">
        <input type="password" id="new_password" class="form-control" name="new_password" placeholder="<?php echo $this->lang->line("new_password"); ?>"  value="<?php echo set_value('new_password'); ?>">
    </div>
</div>
<div class="form-group row">
    <label for="password_confirm" class="col-sm-2 control-label"><?php echo $this->lang->line("password_confirm"); ?>*</label>
    <div class="col-sm-10">
        <input type="password" id="password_confirm" class="form-control" name="password_confirm" placeholder="<?php echo $this->lang->line("password_confirm"); ?>"  value="<?php echo set_value('password_confirm'); ?>">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">
            <?php echo $this->lang->line("submit"); ?>
        </button>
        <?php echo anchor('Competition/viewCompetitions', $this->lang->line('cancel'), ' class="btn btn-default"'); ?>
    </div>
</div>
<?php echo form_close(); ?>