@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
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
                </div>
            </div>
        </div>
    </div>
@endsection
