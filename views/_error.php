<?php

$this->title = $exception->getCode();
?>

<h2>Error: <?php echo $exception->getCode() ?> - <?php echo $exception->getMessage() ?></h2>