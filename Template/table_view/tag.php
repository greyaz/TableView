<?php foreach ($task['tags'] as $tag): ?>
    <span class="table-list-category task-list-tag <?= $tag['color_id'] ? "color-{$tag['color_id']}" : '' ?>">
        <?= $this->text->e($tag['name']) ?>
    </span>
<?php endforeach ?>
