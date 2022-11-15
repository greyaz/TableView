<?php if (! empty($task['category_id'])): ?>
    <span class="table-list-category <?= $task['category_color_id'] ? "color-{$task['category_color_id']}" : '' ?>">
    <?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
        <?= $this->url->link(
            $this->text->e($task['category_name']),
            'TaskModificationController',
            'edit',
            array('task_id' => $task['id']),
            false,
            'js-modal-medium' . (! empty($task['category_description']) ? ' tooltip' : ''),
            t('Change category')
        ) ?>
        <?php if (! empty($task['category_description'])): ?>
            <?= $this->app->tooltipMarkdown($task['category_description']) ?>
        <?php endif ?>
    <?php else: ?>
        <?= $this->text->e($task['category_name']) ?>
    <?php endif ?>
    </span>
<?php endif ?>
