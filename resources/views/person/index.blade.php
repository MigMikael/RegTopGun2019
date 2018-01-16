@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading col-md-12">
                        <div class="col-md-6">
                            <h1>All Person</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <h4><a class="btn btn-primary" href="{{ url('person/create') }}">Add</a></h4>
                        </div>
                    </div>

                    <div class="panel-body table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อ - นามสกุล</th>
                                <th>สังกัด</th>
                                <th>ทีม</th>
                                <th>หน้าที่</th>
                                <th>ลงทะเบียน</th>
                                <th>View</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($persons as $person)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $person->first_name }} {{ $person->last_name }}</td>
                                    <td>{{ $person->affiliation }}</td>
                                    <td>{{ $person->team }}</td>
                                    <td>{{ $person->role }}</td>
                                    <td>{{ $person->is_register }}</td>
                                    <td>
                                        <a href="{{ url('person/'.$person->id) }}" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
