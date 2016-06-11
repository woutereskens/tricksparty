<ol class="breadcrumb">
    <li><?php echo anchor('Competition/viewCompetitions/', 'Home'); ?></li>
    <li><?php echo anchor('Competition/viewCompetitions/', $active); ?></li>
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
<?php echo form_open('Balletlist/createBalletlist', array('role' => 'form')); ?>
<div class="row">
    <div class="col-md-6">
        <h3 class="text-center"><?php echo $this->lang->line("balletlist_a"); ?></h3>
        <div class="table-responsive">
            <table class="table">
                <col width="30%">
                <col width="70%">
                <tr>
                    <th class="text-center"><?php echo $this->lang->line("position"); ?></th>
                    <th class="text-center"><?php echo $this->lang->line("trick"); ?></th>
                </tr>
                <?php
                $counter = 0;
                foreach ($scoretypes as $scoretype) {
                    $counter++;
                    ?>
                    <tr>
                        <td class="text-center">
                            <label for="A<?php echo $scoretype->ScoreType; ?>"><?php echo $counter; ?></label>
                        </td>
                        <td class="text-center">
                            <select name="A<?php echo $scoretype->ScoreType; ?>" id="A<?php echo $scoretype->ScoreType; ?>" class="js-example-basic-single form-control" style="width: 100%">
                                <?php foreach ($trickgroups as $trickgroup) { ?>
                                    <optgroup label="<?php echo $this->lang->line("group") . ' ' . $trickgroup->TrickGroup; ?>">
                                        <?php foreach ($trickgroup->Tricks as $trick) { ?>
                                            <option value="<?php echo $trick->Trick; ?>" <?php echo set_select('A' . $scoretype->ScoreType, $trick->Trick); ?>><?php echo $trick->Trick; ?></option>
                                        <?php } ?>
                                    </optgroup>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <h3 class="text-center"><?php echo $this->lang->line("balletlist_b"); ?></h3>
        <table class="table">
            <col width="30%">
            <col width="70%">
            <tr>
                <th class="text-center"><?php echo $this->lang->line("position"); ?></th>
                <th class="text-center"><?php echo $this->lang->line("trick"); ?></th>
            </tr>
            <?php
            $counter = 0;
            foreach ($scoretypes as $scoretype) {
                $counter++;
                ?>
                <tr>
                    <td class="text-center">
                        <label for="B<?php echo $scoretype->ScoreType; ?>"><?php echo $counter; ?></label>
                    </td>
                    <td class="text-center">
                        <select name="B<?php echo $scoretype->ScoreType; ?>" id="B<?php echo $scoretype->ScoreType; ?>" class="js-example-basic-single form-control"  style="width: 100%">
                            <?php foreach ($trickgroups as $trickgroup) { ?>
                                <optgroup label="<?php echo $this->lang->line("group") . ' ' . $trickgroup->TrickGroup; ?>">
                                    <?php foreach ($trickgroup->Tricks as $trick) { ?>
                                        <option value="<?php echo $trick->Trick; ?>" <?php echo set_select('B' . $scoretype->ScoreType, $trick->Trick); ?>><?php echo $trick->Trick; ?></option>
                                    <?php } ?>
                                </optgroup>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div><hr/></div>
<?php echo form_hidden('competitionID', $competition->ID); ?>
<!-- /.row -->
<div class="form-group">
    <button type="submit" class="btn btn-primary">
        <?php echo $this->lang->line("submit"); ?>
    </button>
    <?php echo anchor('Competition/viewCompetitions/', $this->lang->line("cancel"), ' class="btn btn-default"'); ?>
</div>
<!-- /.row -->
<?php form_close(); ?>

