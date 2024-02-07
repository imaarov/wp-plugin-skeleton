<?php
include_once 'Base/BaseSetting.php';
class GatePay_Setting extends BaseSetting
{
    public function __construct()
    {
        $this->option_group     = 'general';
        $this->option_name      = '_merchant_id';
        $this->args             = [
            'type'              => 'string',
            'sanitize_callback' => 'sanitize_textfield',
            'default'           => null
        ];
        $this->section_id       = 'merchant_id_section';
        $this->section_title    = 'merchant id';
        $this->section_callback = 'title';
        $this->field_id         = 'merchant_ID_field';
        $this->field_title      = 'merchant id key';
        $this->field_callback   = 'layout';
        $this->field_section    = $this->section_id;

        parent::__construct();
    }

    public function title()
    {
        // TODO: Implement title() method.
    }

    public function layout()
    {
        // TODO: Implement layout() method.
    }
}