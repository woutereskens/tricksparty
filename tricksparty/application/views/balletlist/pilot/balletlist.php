<ol class="breadcrumb">
    <li><?php echo anchor('Competition/viewCompetitions/', 'Home'); ?></li>
    <li><?php echo anchor('Competition/viewCompetitions/', $active); ?></li>
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
            <div class="col-md-2"> <strong><?php echo $this->lang->line("location"); ?></strong></div>
            <div class="col-md-10"><?php echo $competition->Location; ?></div>
        </div>
        <div class="row">
            <div class="col-md-2"><strong><?php echo $this->lang->line("date"); ?></strong></div>
            <div class="col-md-10"><?php echo $competition->Date; ?></div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h2 class="text-center"><?php echo $this->lang->line("balletlist_a"); ?></h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th class="text-center"><?php echo $this->lang->line("position"); ?></th>
                    <th class="text-center"><?php echo $this->lang->line("trick"); ?></th>
                </tr>
                <?php
                $counter = 0;
                foreach ($balletlistsA as $balletlistA) {
                    $counter++;
                    ?>
                    <tr>
                        <td class="text-center">
                            <?php echo $counter; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $balletlistA->Trick->Trick . ' (' . $balletlistA->Trick->TrickGroup . ')'; ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <h2 class="text-center"><?php echo $this->lang->line("balletlist_b"); ?></h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th class="text-center"><?php echo $this->lang->line("position"); ?></th>
                    <th class="text-center"><?php echo $this->lang->line("trick"); ?></th>
                </tr>
                <?php
                $counter = 0;
                foreach ($balletlistsB as $balletlistB) {
                    $counter++;
                    ?>
                    <tr>
                        <td class="text-center">
                            <?php echo $counter; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $balletlistB->Trick->Trick . ' (' . $balletlistB->Trick->TrickGroup . ')'; ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

