<div class="table-list-header">
    <div class="table-list-header-count">
    <b>
        <?php if ($paginator->getTotal() > 1): ?>
            <?= t('%d tasks', $paginator->getTotal()) ?>
        <?php else: ?>
            <?= t('%d task', $paginator->getTotal()) ?>
        <?php endif ?>
    </b>
    </div>
    <div class="list-item-links">
        <a href="<?= $this->url->href('ExportController', 'export', ['plugin' => 'TableView', 'project_id' => $project['id'], 'count' => $paginator->getTotal()]) ?>"><?= t('Export All') ?></a>
    </div>
    <?php if (isset($show_items_selection)): ?>
        <?php if ($this->user->hasProjectAccess('TaskModificationController', 'save', $project['id'])): ?>
            <div class="list-item-links">
                <a href="#" data-list-item-selection="all"><?= t('Select All') ?></a> / <a href="#" data-list-item-selection="none"><?= t('Unselect All') ?></a>
            </div>
            <div class="list-item-actions list-item-action-hidden">
                -&nbsp;
                <div class="dropdown">
                    <a href="#" class="dropdown-menu dropdown-menu-link-icon"><strong><?= t('Apply action') ?> <i class="fa fa-caret-down"></i></strong></a>
                    <ul>
                        <li>
                            <a href="<?= $this->url->href('TaskBulkMoveColumnController', 'show', ['project_id' => $project['id']]) ?>" data-list-item-action="modal"><?= t('Move selected tasks to another column') ?></a>
                        </li>
                        <li>
                            <a href="<?= $this->url->href('TaskBulkChangePropertyController', 'show', ['project_id' => $project['id']]) ?>" data-list-item-action="modal"><?= t('Edit tasks in bulk') ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        <?php endif ?>
    <?php endif ?>
    <div class="table-list-header-menu">
        <span><?= array_search($order, $all_sorts).": ".t($direction) ?></span><?= $this->render('TableView:table_view/sort_menu', array('paginator' => $paginator, 'all_sorts' => $all_sorts,)) ?>
    </div>
</div>
