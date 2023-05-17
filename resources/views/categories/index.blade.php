@extends('layouts.app')

@section('title',   __('Categories'))

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Categories')}}</h1>
                </div>
                <div class="col-sm-6">

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
                            <div class="row mb-2">
                                <div class="col-md-10">
                                    <div class="form-inline float-md-end mb-3">
                                        <div class="ms-2">
                                            <div class="position-relative">
                                                <form action="{{ route('categories.index') }}" class="row row-cols-lg-auto gx-3 gy-2 align-items-end">
                                                    <div class="col-6">
                                                        {!! Form::text('filters[query]', $filters['query'] ?? null, ['id' => 'queryValue', 'class' => 'form-control rounded bg-light border-0 float-left', 'placeholder' => __('Search')]) !!}
                                                    </div>
                                                    <div class="col-6">
                                                        <button type="submit" class="btn btn-sm btn-secondary">
                                                            <i class="nav-icon fas fa-search" ></i>
                                                        </button>
                                                        @if (isset($filters['query']))
                                                            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-secondary waves-effect">{{__('Clear')}}</a>
                                                        @endif
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="mb-3 float-right">
                                        <a href="{!! route('categories.create') !!}" class="btn btn-success waves-effect waves-light"><i
                                                class="mdi mdi-plus me-2"></i> {{__('Add Category')}}</a>
                                    </div>
                                </div>
                            </div>

                            @include('categories.table')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


