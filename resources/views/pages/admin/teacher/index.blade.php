@extends('layouts.master')
@section('page_title', 'Manajemen Guru')
@section('content')

    <div class="card">
        @include('layouts.notification')
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manajemen Guru</h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">Guru</a></li>
                <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i>Tambah Guru Baru</a></li>
            </ul>

            <div class="tab-content">
                    <div class="tab-pane fade show active" id="all-classes">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Alamat</th>
                                <th>Nomor Telepon</th>
                                <th>Wali Kelas</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                        @if ($teachers)
                            @foreach($teachers as $t)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $t->user->profile->name }}</td>
                                    <td>{{ $t->nip }}</td>
                                    <td>{{ $t->user->profile->address }}</td>
                                    <td>{{ $t->user->profile->phone }}</td>
                                    <td>{{ $t->is_homeroom == true ? 'Ya' : 'Bukan' }}</td>
                                    <td>{{ $t->status ? 'Aktif' : 'Non Aktif'}}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-left">


                                                    <a href="{{ route('teacher.edit', $t->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>



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
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('teacher.add') }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Nama <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select class="select-search form-control" id="user_id" name="user_id" data-fouc data-placeholder="Choose..">
                                            <option value=""></option>
                                            @foreach ($roles as $t )
                                                <option {{ old('t') ? 'selected' : '' }} value="{{ $t->id }}">{{ $t->profile->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">NIP <span class="text-danger"></span></label>
                                    <div class="col-lg-9">
                                        <input name="nip" value="{{ old('nip') }}" type="text" class="form-control" placeholder="NIP">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Wali Kelas ?<span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Apakah guru merupakan wali kelas ?" name="is_homeroom" id="is_homeroom" class="form-control select">
                                            <option value="0">Bukan</option>
                                            <option value="1">Ya</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--TimeTable Ends--}}

@endsection
