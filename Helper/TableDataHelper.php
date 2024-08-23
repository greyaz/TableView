<?php
namespace Kanboard\Plugin\TableView\Helper;

use Kanboard\Core\Base;
use Kanboard\Filter\TaskProjectFilter;

class TableDataHelper extends Base
{
    public function getPaginator($project_id, $search, $amount, $order, $direction)
    {
        return  $this->paginator
                    ->setUrl('TableViewController', 'show', array(
                        'project_id' => $project_id, 
                        'search'        => $search, 
                        'plugin'        => 'TableView',
                        'csrf_token' => $this->token->getReusableCSRFToken()
                    ))
                    ->setMax($amount)
                    ->setOrder($order)
                    ->setDirection($direction)
                    ->setFormatter($this->taskListSubtaskFormatter)
                    ->setQuery($this->taskLexer
                        ->build($search)
                        ->withFilter(new TaskProjectFilter($project_id))
                        ->getQuery()
                    )
                    ->calculate();
    }

    
}
