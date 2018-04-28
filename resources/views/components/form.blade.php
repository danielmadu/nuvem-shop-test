<div class="form-group @hasErrorClass('nickname')">
    {!! app()->form->label('nickname', 'Nickname') !!}
    {!! app()->form->text('nickname', null, ['class' => 'form-control', 'placeholder' => 'Nickname...', 'autofocus' => 'true']) !!}
    <span>@errorBlock('nickname')</span>
</div>

<div class="form-group @hasErrorClass('real_name')">
    {!! app()->form->label('real_name', 'Real name') !!}
    {!! app()->form->text('real_name', null, ['class' => 'form-control', 'placeholder' => 'Real name...']) !!}
    <span>@errorBlock('real_name')</span>
</div>

<div class="form-group @hasErrorClass('origin_description')">
    {!! app()->form->label('origin_description', 'Origin description') !!}
    {!! app()->form->textArea('origin_description', null, ['class' => 'form-control', 'placeholder' => 'Origin description...']) !!}
    <span>@errorBlock('origin_description')</span>
</div>

<div class="form-group @hasErrorClass('superpowers')">
    {!! app()->form->label('superpowers', 'Superpowers') !!}
    {!! app()->form->textArea('superpowers', null, ['class' => 'form-control', 'placeholder' => 'Superpowers...']) !!}
    <span>@errorBlock('superpowers')</span>
</div>

<div class="form-group @hasErrorClass('catch_phrase')">
    {!! app()->form->label('catch_phrase', 'Catch phrase') !!}
    {!! app()->form->text('catch_phrase', null, ['class' => 'form-control', 'placeholder' => 'Catch phrase...']) !!}
    <span>@errorBlock('catch_phrase')</span>
</div>

@include('components.upload')