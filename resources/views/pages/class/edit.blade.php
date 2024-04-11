@extends('layouts.master')
@section('page_title', 'Edit Kelas')
@section('content')

    <div class="card">
        @include('layouts.notification')
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit Kelas</h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <form method="POST" action="{{ route('classroom.update',$class->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="d-block">Nama Kelas <span class="text-danger">*</span></label>
                                <input name="class_name" value="{{ $class->class_name }}" type="text" class="form-control" placeholder="Nama Kelas" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="d-block">Wali Kelas <span class="text-danger">*</span></label>
                                <select name="teacher_id" id="teacher_id" class="form-control select">
                                    <option value="null">Belum ada</option>
                                @foreach ($homeroom as $teacher )
                                            <option value="{{ $teacher->id }}">{{ $teacher->user->profile->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="d-block">Tingkatan <span class="text-danger">*</span></label>
                                <select name="grade" id="grade" class="form-control select">
                                    @foreach ($grades as $grade )
                                        <option value="{{ $grade }}" {{ $class->grade == $grade ? 'selected' : '' }}>{{ $grade }}</option>
                                    @endforeach
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

    {{--Class Edit Ends--}}

@endsection
