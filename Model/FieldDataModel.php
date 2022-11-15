<?php
namespace Kanboard\Plugin\TableView\Model;

use Kanboard\Core\Base;

class FieldDataModel extends Base
{
    private $defaultNames;

    public function __construct($c)
    {
        parent::__construct($c);
        $this->defaultNames = array(
            "::ASSIGNEE" => array("name" => t("Assignee"), "sort" => "assignee_name"),
            "::CATEGORY" => array("name" => t("Category"), "sort" => "category_name"),
            "::COLUMN" => array("name" => t("Column"), "sort" => "column_name"),
            "::DUE_DATE" => array("name" => t("Due date"), "sort" => \Kanboard\Model\TaskModel::TABLE.".date_due"),
            "::PRIORITY" => array("name" => t("Priority"), "sort" => \Kanboard\Model\TaskModel::TABLE.".priority"),
            "::POSITION" => array("name" => t("Position"), "sort" => \Kanboard\Model\TaskModel::TABLE.".position"),
            "::REFERENCE" => array("name" => t("Reference"), "sort" => \Kanboard\Model\TaskModel::TABLE.".reference"),
            "::START_DATE" => array("name" => t("Start date"), "sort" => \Kanboard\Model\TaskModel::TABLE.".date_started"),
            "::SUBTASK_NUMBER" => array("name" => t("Subtask"), "sort" => ""),
            "::SWIMLANE" => array("name" => t("Swimlane"), "sort" => "swimlane_name"),
            "::TAG" => array("name" => t("Tag"), "sort" => ""),
            "::TASK_ID" => array("name" => t("Task ID"), "sort" => \Kanboard\Model\TaskModel::TABLE.".id"),
            "::TITLE" => array("name" => t("Title"), "sort" => \Kanboard\Model\TaskModel::TABLE.".title"),
            "::ASSIGNED_GROUP" => array("name" => t("Assigned Group"), "sort" => ""),
            "::OTHER_ASSIGNEES" => array("name" => t("Other Assignees"), "sort" => ""),
        );
    }

    public function getName($field){
        if (!empty($GLOBALS["configs"]["CUSTOMIZED_FIELD_NAMES"][$field])){
            return $GLOBALS["configs"]["CUSTOMIZED_FIELD_NAMES"][$field];
        }
        if (!empty($this->defaultNames[$field])){
            return $this->defaultNames[$field]["name"];
        }
        $splited = explode("::METAMAGIK::", $field);
        if ($splited[0] != $field){
            return str_replace("_", "  ", $splited[1]);
        }
        return $field;
    }

    public function getAllSorts(){
        $sortList = array();
        foreach($this->defaultNames as $key => $value){
            $sortList[$this->getName($key)] = $this->defaultNames[$key]["sort"];
        }
        return $sortList;
    }
}

