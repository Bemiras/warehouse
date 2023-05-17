@extends('layouts.app')

@section('title', ' | Lead Details')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lead Details #{{ $lead->id }} {!! App\Helpers\Blade::leadStatus($lead->lead_status)  !!}</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-secondary float-right"
                       href="">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid lead_view">
        <div class="animated fadeIn">
            @include('vendor.adminlte-templates.common.errors')
            <div class="row">
                <div class="col-lg-6">
                    <h6>Lead details</h6>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::label('name', 'Name:') !!}
                                <p>{!! $lead->first_name !!} {!! $lead->last_name !!}</p>
                            </div>

                            <div class="form-group">
                                {!! Form::label('phone', 'Phone number') !!}
                                <p>{!! $lead->phone_number !!}</p>
                            </div>

                            <div class="form-group">
                                {!! Form::label('phone', 'Email') !!}
                                <p>{!! $lead->email !!}</p>
                            </div>

                            <div class="form-group">
                                {!! Form::label('postcode', 'Postcode') !!}
                                <p>{!! $lead->postcode !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h6>Additional fields</h6>
                    <div class="card">
                        <div class="card-body">
                            @foreach (  (array) $lead->data as $key=>$value)
                                <div class="form-group">
                                    {!! Form::label($key, $key .':') !!}
                                    <p>{{ $value }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    @if ( Auth::user()->hasRole(['Admin','Super Admin']) )
                    <h6>Andromeda info</h6>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::label('ref_Lead_id', 'Andromeda ref lead id:') !!}
                                <p><a href="https://andromedacrm.com/leads/{!! $lead->andromeda_lead_id !!}" target="_blank">{!! $lead->andromeda_lead_id !!}</a></p>
                            </div>

                            <div class="form-group">
                                {!! Form::label('phone', 'Andromeda product id') !!}
                                <p><a href="https://andromedacrm.com/products/{!! $lead->andromeda_product_id !!}" target="_blank">{!! $lead->andromeda_product_id !!}</a></p>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if ( $lead->lead_status == App\Enums\LeadStatus::NEW )
                    {!! Form::open(['route' => ['leads.create_will', $lead->id], 'method' => 'post']) !!}
                    {!! Form::button('Create Will from this lead', ['type' => 'submit', 'class' => 'btn btn-sm btn-success', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    {!! Form::close() !!}
                    @endif
                </div>

            </div>
        </div>
    </div>
    <style type="text/css">
        .lead_view label {
            font-weight: bold !important;
        }
    </style>
@endsection
