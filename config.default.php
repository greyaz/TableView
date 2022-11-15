<?php
/*
Hide the default list view or not. Default: true
*/
$configs["HIDE_LIST_VIEW"] = true;

/*
The following keywords are supported by default:
::ASSIGNEE
::CATEGORY
::COLUMN
::DUE_DATE
::PRIORITY
::POSITION
::REFERENCE
::START_DATE
::SUBTASK_NUMBER
::SWIMLANE
::TAG
::TASK_ID
::TITLE

The following keywords are supported after installing the plugin "Group_assign":
::ASSIGNED_GROUP
::OTHER_ASSIGNEES

If the plugin "metaMagik" is installed, your custom field can be loaded via the prefix "::METAMAGIK::" with your field name. Example:
::METAMAGIK::expected_launch_date

The fields display in the table by the sequence in this array:
*/
$configs["TABLE_FIELDS"] = array(
    "::PRIORITY", "::TASK_ID", "::TITLE", "::CATEGORY", "::ASSIGNEE", "::OTHER_ASSIGNEES", "::START_DATE", "::DUE_DATE", "::METAMAGIK::expected_launch_date", "::COLUMN",
);

/*
Optional. Customize the names of the fields.
*/
$configs["CUSTOMIZED_FIELD_NAMES"] = array(
    "::COLUMN" => "Progress",
);
