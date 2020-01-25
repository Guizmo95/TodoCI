<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title ?></title>
    </head>
    <body>
        <div class ="container">
            <h1>Todos</h1>
            <?php foreach ($todos as $todo): ?>
            <a href="<?php echo base_url('Todo/modifier/'.$todo->id)?>">Modifier</a>
            <a href="<?php echo base_url('Todo/supprimer/'.$todo->id);?>">supprimer</a>
                <?php echo $todo->task; ?> 
                <?php if($todo->completed == 1) { ?>
            <s><a href="<?php echo base_url('Todo/fait/'.$todo->id);?>">fait</a></s>
                    <br>
               <?php }
               else {?>
                   <a href="<?php echo base_url('Todo/fait/'.$todo->id);?>">fait</a>
                   <br>
        <?php  }

                ?>
            
          <?php   endforeach;?>
                   Il vous reste <?php echo $compl ?> tâches
                   <br> <a href="<?php echo base_url("Todo/Add")?>">Ajouter</a>
            <br><a href="<?php echo base_url("Todo/Reordonner")?>">Reordonner</a>
        </div><!--/.container -->
    </body>
</html>

