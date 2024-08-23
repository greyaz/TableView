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
        
        $req_direction = $this->request->getStringParam('direction');
        $req_order = $this->request->getStringParam('order');
        if (!empty($req_direction) || !empty($req_order)) {
            $this->checkReusableGETCSRFParam();
        }

        list($order, $direction) = $this->userSession->getListOrder($project['id']);
        if (!empty($req_direction)){
            $direction = $req_direction;
        }
        if (!empty($req_order)){
            $order = $req_order;
        }
        $this->userSession->setListOrder($project['id'], $order, $direction);

        $paginator = $this->helper->tableDataHelper->getPaginator($project['id'], $search, 30, $order, $direction);
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

