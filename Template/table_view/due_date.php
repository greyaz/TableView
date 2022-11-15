<?php if (! empty($task['date_due'])): ?>
    <span title="<?= t('Due date') ?>" class="task-date
        <?php if (time() > $task['date_due']): ?>
                task-date-overdue
        <?php elseif (date('Y-m-d') == date('Y-m-d', $task['date_due'])): ?>
                task-date-today
        <?php endif ?>
        ">
        <?= $this->dt->datetime($task['date_due']) ?>
    </span>
<?php endif ?>
