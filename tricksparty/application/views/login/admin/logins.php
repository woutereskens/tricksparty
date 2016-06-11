<ol class="breadcrumb">
    <li><?php echo anchor('Competition/viewCompetitions/', 'Home'); ?></li>
    <li class="active"><?php echo $current; ?></li>
</ol>
<div class="page-header">
    <h2><?php echo $current; ?></h2>
</div>
<p><?php echo anchor('Login/viewCreateLogin/' . 0, '<i class="fa fa-plus-circle"></i> ' . $this->lang->line("create"), 'class="btn btn-success"'); ?></p>
<div class="table-responsive">
    <table class="table table-bordered">
        <?php
        $counter = 0;
        echo '<tr><th>#</th><th>' . $this->lang->line("username") . '</th><th>' . $this->lang->line("permission") . '</th><th class="text-center" colspan="2">' . $this->lang->line('personal_details') . '</th></tr>';
        foreach ($logins as $login) {
            $counter += 1;

            echo '<tr><td>' . $counter . '</td>' . '<td>';
            echo $login->Username;
            echo '</td>';
            echo '<td>';
            echo $login->Permission;
            echo '</td>';
            if ($login->Permission == "Pilot") {
                if (isset($login->PersonExists)) {
                    echo '<td class="text-center">';
                    echo anchor('Person/viewCreateEditPersonalDetails/' . $login->Username, '<i class="fa fa-edit fa-fw"></i> ' . $this->lang->line("edit"), 'class="btn btn-warning"');
                    echo '</td>';
                    echo '<td class="text-center">';
                    echo anchor('Person/viewPersonalDetails/' . $login->Username, '<i class="fa fa-eye fa-fw"></i> ' . $this->lang->line("view"), 'class="btn btn-info"');
                    echo '</td';
                } else {
                    echo '<td class="text-center">';
                    echo anchor('Person/viewCreateEditPersonalDetails/' . $login->Username, '<i class="fa fa-plus-circle fa-fw"></i> ' . $this->lang->line("create"), 'class="btn btn-success"');
                    echo '</td';
                }
                echo '</tr>';
            } else {
                echo '<td colspan="2" class="text-center">' . $this->lang->line('no_personal_details_allowed') . '.</td>';
            }
        }
        ?>
    </table>
</div>