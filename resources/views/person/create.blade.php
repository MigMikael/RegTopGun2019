@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h1>Create Person</h1>
                    </div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'person', 'class' => 'form-horizontal']) !!}
                            @include('person._form', ['submitText' => 'Add'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
