<?php

abstract class BaseMetaBox
{
    /**
     * @var string
     */
    /**
     * @var string
     */
    /**
     * @var string
     */
    /**
     * @var string
     */
    /**
     * @var string
     */
    /**
     * @var string
     */
    protected string $id,
                     $title,
                     $callback,
                     $context = 'normal',
                     $priority = 'default';
    protected array  $screen;
    /**
     *
     */
    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'add_meta_box']);
        add_action('save_post', [$this, 'save_meta_box']);
    }


    /**
     * @return void
     */
    public function add_meta_box() : void
    {
        add_meta_box(
            id: $this->id,
            title: $this->title,
            callback: [$this, 'layout'],
            screen: $this->screen
        );
    }

    /**
     * @return void
     * @param $post_id
     */
    abstract public function save_meta_box($post_id) : void;

    /**
     * @return void
     * @param $post
     */
    abstract public function layout($post) : void;

}