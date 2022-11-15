<span class="<?= $task['is_active'] == 0 ? 'status-closed' : '' ?>"><?= $this->url->link($this->text->e($task['title']), 'TaskViewController', 'show', array('task_id' => $task['id'])) ?></span>
