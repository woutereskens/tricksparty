<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $this->lang->line("tricksparty_login"); ?></title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">

        <!-- MetisMenu CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/metisMenu.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/sb-admin-2.css">

        <!-- Custom Fonts -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $this->lang->line("tricksparty_login"); ?></h3>
                        </div>
                        <div class="panel-body">
                            <?php if (validation_errors()) { ?>
                                <div class="alert alert-warning" role="alert">
                                    <?php echo validation_errors(); ?>
                                </div>
                            <?php } ?>
                            <?php echo form_open('login/check', array('role' => 'form')); ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="<?php echo $this->lang->line("username"); ?>" name="username" type="text" value="<?php echo set_value('username'); ?>"autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="<?php echo $this->lang->line("password"); ?>" name="password" type="password" value="<?php echo set_value('password'); ?>">
                                </div>
                                
                                <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo $this->lang->line("login"); ?></button>
                            </fieldset>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>js/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url(); ?>js/sb-admin-2.js"></script>
    </body>
</html>
