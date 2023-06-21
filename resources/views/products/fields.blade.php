<!-- Name Field -->
<div class="form-group col-sm-6 mt-2">
    {!! Form::label('name', 'Nazwa:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Category id Field -->
<div class="form-group col-sm-6 mt-2">
    {!! Form::label('category_id', 'Kategoria:') !!}
    {!! Form::select('category_id', [null => '-- Wybierz kategorię --'] + $allCategories, null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6 mt-2">
    {!! Form::label('stock', 'Stan Magazynowy:') !!}
    {!! Form::number('stock', null, ['class' => 'form-control','step' => 0.1]) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6 mt-2">
    <label class="checkbox-inline">
        {!! Form::hidden('is_active', 0) !!}
        {!! Form::checkbox('is_active', '1', null, ['id'=>'is_active']) !!}
    </label>
    {!! Form::label('is_active', 'Aktywny') !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 mt-4">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('products.index') }}" class="btn btn-secondary">{{__('Back')}}</a>
</div>
