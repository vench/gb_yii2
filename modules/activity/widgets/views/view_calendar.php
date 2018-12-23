<?php
/* @var $activities  \app\modules\activity\models\Activity[] */
/* @var $data \DateTime */

$first = $date->modify('first day of this month');
$firstDay = ($first->format('w') + 7) % 7;
$totalDay = $first->format('t');
$cellCount = ($firstDay + $totalDay + (7 - (($firstDay + $totalDay) % 7))) ;

?>
<table class="table table-bordered">

    <tr>
        <th>ПН</th>
        <th>ВТ</th>
        <th>СР</th>
        <th>ЧТ</th>
        <th>ПТ</th>
        <th>СБ</th>
        <th>ВС</th>
    </tr>
    <tr>
        <?php for($i = 1, $day = 1; $i <= $cellCount; $i ++ ): ?>
            <td> <?php if( $i >= $firstDay && $day <= $totalDay ):?>

                    <?php if(isset($activities[$day])): ?>

                           <!-- TODO тут нормальная ссылка -->
                           <?php foreach ($activities[$day] as $item): ?>
                                <?php echo $item->activity_name?>
                            <?php endforeach; ?>

                        <?php endif;?>


                    <?php  echo $day ++; ?>




            <?php endif; ?>
            </td>

            <?php if($i % 7 == 0):?>
    </tr>
    <tr>
            <?php endif; ?>

        <?php endfor; ?>
    </tr>
</table>
