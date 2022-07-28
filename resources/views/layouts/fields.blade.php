<!-- Content Field -->
<div class="form-group col-sm-6">
    <div class="form-group col-sm-12">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-12">
        {!! Form::label('layout_file', 'Layout file') !!}
        {!! Form::file('layout_file', ['class' => 'form-control']) !!}
    </div>
</div>


<!-- User Id Field -->
<!-- <div class="form-group col-sm-6">
{{--    {!! Form::label('user_id', 'User Id:') !!}--}}
{{--    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}--}}
</div> -->
