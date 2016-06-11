<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $current; ?></title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">

        <!-- MetisMenu CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/metisMenu.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/sb-admin-2.css">

        <!-- Custom Fonts -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.min.css">

        <!-- Datetimepicker CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap-datepicker.min.css">

        <!-- Select2 CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/select2.min.css">
        
        <!-- Morris CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/morris.css">
        
        <!-- Main CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico">
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php echo anchor('Competition/viewCompetitions', $this->lang->line('tricksparty'), 'class="navbar-brand"'); ?>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo ucfirst($this->session->userdata('logged_in')['Username']); ?> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <?php echo anchor('Login/viewChangePassword', '<i class="fa fa-lock fa-fw"></i> ' . $this->lang->line("change_password")); ?>
                            </li>
                            <?php if ($this->session->userdata('logged_in')['Permission'] == "Pilot") { ?>
                                <li>
                                    <?php echo anchor('Person/viewCreateEditPersonalDetailsAsPilot', '<i class="fa fa-user fa-fw"></i> ' . $this->lang->line("edit_personal_details")); ?>
                                </li>
                            <?php } ?>
                            <li class="divider"></li>
                            <li><?php echo anchor('Login/logout', '<i class="fa fa-sign-out fa-fw"></i> ' . $this->lang->line("logout")); ?></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li <?php if ($active == 'Competitions') echo 'class=active'; ?>>
                                <?php echo anchor('Competition/viewCompetitions', '<i class="fa fa-trophy fa-fw"></i> ' . $this->lang->line("competitions")); ?>
                            </li>
                            <li <?php if ($active == 'Tricks') echo 'class=active'; ?>>
                                <?php echo anchor('Trick/viewTricks', '<i class="fa fa-magic fa-fw"></i> ' . $this->lang->line("tricks")); ?>
                            </li>
                            <?php if ($this->session->userdata('logged_in')['Permission'] == "Admin") { ?>
                                <li <?php if ($active == 'Logins') echo 'class=active'; ?>>
                                    <?php echo anchor('Login/viewLogins', '<i class="fa fa-users fa-fw"></i> ' . $this->lang->line("logins")); ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div id="container">
                    <?php echo $content; ?>
                </div>
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->      
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>js/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url(); ?>js/sb-admin-2.js"></script>
        <!-- Datetimepicker JavaScript -->
        <script src="<?php echo base_url(); ?>js/bootstrap-datepicker.min.js"></script>
        <!-- Select2 JavaScript -->
        <script src="<?php echo base_url(); ?>js/select2.min.js"></script>
        <!-- Morris JavaScript -->
        <script src="<?php echo base_url(); ?>js/morris.min.js"></script>
        <!-- Raphael JavaScript -->
        <script src="<?php echo base_url(); ?>js/raphael.min.js"></script>
        <?php
        if (isset($js)) {
            foreach ($js as $file) {
                echo $file;
            }
        }
        ?>
    </body>
</html>
