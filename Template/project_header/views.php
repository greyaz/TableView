<li <?= $this->app->checkMenuSelection('TableViewController') ?>>
    <?= $this->url->icon('table', t('Table'), 'TableViewController', 'show', 
        array(
            'project_id'    => $project['id'], 
            'search'        => $filters['search'], 
            'plugin'        => 'TableView'
        ), 
        false,
        "table-view",
        t('Keyboard shortcut: "%s"', 'v t')
    ) ?>
</li>

