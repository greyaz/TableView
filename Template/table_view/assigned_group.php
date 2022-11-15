<?php if ($task['assigned_groupname']): ?>
    <span class="assigned-group" style="background-color: #<?= $this->task->groupColorExtension->getGroupColor($task['assigned_groupname']) ?>; color:<?= $this->task->groupColorExtension->getFontColor($this->task->groupColorExtension->getGroupColor($task['assigned_groupname'])) ?>;"><?= $this->text->e($task['assigned_groupname'] ?: $task['owner_gp']) ?></span>
<?php endif ?>
