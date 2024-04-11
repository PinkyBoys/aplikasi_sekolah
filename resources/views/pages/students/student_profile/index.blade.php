@extends('layouts.master')
@section('page_title', 'Siswa')
@section('content')

    <div class="card">
        @include('layouts.notification')
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manajemen Siswa</h6>
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
            </ul>

            <div class="tab-content">
                    <div class="tab-pane fade show active" id="all-classes">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS/NISN</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                        @if ($students)
                            @foreach($students as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->nis ?? '...' }} / {{ $s->nisn ?? '...' }}</td>
                                    <td>{{ $s->name }}</td>
                                    <td>{{ $s->gender }}</td>
                                    {{-- <td>{{ $s->student_classroom }}</td> --}}
                                    @php
                                        $latest = $classrooms->whereHas('student_profile', function ($query) use ($s){
                                            $query->where('id', $s->id);
                                        })
                                        ->first();
                                    @endphp
                                    <td>{{ $latest->classroom->id }}</td>
                                    <td>{{ $s->status }}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-left">

                                                    <a href="{{ route('students.view', ['classroom' => $latest->classroom->id, 'id' => $s->id]) }}" class="dropdown-item"><i class="icon-eye"></i> View</a>
                                                    {{-- <a href="{{ route('students.edit', $s->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a> --}}

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                            </tbody>
                        </table>
                    </div>

                <div class="tab-pane fade" id="new-class">
                </div>
            </div>
        </div>
    </div>

    {{--TimeTable Ends--}}

@endsection
