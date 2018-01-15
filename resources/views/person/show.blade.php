@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @if(session('status'))
                    <div class="col-md-12 row-card" style="padding: 1%">
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h1>{{ $person->first_name }} {{ $person->last_name }}</h1>
                    </div>

                    <div class="panel-body">
                        <p><b>สังกัด</b> : {{ $person->affiliation }}</p>
                        <p><b>ทีม</b> : {{ $person->team }}</p>
                        <p><b>หน้าที่</b> : {{ $person->role }}</p>
                        <p><b>ไซส์เสื้อ</b> : {{ $person->shirt_size }}</p>
                        <p><b>เวลา</b> : {{ $person->updated_at }}</p>
                        <p><b>สถานะลงทะเบียน</b> : {{ $person->is_register }}</p>
                        <img src="{{ url('/qrcode/'. $person->id.'.png') }}" alt="" class="img-responsive img-thumbnail text-center">
                    </div>
                    <div class="panel-footer">
                        @guest
                            <a href="{{ url('check-in') }}" class="btn btn-success">
                                Home
                            </a>
                        @else
                            <a href="{{ url('person/'.$person->id.'/edit') }}" class="btn btn-warning">
                                Edit
                            </a>

                            {!! Form::model($person, ['method' => 'DELETE', 'url' => 'person/'.$person->id, 'class' => 'form-horizontal']) !!}
                            {!! Form::submit('delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
