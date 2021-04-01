<?php


namespace App\Services\Html\Supply;

class UsersForm extends Html
{
    public function html($parameter)
    {
        return $this->rowHtml->startForm(['action' => route('users.store'), 'method' => 'post'])
            ->startDiv(['class' => 'row'])
            ->startDiv(['class' => 'col'])
            ->label($this->label['username'])
            ->input('text', ['class' => 'form-control', 'name' => 'username',])
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($this->label['name'])
            ->input('text', ['class' => 'form-control', 'name' => 'name',])
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($this->label['email'])
            ->input('text', ['class' => 'form-control', 'name' => 'email'])
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($this->label['password'])
            ->input('password', ['class' => 'form-control', 'name' => 'password'])
            ->endDiv()
            ->endDiv()
            ->startDiv(['class'=>'row'])
            ->startDiv(['class' => 'col'])
            ->label('پروژه')
            ->select($parameter['projects'],['class'=>'form-control select2','multiple'=>'multiple','name'=>'project_id[]'])
            ->endDiv()
            ->endDiv()
            ->startDiv(['class' => 'row'])
            ->startDiv(['class' => 'col'])
            ->label($this->label['roles'])
            ->select($parameter['roles'], ['class' => 'form-control select2', 'name' => 'roles'])
            ->endDiv()
            ->endDiv()
            ->br()
            ->startDiv(['class' => 'row'])
            ->startDiv(['class' => 'col'])
            ->button(['class' => 'btn btn-info request-ajax-form'], trans('button.create-user'))
            ->endDiv()
            ->endDiv()
            ->endForm()->getHtml();
    }
}
