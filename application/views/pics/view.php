<?php
$this->load->view($this->config->item('theme').'header');
?>

<link rel="stylesheet" type="text/css" href="http://localhost/sammchaney.com/itc260/public/css/main.css">

<h2><?php echo $title ?></h2>
<div id = "form">
<?php
    // Open form and set URL for submit form
    echo form_open("pics/custom_submit");
    $data = array(
        'id' => 'tag',
        'name' => 'tag'
    );
    echo form_input($data);
    echo form_submit('submit','Search Custom Tag');
    echo form_close();
?>

</div><!-- form -->
<div id="examples">
<a href = "<?php echo base_url(); ?>/pics/seattle">Seattle</a>
<a href = "<?php echo base_url(); ?>/pics/polar_bears">Polar Bears</a>
<a href = "<?php echo base_url(); ?>/pics/lamps">Lamps</a>
<a href = "<?php echo base_url(); ?>/pics/wine">Wine</a>
<a href = "<?php echo base_url(); ?>/pics/video_games">Video Games</a>
<a href = "<?php echo base_url(); ?>/pics/latte_art">Latte Art</a>
<a href = "<?php echo base_url(); ?>/pics/brecht">Brecht</a>
</div><!-- examples -->


<?php echo print_r($html_pics); ?>

<?php $this->load->view($this->config->item('theme').'footer'); ?>
