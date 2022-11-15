<section id="main">
    <?= $this->projectHeader->render($project, 'TableViewController', 'show', false, 'TableView') ?>
    <div class="sidebar-container">
        <div id="table-view" class="sidebar-content">
        <?php if ($paginator->isEmpty()): ?>
            <p class="alert"><?= t('No tasks found.') ?></p>
        <?php elseif (! $paginator->isEmpty()): ?>
            <?= $this->render('TableView:table_view/header', array(
                'paginator' => $paginator,
                'project'   => $project,
                'show_items_selection' => true,
                'order' => $order,
                'direction' => $direction,
                'all_sorts' => $all_sorts,
            )) ?>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <?php foreach ($field_names as $name): ?>
                            <th><?= $name ?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($paginator->getCollection() as $task): ?>
                        <?php
                            $metadata = array();
                            if ($task['nb_metadata'] > 0){
                                $custom_fields = $this->task->metadataTypeModel->getAllInScope($task['project_id']);
                                foreach ($custom_fields as $custom_field){
                                    if (!empty($this->task->taskMetadataModel->get($task['id'], $custom_field['human_name'], ''))){
                                        $metadata[$custom_field['human_name']] = $this->task->taskMetadataModel->get($task['id'], $custom_field['human_name'], '');
                                    }
                                }
                            }
                        ?>
                        <tr>
                            <td class="color-<?= $task['color_id'] ?>">
                                <?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])): ?>
                                    <input type="checkbox" data-list-item="selectable" name="tasks[]" value="<?= $task['id'] ?>">
                                <?php endif ?>
                            </td>
                            <?php foreach ($fields as $field): ?>
                                <?php $explodes = explode("::", $field); ?>
                                <?php if (count($explodes) == 3 && $explodes[1] === "METAMAGIK"): ?>
                                    <td><?= $this->render('TableView:table_view/meta_magik', array(
                                        'metadata' => $metadata,
                                        'key' => $explodes[2],
                                    )) ?></td>
                                <?php elseif (count($explodes) == 2): ?>
                                    <td><?= $this->render('TableView:table_view/'.strtolower($explodes[1]), array(
                                        'task' => $task,
                                        'show_items_selection' => true,
                                        'redirect' => 'list',
                                    )) ?></td>
                                <?php endif ?>
                            <?php endforeach ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?= $paginator ?>
        <?php endif ?>
        </div>
    </div>
</section>
