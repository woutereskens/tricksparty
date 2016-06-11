<ol class="breadcrumb">
    <li><?php echo anchor('Competition/viewCompetitions/', 'Home'); ?></li>
    <li class="active"><?php echo $current; ?></li>
</ol>
<div class="page-header">
    <h2><?php echo $current; ?></h2>
</div>
<?php if ($this->session->userdata('logged_in')['Permission'] == "Admin") { ?>
    <p><?php echo anchor('Competition/viewCreateEditCompetition/' . 0, '<i class="fa fa-plus-circle"></i> ' . $this->lang->line("create"), 'class="btn btn-success"'); ?></p>
<?php } ?>
<h3 class="page-header"><?php echo $this->lang->line("upcoming"); ?></h3>
<?php if ($upcoming_competitions != null) { ?>
    <div class="table-responsive">
        <table class="table">
            <?php
            $counter = 0;
            echo '<tr><th>#</th>';
            echo '<th>' . $this->lang->line('location') . '</th>';
            echo '<th class="text-center">' . $this->lang->line('date') . '</th>';
            echo '<th class="text-center">' . $this->lang->line("number_of_judges") . '</th>';
            if ($this->session->userdata('logged_in')['Permission'] == "Admin") {
                echo '<th></th>';
            } else if ($this->session->userdata('logged_in')['Permission'] == "Field director" || $this->session->userdata('logged_in')['Permission'] == "Judge") {
                echo '<th class="text-center">' . $this->lang->line('participants') . '</th>';
            } else if ($this->session->userdata('logged_in')['Permission'] == "Pilot") {
                echo '<th colspan="2" class="text-center">Balletlist</th>';
            }
            echo '</tr>';
            foreach ($upcoming_competitions as $upcoming_competition) {
                $counter += 1;

                echo '<tr><td>' . $counter . '</td>' . '<td>';
                echo $upcoming_competition->Location;
                echo '</td>';
                echo '<td class="text-center">';
                echo $upcoming_competition->Date;
                echo '</td>';
                echo '<td class="text-center">';
                echo $upcoming_competition->NumberOfJudges;
                echo '</td>';
                if ($this->session->userdata('logged_in')['Permission'] == "Admin") {
                    echo '<td class="text-center">';
                    echo anchor('Competition/viewCreateEditCompetition/' . $upcoming_competition->ID, '<i class="fa fa-edit"></i> ' . $this->lang->line("edit"), 'class="btn btn-warning"');
                    echo '</td>';
                }if ($this->session->userdata('logged_in')['Permission'] == "Field director" || $this->session->userdata('logged_in')['Permission'] == "Judge") {
                    echo '<td class="text-center">';
                    echo anchor('Competition/viewParticipants/' . $upcoming_competition->ID, '<i class="fa fa-eye"></i> ' . $this->lang->line("view"), 'class="btn btn-info"');
                    echo '</td>';
                } else if ($this->session->userdata('logged_in')['Permission'] == "Pilot") {
                    if ($upcoming_competition->BalletlistExists) {
                        if (!$upcoming_competition->SelectedBalletlistExists) {
                            echo '<td class="text-center">';
                            echo anchor('Balletlist/viewEditBalletlist/' . $upcoming_competition->ID, '<i class="fa fa-edit"></i> ' . $this->lang->line("edit"), 'class="btn btn-warning"');
                            echo '</td>';
                        }
                        echo '<td class="text-center">';
                        echo anchor('Balletlist/viewBalletlist/' . $upcoming_competition->ID, '<i class="fa fa-eye fa-fw"></i> ' . $this->lang->line("view"), 'class="btn btn-info"');
                        echo '</td';
                    } else {
                        echo '<td class="text-center" colspan="2">';
                        echo anchor('Balletlist/viewCreateBalletlist/' . $upcoming_competition->ID, '<i class="fa fa-plus-circle"></i> ' . $this->lang->line("create"), 'class="btn btn-success"');
                        echo '</td';
                    }
                }
                echo '</tr>';
            }
            ?>
        </table>
    </div>
<?php } else {
    ?>
    <div><?php echo $this->lang->line("no_competitions_to_show"); ?></div>
<?php } ?>
<h3 class="page-header"><?php echo $this->lang->line("past"); ?></h3>
<?php if ($past_competitions != null) { ?>
    <div class="table-responsive">
        <table class="table">
            <?php $counter = 0; ?>
            <tr>
                <th>#</th>
                <th><?php echo $this->lang->line('location'); ?></th>
                <th class="text-center"><?php echo $this->lang->line('date'); ?></th>
                <th class="text-center"><?php echo $this->lang->line('number_of_judges'); ?></th>
                <th class="text-center"><?php echo $this->lang->line('ranking'); ?></th>
            </tr>
            <?php
            foreach ($past_competitions as $past_competition) {
                $counter += 1;

                echo '<tr>';
                echo '<td>' . $counter . '</td>' . '<td>';
                echo $past_competition->Location;
                echo '</td>';
                echo '<td class="text-center">';
                echo $past_competition->Date;
                echo '</td>';
                echo '<td class="text-center">';
                echo $past_competition->NumberOfJudges;
                echo '</td>';
                echo '<td class="text-center">';
                echo anchor('Score/viewRanking/' . $past_competition->Location . '/' . $past_competition->Date, '<i class="fa fa-eye"></i> ' . $this->lang->line("view"), 'class="btn btn-info"');
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
<?php } else {
    ?>
    <div><?php echo $this->lang->line("no_competitions_to_show"); ?></div>
<?php } ?>