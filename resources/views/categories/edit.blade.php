@extends('layouts.app')

@section('title', __('Edit Category'))

@section('content')

    @include('common-components.errors')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>{{ __('Edit Category') }}</h3>
                </div>

            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch', 'files' => true, 'novalidate', 'enctype'=>'multipart/form-data', 'class'=>'needs-validation']) !!}

                            @include('categories.fields')

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
