@extends('layouts.master')
@section('page_title', 'List Siswa')
@section('content')

    <div class="card">
        @include('layouts.notification')
        <div class="card-header header-elements-inline">
            <h6 class="card-title">List Siswa Kelas <span style="font-weight: bold">: {{ $classroom->class_name }}</span></h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">Siswa</a></li>
                {{-- <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"> Penilaian</a></li> --}}
            </ul>

            {{-- <div class="tab-content">
                <div class="tab-pane fade show active" id="all-classes">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS/NISN</th>
                                <th>Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($students)
                                @foreach ($students as $s )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->student_profile->nis ?? '...' }} / {{ $s->student_profile->nisn ?? '...' }}</td>
                                    <td>{{ $s->student_profile->name }}</td>
                                    <td>{{ $s->student_profile->gender }}</td>
                                    <td>{{ $s->student_profile->status }}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="new-class">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-classes">
                    <form action="" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <select name="class_id" id="clas_id" class="select-search form-control">
                                <option value=""></option>
                                @if ($classroomList)
                                    @foreach ($classroomList as $cl )
                                        <option value="{{ $cl->id }}">{{ $cl->class_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{--TimeTable Ends--}}

@endsection
