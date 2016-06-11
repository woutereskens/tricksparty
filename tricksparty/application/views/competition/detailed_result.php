<ol class="breadcrumb">
    <li><?php echo anchor('Competition/viewCompetitions/', 'Home'); ?></li>
    <li><?php echo anchor('Competition/viewCompetitions/', $this->lang->line("competitions")); ?></li>
    <li><?php echo anchor('Score/viewRanking/' . $detailed_result->Location . '/' . $detailed_result->Date, $this->lang->line("ranking")); ?></li>
    <li class="active"><?php echo $current; ?></li>
</ol>
<div class="page-header">
    <h2><?php echo $current; ?></h2>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $this->lang->line("pilot_info"); ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-3"> <strong><?php echo $this->lang->line("first_name"); ?></strong></div>
                    <div class="col-sm-7"><?php echo $detailed_result->PilotFirstName; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3"><strong><?php echo $this->lang->line("last_name"); ?></strong></div>
                    <div class="col-sm-7"><?php echo $detailed_result->PilotLastName; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3"><strong><?php echo $this->lang->line("email_address"); ?></strong></div>
                    <div class="col-sm-7"><?php echo $detailed_result->PilotEmailAddress; ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $this->lang->line("competition_info"); ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-2"> <strong><?php echo $this->lang->line("location"); ?></strong></div>
                    <div class="col-lg-10"><?php echo $detailed_result->Location; ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-2"><strong><?php echo $this->lang->line("date"); ?></strong></div>
                    <div class="col-lg-10"><?php echo $detailed_result->Date; ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-2"><strong><?php echo $this->lang->line("number_of_judges"); ?></strong></div>
                    <div class="col-lg-10"><?php echo $detailed_result->NumberOfJudges; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<h3 class="page-header"><?php echo $this->lang->line("detailed_result"); ?></h3>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th class="text-center"><?php echo $this->lang->line('rank'); ?></th>
            <th class="text-center"><?php echo $this->lang->line('points'); ?></th>
            <th class="text-center"><?php echo $this->lang->line('ballet'); ?></th>
            <th class="text-center"><?php echo $this->lang->line('ballet_tricks'); ?></th>
            <th class="text-center"><?php echo $this->lang->line('artistic'); ?></th>
            <th class="text-center"><?php echo $this->lang->line('technical'); ?></th>
            <th class="text-center"><?php echo $this->lang->line('imposed_tricks'); ?></th>
            <th class="text-center"><?php echo $this->lang->line('free_expression'); ?></th>
            <th class="text-center"><?php echo $this->lang->line('percentage'); ?></th>
        </tr>
        <tr>
            <td class="text-center"><?php echo $detailed_result->Rank; ?></td>
            <td class="text-center"><?php echo round($detailed_result->Points, 2); ?></td>
            <td></td>
            <td class="text-center"><?php echo round($detailed_result->BalletTricks, 2); ?></td>
            <td class="text-center"><?php echo round($detailed_result->Artistic, 2); ?></td>
            <td class="text-center"><?php echo round($detailed_result->Technical, 2); ?></td>
            <td class="text-center"><?php echo round($detailed_result->ImposedTricks, 2); ?></td>
            <td class="text-center"><?php echo round($detailed_result->FreeExpression, 2); ?></td>
            <td class="text-center"><?php echo round($detailed_result->Percentage, 2); ?></td>
        </tr>
        <tr>
            <td></td>
            <td class="text-center"><?php echo $this->lang->line("per_judge"); ?></td>
            <td></td>
            <td class="text-center"><?php echo round($detailed_result->BalletTricksPerJudge, 2); ?></td>
            <td class="text-center"><?php echo round($detailed_result->ArtisticPerJudgeWithoutMultiplier, 2); ?></td>
            <td class="text-center"><?php echo round($detailed_result->TechnicalPerJudgeWithoutMultiplier, 2); ?></td>
            <td class="text-center"><?php echo round($detailed_result->ImposedTricksPerJudge, 2); ?></td>
            <td class="text-center"><?php echo round($detailed_result->FreeExpressionPerJudge, 2); ?></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td class="text-center"><?php echo $this->lang->line("part_total"); ?></td>
            <td></td>
            <td class="text-center"><?php echo round($detailed_result->BalletTricksPartTotal, 2); ?></td>
            <td class="text-center"><?php echo round($detailed_result->ArtisticPartTotal, 2); ?></td>
            <td class="text-center"><?php echo round($detailed_result->TechnicalPartTotal, 2); ?></td>
            <td class="text-center"><?php echo round($detailed_result->ImposedTricksPartTotal, 2); ?></td>
            <td class="text-center"><?php echo round($detailed_result->FreeExpressionPartTotal, 2); ?></td>
            <td></td>
        </tr>
    </table>
