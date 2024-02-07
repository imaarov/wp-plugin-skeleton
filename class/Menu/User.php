<?php
class User extends BaseMenu
{
    public function __construct()
    {
        $this->page_title = 'mange users page';
        $this->menu_title = 'manage users';
        $this->menu_slug  = 'manage_users';
        $this->has_sub_menu = true;
        $this->sub_menu_items = [
            'add_user' => ['parent_slug' => $this->menu_slug, 'page_title' => 'add user page', 'menu_title' => 'adding user', 'menu_slug' => 'add_user', 'callback' => 'add_user']
        ];
        parent::__construct();
    }

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function add_user() : void
    {
        echo "<h1>Add user</h1>";
    }
}
