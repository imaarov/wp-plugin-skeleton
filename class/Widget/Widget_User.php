<?php
include_once 'Base/BaseWidget.php';
class Widget_User extends BaseWidget
{

    public function __construct()
    {
        $this->ID          = 'my_widget';
        $this->widget_name = 'user data';
        parent::__construct();
    }

    public function layout(): void
    {
        // TODO: Implement layout() method.
        echo "My Widget";
    }
}