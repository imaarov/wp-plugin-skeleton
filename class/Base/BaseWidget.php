<?php
abstract class BaseWidget implements BaseInterface
{
    protected mixed $ID,
                    $widget_name,
                    $callback;

    public function __construct()
    {
            add_action('wp_dashboard_setup', [$this, 'register_widget']);
    }

    public function register_widget() : void
    {
        wp_add_dashboard_widget(
            widget_id: $this->ID,
            widget_name: $this->widget_name,
            callback: [$this, 'layout']
        );
    }

    abstract public function layout() : void;
}