<?php echo validation_errors(); ?>
<?php echo form_open('Todo/Reordonner');?>
<?php ?>
<div>
    <?php $pas =10;?>
    <?php foreach($todos as $t) {
        ?>
    <br>
    Ordre : <input type="text" name="ordre[]" value="<?php  if(!isset($ordre)) { echo $pas;}  ;?>"/>
    <?php echo $t->task;?>
    <?php
    $pas = $pas+10;
    }
    ?>
</div>
<button type="submit">Reordonner</button>
<?php echo form_close(); ?>