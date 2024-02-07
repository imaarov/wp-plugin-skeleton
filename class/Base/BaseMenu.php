<?php
abstract class BaseMenu implements BaseInterface
{
    protected string $page_title,
                     $menu_title,
                     $capability = 'manage_options',
                     $menu_slug,
                     $callback;
    protected bool $has_sub_menu = false;
    protected array $sub_menu_items = [];

    public function __construct()
    {
        add_action('admin_menu', [$this, 'add_menu_page']);
    }

    public function add_menu_page()
    {
        add_menu_page(
            page_title:  $this->page_title,
            menu_title:  $this->menu_title,
            capability:  $this->capability,
            menu_slug:   $this->menu_slug,
            callback:    [$this, 'index']
        );
        if ($this->has_sub_menu) {
            foreach ($this->sub_menu_items as $sub_menu_item) {
                add_submenu_page(
                    $sub_menu_item['parent_slug'],
                    $sub_menu_item['page_title'],
                    $sub_menu_item['menu_title'],
                    $sub_menu_item['capability'] ?? $this->capability,
                    $sub_menu_item['menu_slug'],
                    [$this, $sub_menu_item['callback']],
                );
            }
        }
    }

    abstract public function index();
}