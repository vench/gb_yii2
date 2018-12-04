<?php



/* @var $events \app\models\UserEvent[] */

?>

<div>
    <h1>My events</h1>

    <?php foreach ($events as $event): ?>

        <div>
           <h3><?php echo $event->name ?></h3>
            <p><?php echo $event->description ?></p>
        </div>

    <?php endforeach; ?>

</div>
