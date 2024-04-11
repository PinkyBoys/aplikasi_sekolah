@extends('layouts.master')
@section('page_title', 'List Kelas')
@section('content')

    <div class="card">
        @include('layouts.notification')
        <div class="card-header header-elements-inline">
            <h6 class="card-title">List Kelas dan Periode</h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">Kelas</a></li>
            </ul>

            <div class="tab-content">
                    <div class="tab-pane fade show active" id="all-classes">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                                <th>Tingkatan Kelas</th>
                                <th>Jumlah Siswa</th>
                                <th>Tahun Ajaran</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if ($classrooms)
                                    <form action="">
                                        @foreach ($classrooms as $c )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $c->classroom->class_name }}</td>
                                                <td>{{ $c->classroom->grade }}</td>
                                                <td>{{ $c->student_count }}</td>
                                                <td>{{ $c->period }}</td>
                                                <td class="text-center">
                                                    <div class="list-icons">
                                                        <div class="dropdown">
                                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                <i class="icon-menu9"></i>
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-left">

                                                                {{--Edit--}}
                                                                <a href="{{ route('student.classroom.show', $c->class_id) }}" class="dropdown-item"><i class="icon-eye"></i> View</a>
                                                                <a href="{{ route('student.assessment.show', $c->class_id) }}" class="dropdown-item"><i class="icon-pencil"></i> Penilaian</a>


                                                                {{--Delete--}}
                                                                {{-- <a id="{{ $c->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                                <form method="POST" id="item-delete-{{ $c->id }}" action="{{ url('classroom.destroy', $c->id) }}" class="hidden">@csrf @method('delete')</form> --}}

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </form>
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
            </div>
        </div>
    </div>

    {{--TimeTable Ends--}}

@endsection
