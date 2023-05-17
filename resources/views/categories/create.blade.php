@extends('layouts.app')

@section('title', __('Add Category'))

@section('content')

    @include('common-components.errors')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>{{__('Add Category')}}</h3>
                </div>

            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('common-components.flash')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            {!! Form::open(['route' => 'categories.store', 'files' => true, 'class'=>'needs-validation', 'enctype'=>'multipart/form-data', 'novalidate']) !!}

                            @include('categories.fields')

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
