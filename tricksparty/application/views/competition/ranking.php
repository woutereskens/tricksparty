<ol class="breadcrumb">
    <li><?php echo anchor('Competition/viewCompetitions/', 'Home'); ?></li>
    <li><?php echo anchor('Competition/viewCompetitions/', $this->lang->line("competitions")); ?></li>
    <li class="active"><?php echo $current; ?></li>
</ol>
<div class="page-header">
    <h2><?php echo $current; ?></h2>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $this->lang->line("competition_info"); ?></h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-2"> <strong><?php echo $this->lang->line("location"); ?></strong></div>
            <div class="col-sm-10"><?php echo $competition->Location; ?></div>
        </div>
        <div class="row">
            <div class="col-sm-2"><strong><?php echo $this->lang->line("date"); ?></strong></div>
            <div class="col-sm-10"><?php echo $competition->Date; ?></div>
        </div>
    </div>
</div>
<h3 class="page-header"><?php echo $this->lang->line("ranking"); ?></h3>
<?php if ($rankings != null) { ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>R</th>
                <th class="text-center"><?php echo $this->lang->line('points'); ?></th>
                <th><?php echo $this->lang->line('first_name'); ?></th>
                <th><?php echo $this->lang->line('last_name'); ?></th>
                <th class="text-center"><?php echo $this->lang->line('ballet'); ?></th>
                <th class="text-center"><?php echo $this->lang->line('tricks'); ?></th>
                <th class="text-center"><?php echo $this->lang->line('style'); ?></th>
                <th class="text-center"><?php echo $this->lang->line('imposed_tricks'); ?></th>
                <th class="text-center"><?php echo $this->lang->line('free_expression'); ?></th>
                <th class="text-center"><?php echo $this->lang->line('percentage'); ?></th>
                <th class="text-center"><?php echo $this->lang->line('detailed_result'); ?></th>
            </tr>
            <?php
            $counter = 0;
            foreach ($rankings as $ranking) {
                $counter += 1;
                ?>
                <tr>
                    <td><?php echo $counter; ?></td>
                    <td class="text-center"><?php echo round($ranking->Points, 2); ?></td>
                    <td><?php echo $ranking->PilotFirstName; ?></td>
                    <td><?php echo $ranking->PilotLastName; ?></td>
                    <td class="text-center"><?php echo round($ranking->Ballet, 2); ?></td>
                    <td class="text-center"><?php echo round($ranking->BalletTricks, 2); ?></td>
                    <td class="text-center"><?php echo round($ranking->Style, 2); ?></td>
                    <td class="text-center"><?php echo round($ranking->ImposedTricks, 2); ?></td>
                    <td class="text-center"><?php echo round($ranking->FreeExpression, 2); ?></td>
                    <td class="text-center"><?php echo round($ranking->Percentage, 2); ?></td>
                    <td class="text-center"><?php echo anchor('Score/viewDetailedResult/' . $ranking->ID, '<i class="fa fa-eye fa-fw"></i> ' . $this->lang->line("view"), 'class="btn btn-info"'); ?></td>
                </tr>
            <?php }
            ?>
        </table>
    </div>
<?php } else {
    ?>
    <div><?php echo $this->lang->line("no_rankings_to_show"); ?></div>
<?php } ?>