<?php echo validation_errors(); ?>
<?php echo form_open('Todo/modifier/'.$id);?>
<div>
    Ordre : <input type="text" name="ordre" value="<?php echo $this->input->post('ordre');?>"/>
    Tache : <input type="text" name="tache" value="<?php echo $this->input->post('tache');?>"/>
</div>
<button type="submit">Modifier</button>
<?php echo form_close(); ?>