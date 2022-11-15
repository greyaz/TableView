<?php

namespace Kanboard\Plugin\TableView;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        if(file_exists("plugins/TableView/config.php"))
        {
            global $configs;
            require_once('plugins/TableView/config.php');

            $this->template->hook->attach('template:project-header:view-switcher', 'TableView:project_header/views');
            $this->hook->on('template:layout:css', array('template' => 'plugins/TableView/Asset/main.css'));
            $this->hook->on('template:layout:js', array('template' => 'plugins/TableView/Asset/main.js'));

            if (!isset($configs["HIDE_LIST_VIEW"]) || $configs["HIDE_LIST_VIEW"] === true)
            {
                $this->hook->on('template:layout:js', array('template' => 'plugins/TableView/Asset/hide-list.js'));
            }
        }
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginName()
    {
        return 'TableView';
    }

    public function getPluginDescription()
    {
        return t('A Kanboard plugin that provides a table view of tasks in your project.');
    }

    public function getPluginAuthor()
    {
        return 'Greyaz';
    }

    public function getPluginVersion()
    {
        return '0.1.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/greyaz/TableView';
    }
}

