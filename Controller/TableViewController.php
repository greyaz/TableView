<?php

namespace Kanboard\Plugin\TableView\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Filter\TaskProjectFilter;
use Kanboard\Plugin\TableView\Model\FieldDataModel;

class TableViewController extends BaseController
{
    private $fieldDataModel;

    public function __construct($c)
    {
        parent::__construct($c);
        $this->fieldDataModel = new FieldDataModel($c);
    }

    public function show()
    {
        $project = $this->getProject();
        $search = $this->helper->projectHeader->getSearchQuery($project);

        if ($this->request->getStringParam('direction') !== '' ||
            $this->request->getStringParam('order') !== '') {
            $this->checkReusableGETCSRFParam();
        }

        list($order, $direction) = $this->userSession->getListOrder($project['id']);
        $direction = $this->request->getStringParam('direction', $direction);
        $order = $this->request->getStringParam('order', $order);
        $this->userSession->setListOrder($project['id'], $order, $direction);

        $paginator = $this->paginator
            ->setUrl('TableViewController', 'show', array(
                'project_id' => $project['id'], 
                'search'        => $search, 
                'plugin'        => 'TableView',
                'csrf_token' => $this->token->getReusableCSRFToken()
            ))
            ->setMax(30)
            ->setOrder($order)
            ->setDirection($direction)
            ->setFormatter($this->taskListSubtaskFormatter)
            ->setQuery($this->taskLexer
                ->build($search)
                ->withFilter(new TaskProjectFilter($project['id']))
                ->getQuery()
            )
            ->calculate();

        $fieldNames = array();
        foreach($GLOBALS["configs"]["TABLE_FIELDS"] as $field){
            $fieldNames[] = $this->fieldDataModel->getName($field);
        }
        
        $this->response->html($this->helper->layout->app('TableView:project_dashboard/show', array(
            'project' => $project,
            'title' => $project["name"],
            'description' => $this->helper->projectHeader->getDescription($project),
            'paginator'   => $paginator,
            'fields' => $GLOBALS["configs"]["TABLE_FIELDS"],
            'field_names' => $fieldNames,
            'order' => $order,
            'direction' => $direction,
            'all_sorts' => $this->fieldDataModel->getAllSorts(),
        )));
    }
}

