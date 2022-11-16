# Table View
A [Kanboard](https://github.com/kanboard/kanboard) plugin that provides a table view of tasks in your project.   

![alt screenshot](Screenshot/1.png)

## Features
1. Hide orignal list view or not
2. Customizable table fields
3. Compatible with the plugins "Group_assigne" and "metaMagik"

## Getting started
1. Install from the Kanboard plugin manager directly. Or clone this repository to your plugin folder.
2. Copy and rename the file `config.default.php` to `config.php`, then edit it by following the instructions in the comments.

## Configuration Example
```php
<?php
/*
Hide the list view or not. Default: true
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
```

## Author
Greyaz

## License
License MIT
