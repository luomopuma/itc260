<?php
$this->load->view($this->config->item('theme').'header');
?>
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/create'); ?>

    <label for="title">Title</label>
    <input type="input" name="title" /><br />

    <label for="text">Text</label>
    <textarea name="text"></textarea><br />

    <input type="submit" name="submit" value="Create news item" />

</form>
<a href="https://github.com/luomopuma/itc260">Source Code</a>

<?php $this->load->view($this->config->item('theme').'footer'); ?>