<?php


namespace App\Services\Html\Supply;


use App\Services\Html\RowHtml;

class Html
{
    protected $rowHtml;
    protected $label;

    public function __construct(RowHtml $rowHtml)
    {
        $this->rowHtml = $rowHtml;
        $this->label = trans('validation.attributes');
    }
}
