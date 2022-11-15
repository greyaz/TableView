<div class="dropdown">
    <a href="#" class="dropdown-menu dropdown-menu-link-icon"><strong><?= t('Sort') ?> <i class="fa fa-caret-down"></i></strong></a>
    <ul>
        <?php foreach ($all_sorts as $name => $sort): ?>
             <?php if (!empty($sort)): ?>
                <li>
                    <?= $paginator->order($name, $sort) ?>
                </li>
            <?php endif ?>
        <?php endforeach ?>
    </ul>
</div>
