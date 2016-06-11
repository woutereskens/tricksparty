<ol class="breadcrumb">
    <li><?php echo anchor('Competition/viewCompetitions/', 'Home'); ?></li>
    <li class="active"><?php echo $current; ?></li>
</ol>
<div class="page-header">
    <h2><?php echo $current; ?></h2>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <?php
        $counter = 0;
        echo '<tr><th>#</th><th>' . $this->lang->line('trick') . '</th><th>' . $this->lang->line('group') . '</th></tr>';
        foreach ($tricks as $trick) {
            $counter += 1;

            echo '<tr><td>' . $counter . '</td>' . '<td>';
            echo $trick->Trick;
            echo '</td>';
            echo '<td>';
            echo $trick->TrickGroup;
            echo '</td></tr>';
        }
        ?>
    </table>
</div>