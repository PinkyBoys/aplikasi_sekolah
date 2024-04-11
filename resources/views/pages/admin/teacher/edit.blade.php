@extends('layouts.master')
@section('page_title', 'Edit Guru')
@section('content')

    <div class="card">
        @include('layouts.notification')
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit Guru</h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('teacher.update', $teacher->id) }}">
                        @csrf @method('PATCH')
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">NIP <span class="text-danger"></span></label>
                            <div class="col-lg-9">
                                <input name="nip" value="{{ $teacher->nip }}" type="text" class="form-control" placeholder="NIP">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Wali Kelas ?<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select required data-placeholder="Apakah guru merupakan wali kelas ?" name="is_homeroom" id="is_homeroom" class="form-control select">
                                    <option value="0" {{ !$teacher->is_homeroom ? 'selected' : '' }}>Bukan</option>
                                    <option value="1" {{ $teacher->is_homeroom ? 'selected' : '' }}>Ya</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Status<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select required data-placeholder="Status" name="status" id="status" class="form-control select">
                                    @foreach ($status as $value=>$label )
                                        <option value="{{ $value }}" {{ $teacher->status == $value ? 'selected' : '' }}>{{ $label }}</option>
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
