<?php

namespace Kanboard\Plugin\TableView\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Plugin\TableView\Controller\TableViewController;

class ExportController extends BaseController
{
    private function getData($tasks){
        $results = array();

        if (!empty($tasks) && !empty($tasks[0])){
            $results[] = array_keys($tasks[0]);
            
            foreach ($tasks as &$task) {
                $row = array();
                foreach ($task as &$value){
                    if (gettype($value) == "array"){
                        $row[] = json_encode($value, JSON_UNESCAPED_UNICODE);
                    }
                    else{
                        $row[] = $value;
                    }
                }
                $results[] = $row;
            }
        }

        return $results;
    }

    public function export(){
        $count = (int)$this->request->getStringParam('count');
        $project_id = (int)$this->request->getStringParam('project_id');
        $project = $this->getProject($project_id);
        $search = $this->helper->projectHeader->getSearchQuery($project);
        list($order, $direction) = $this->userSession->getListOrder($project_id);
        
        $paginator = $this->helper->tableDataHelper->getPaginator($project_id, $search, $count, $order, $direction);
        $tasks = $paginator->getCollection();
        $data = $this->getData($tasks);
        
        $this->response->withFileDownload('tasks.csv');
        $this->response->csv($data);
    }
}