</div>
<blockquote>
    <p>
        Points are calculated like this: from right to left.<br/>
        Percentage shows how well you did, compared to the winner.<br/><br/>
        The Free Expression score (<?php echo $detailed_result->FreeExpression; ?>) is divided by <?php echo $detailed_result->NumberOfJudges; ?> (= number of judges),
        then take <?php echo $detailed_result->FreeExpressionPercentage; ?>% of that, <?php echo round($detailed_result->FreeExpressionPartTotal, 2); ?>.<br/>
        The Imposed Tricks score (<?php echo $detailed_result->ImposedTricks; ?>) is divided by <?php echo $detailed_result->NumberOfJudges; ?>,
        then take <?php echo $detailed_result->ImposedTricksPercentage; ?>% of that: <?php echo round($detailed_result->ImposedTricksPartTotal, 2); ?>.<br/>
        Style points consist of technical and artistic parts.<br/>
        The Technical score (<?php echo $detailed_result->Technical; ?>) is divided by <?php echo $detailed_result->NumberOfJudges; ?> and multiplied by
        <?php echo $detailed_result->TechnicalMultiplier; ?> (<?php echo round($detailed_result->TechnicalPerJudgeWithMultiplier, 2); ?>), then take
        <?php echo $detailed_result->TechnicalPercentage; ?>% of that: <?php echo round($detailed_result->TechnicalPartTotal, 2); ?>.<br/>
        The Artistic score (<?php echo $detailed_result->Artistic; ?>) is divided by <?php echo $detailed_result->NumberOfJudges; ?> and multiplied by
        <?php echo $detailed_result->ArtisticMultiplier; ?> (<?php echo round($detailed_result->ArtisticPerJudgeWithMultiplier, 2) ?>), then take
        <?php echo $detailed_result->ArtisticPercentage; ?>% of that: <?php echo round($detailed_result->ArtisticPartTotal, 2); ?>.<br/>
        The Ballet Tricks score (<?php echo $detailed_result->BalletTricks; ?>) is divided by <?php echo $detailed_result->NumberOfJudges; ?>, then take
        <?php echo $detailed_result->BalletTricksPercentage; ?>% of that: <?php echo round($detailed_result->BalletTricksPartTotal, 2); ?>.
    </p>
</blockquote>
<h3 class="page-header"><?php echo $this->lang->line("adding_it_all_up"); ?></h3>
<div class="row">
    <div class="table-responsive col-md-4">
        <table class="table table-bordered">
            <tr>
                <td><?php echo round($detailed_result->ImposedTricksPartTotal, 2) . ' (' . $this->lang->line("imposed_tricks") . ')'; ?></td>
            </tr>
            <tr>
                <td>+ <?php echo round($detailed_result->TechnicalPartTotal, 2) . ' (' . $this->lang->line("technical") . ')'; ?></td>
            </tr>
            <tr>
                <td>+ <?php echo round($detailed_result->ArtisticPartTotal, 2) . ' (' . $this->lang->line("artistic") . ')'; ?></td>
            </tr>
            <tr>
                <td>+ <?php echo round($detailed_result->BalletTricksPartTotal, 2) . ' (' . $this->lang->line("ballet_tricks") . ')'; ?></td>
            </tr>
            <tr>
                <td>+ <?php echo round($detailed_result->FreeExpressionPartTotal, 2) . ' (' . $this->lang->line("free_expression") . ')'; ?></td>
            </tr>
            <tr>
                <td>= <?php echo round($detailed_result->Points, 2); ?></td>
            </tr>
        </table>
    </div>
</div>
<h3 class="page-header"><?php echo $this->lang->line("average_per_judge"); ?></h3>
<div class="row">
    <div class="table-responsive col-md-4">
        <table class="table table-bordered">
            <col width="50%">
            <col width="50%">
            <tr>
                <th colspan="2"><?php echo $this->lang->line("imposed_tricks"); ?></th>
            </tr>
            <?php foreach ($imposed_tricks as $imposed_trick) { ?>
                <tr>
                    <td><?php echo $imposed_trick->Trick; ?></td>
                    <td><?php echo round($imposed_trick->ScorePerJudge, 2); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div class="row">
    <div class="table-responsive col-md-4">
        <table class="table table-bordered">
            <col width="50%">
            <col width="50%">
            <tr>
                <th colspan="2"><?php echo $this->lang->line("ballet_tricks"); ?></th>
            </tr>
            <?php foreach ($ballet_tricks as $ballet_trick) { ?>
                <tr>
                    <td><?php echo $ballet_trick->Trick; ?></td>
                    <td><?php echo round($ballet_trick->ScorePerJudge, 2); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<h3 class="page-header"><?php echo $this->lang->line("result_chart"); ?></h3>
<div id="myfirstchart" style="height: 250px;"></div>
