<?php

abstract class BaseSetting
{
    protected mixed $args = [],
                    $option_name,
                    $option_group,
                    $section_id,
                    $section_title,
                    $section_callback,
                    $field_id,
                    $field_title,
                    $field_callback,
                    $field_section;

    public function __construct()
    {
        add_action('init', [$this, 'register_setting']);
    }

    public function register_setting() : void
    {
        register_setting(
            option_group: $this->option_group, option_name: $this->option_name, args: $this->args
        );
        add_settings_section(
            $this->section_id,
            $this->section_title,
            [$this, 'title'],
            $this->option_group);
        add_settings_field(
            id: $this->field_id,
            title: $this->field_title,
            callback: [$this, 'layout'],
            page: $this->option_group,
            section: $this->field_section
        );
    }

    abstract public function title();
    abstract public function layout();
}