<?php  if (count($faults) > 0) : ?>
  <div class="">
        <?php foreach ($faults as $error) : ?>
          <p><?php echo $error ?></p>
        <?php endforeach ?>
  </div>
<?php  endif ?>