<?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
    <?= $this->render('task/dropdown', array('task' => $task, 'redirect' => isset($redirect) ? $redirect : '')) ?>
<?php else: ?>
    <strong><?= '#'.$task['id'] ?></strong>
<?php endif ?>
