<?php


namespace App\Services\Html\Supply;

class UsersEditForm extends Html
{
    public function html($parameter)
    {
        $user = $parameter['user'];

        return $this->rowHtml->startForm(['action' => route('users.update', $user->id), 'method' => 'post'])
            ->patch()
            ->startDiv(['class' => 'row'])
            ->startDiv(['class' => 'col'])
            ->label($this->label['username'])
            ->input('text', ['class' => 'form-control', 'name' => 'username','value'=>$user->username])
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($this->label['name'])
            ->input('text', ['class' => 'form-control', 'name' => 'name','value'=>$user->name])
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($this->label['email'])
            ->input('text', ['class' => 'form-control', 'name' => 'email','value'=>$user->email])
            ->endDiv()
            ->startDiv(['class' => 'col'])
            ->label($this->label['password'])
            ->input('password', ['class' => 'form-control', 'name' => 'password'])
            ->endDiv()
            ->endDiv()
            ->startDiv(['class'=>'row'])
            ->startDiv(['class' => 'col'])
            ->label('پروژه')
            ->select($parameter['projects'],['class'=>'form-control select2','multiple'=>'multiple','name'=>'project_id[]'],$parameter['userProject'])
            ->endDiv()
            ->endDiv()
            ->startDiv(['class' => 'row'])
            ->startDiv(['class' => 'col'])
            ->label($this->label['roles'])
            ->select(
                $parameter['roles'],
                [
                    'class' => 'form-control select2',
                     'name' => 'roles'
                ],
                optional($user->roles()->first())->name
            )
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
