<div class="row" data-toggle="buttons">
    <label class="btn btn-primary active col-md-5">
        <input type="radio" name="options" id="option1" autocomplete="off" checked>
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
    </label>
    <label class="btn btn-primary col-md-offset-1 col-md-5">
        <input type="radio" name="options" id="option2" autocomplete="off">
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
    </label>
</div>