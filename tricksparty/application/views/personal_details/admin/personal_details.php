<ol class="breadcrumb">
    <li><?php echo anchor('Competition/viewCompetitions/', 'Home'); ?></li>
    <li><?php echo anchor('Login/viewLogins', $active); ?></li>
    <li class="active"><?php echo $current; ?></li>
</ol>
<div class="page-header">
    <h2><?php echo $current; ?></h2>
</div>
<dl class="dl-horizontal">
    <dt><?php echo $this->lang->line("username"); ?></dt>
    <dd><?php echo $person->Username; ?></dd>
    <dt><?php echo $this->lang->line("first_name"); ?></dt>
    <dd><?php echo $person->FirstName; ?></dd>
    <dt><?php echo $this->lang->line("last_name"); ?></dt>
    <dd><?php echo $person->LastName; ?></dd>
    <dt><?php echo $this->lang->line("email_address"); ?></dt>
    <dd><?php echo $person->EmailAddress; ?></dd>
</dl>