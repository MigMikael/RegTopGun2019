@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>All Person</h1>
                    </div>

                    <div class="panel-body">
                        <table class="table table-hover">
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
                        <p> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
