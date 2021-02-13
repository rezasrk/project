<?php


namespace App\Services\Html;

class ManagementColumn
{

    /**
     * @var string
     */
    protected $action;

    /**
     * @var RowHtml
     */
    protected $rowHtml;

    public function __construct(RowHtml $rowHtml)
    {
        $this->rowHtml = $rowHtml;
    }

    /**
     * Section edit
     *
     * @param string $href
     * @param array $permission
     *
     * @return string
     */
    public function edit($href = '#', $permission = '')
    {
        $edit = $this->rowHtml->a(['title' => 'ویرایش', 'class' => 'text-info fa fa-pencil-alt edit-form','href'=>$href])->getHtml();

        if ($this->checkPermission($permission)) {
            $this->action .= $edit;
        }

        return $this;
    }

    /**
     * @param array $attribute
     * @param string $innerHtml
     * @param string $permission
     * @return string
     */
    public function customAction($attribute = [], $innerHtml = '', $permission = '')
    {
        $custom = $this->rowHtml->a($attribute, $innerHtml)->getHtml();

        if ($this->checkPermission($permission)) {
            $this->action .= $custom;
        }

        return $this;
    }

    public function getAction()
    {
        $action = $this->action;
        $this->action = '';
        return $action;
    }

    public function getRowHtml()
    {
        return $this->rowHtml;
    }

    /**
     * @param $permission
     * @return bool
     */
    protected function checkPermission($permission)
    {
        return ($permission != '' && auth()->user()->can($permission)) || $permission == '';
    }
}
