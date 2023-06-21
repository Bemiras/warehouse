@extends('layouts.app')

@section('title', 'Dodaj Produkt')

@section('content')

    @include('common-components.errors')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Dodaj Produkt</h3>
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

                            {!! Form::open(['route' => 'products.store', 'files' => true, 'class'=>'needs-validation', 'enctype'=>'multipart/form-data']) !!}

                            @include('products.fields')

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
