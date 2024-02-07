<?php
abstract class BaseCustomPostType implements BaseInterface
{
    protected array  $labels             = [],
                     $rewrite            = [ 'slug' => 'book' ],
                     $supports           = ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ];
    protected bool   $public             = true,
                     $publicly_queryable = true,
                     $show_ui            = true,
                     $show_in_menu       = true,
                     $query_var          = true,
                     $has_archive        = true,
                     $hierarchical       = false;
    protected mixed  $menu_position      = null;
    protected string $capability_type = 'post',
                     $post_type_key;

    public function __construct()
    {
        add_action('init', [$this, 'register_custom_post_type']);
    }

    public function register_custom_post_type() : void
    {
        $args = array(
            'labels'             => $this->labels,
            'public'             => $this->public,
            'publicly_queryable' => $this->publicly_queryable,
            'show_ui'            => $this->show_ui,
            'show_in_menu'       => $this->show_in_menu,
            'query_var'          => $this->query_var,
            'rewrite'            => $this->rewrite,
            'capability_type'    => $this->capability_type,
            'has_archive'        => $this->has_archive,
            'hierarchical'       => $this->hierarchical,
            'menu_position'      => $this->menu_position,
            'supports'           => $this->supports,
        );
        register_post_type($this->post_type_key, $args);
    }
}