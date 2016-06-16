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
<?php echo form_open('Login/createLogin', array('role' => 'form', 'class' => 'form-horizontal')); ?>
<div class="form-group">
    <label for="username" class="col-sm-2 control-label"><?php echo $this->lang->line("username"); ?>*</label>
    <div class="col-sm-10">
        <input type="text" id="username" class="form-control" name="username" autofocus="" value="<?php echo set_value('username'); ?>" placeholder="<?php echo $this->lang->line("username"); ?>">
    </div>
</div>
<div class="form-group">
    <label for="password" class="col-sm-2 control-label"><?php echo $this->lang->line("password"); ?>*</label>
    <div class="col-sm-10">
        <input type="password" id="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="<?php echo $this->lang->line("password"); ?>">
    </div>
</div>
<div class="form-group">
    <label for="password_confirm" class="col-sm-2 control-label"><?php echo $this->lang->line("password_confirm"); ?>*</label>
    <div class="col-sm-10">
        <input type="password" id="password_confirm" class="form-control" name="password_confirm" value="<?php echo set_value('password_confirm'); ?>" placeholder="<?php echo $this->lang->line("password_confirm"); ?>">
    </div>
</div>
<div class="form-group">
    <label for="permission" class="col-sm-2 control-label"><?php echo $this->lang->line("permission"); ?>*</label>
    <div class="col-sm-10">
        <select class="form-control" id="permission" name="permission">
            <?php foreach ($permissions as $permission) { ?>
                <option value="<?php echo $permission->Permission; ?>" <?php echo set_select('permission', $permission->Permission); ?>><?php echo $permission->Permission; ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<div id="personal_details" <?php if ($pilot == 0) {
                echo "style='display:none;'";
            } ?>>
    <div class="page-header">
        <h3><?php echo $this->lang->line("personal_details"); ?></h3>
    </div>
    <div class="form-group">
        <label for="first_name" class="col-sm-2 control-label"><?php echo $this->lang->line("first_name"); ?>*</label>
        <div class="col-sm-10">
            <input type="text" id="first_name" class="form-control" name="first_name" autofocus="" placeholder="<?php echo $this->lang->line("first_name"); ?>"  value="<?php echo set_value('first_name'); ?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="last_name" class="col-sm-2 control-label"><?php echo $this->lang->line("last_name"); ?>*</label>
        <div class="col-sm-10">
            <input type="text" id="first_name" class="form-control" name="last_name" placeholder="<?php echo $this->lang->line("last_name"); ?>"  value="<?php echo set_value('last_name'); ?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="email_address" class="col-sm-2 control-label"><?php echo $this->lang->line("email_address"); ?>*</label>
        <div class="col-sm-10">
            <input type="text" id="email_address" class="form-control" name="email_address" placeholder="<?php echo $this->lang->line("email_address"); ?>"  value="<?php echo set_value('email_address'); ?>" >
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">
        <?php echo $this->lang->line("submit"); ?>
    </button>
        <?php echo anchor('Login/viewLogins', $this->lang->line("cancel"), ' class="btn btn-default"'); ?>
    </div>
</div>
<?php echo form_close(); ?>