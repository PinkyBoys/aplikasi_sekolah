@extends('layouts.master')
@section('page_title', 'Edit Mapel/Penilaian')
@section('content')

    <div class="card">
        @include('layouts.notification')
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit Mapel/Penilaian</h6>
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
                    <form method="POST" action="{{ route('assessment.update', $assessment->id) }}">
                        @csrf @method('PATCH')
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Tipe <span class="text-danger"></span></label>
                            <div class="col-lg-9">
                                <select class="select-search form-control" id="type" name="type" data-fouc data-placeholder="Choose..">
                                    @foreach ($types as $key=>$value )
                                        <option value="{{ $key }}" {{ $assessment->type == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Nama Penilaian<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="name" value="{{ $assessment->name }}" type="text" class="form-control" placeholder="Nama Penilaian">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Nilai Minimum (KKM)<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="minimum" value="{{ $assessment->minimum }}" type="number" class="form-control" placeholder="Penilaian Minimum" min="1" max="100">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Tipe <span class="text-danger"></span></label>
                            <div class="col-lg-9">
                                <select class="form-control" id="status" name="status">
                                   <option value="0" {{ !$assessment->status ? 'selected' : '' }}>Tidak Aktif</option>
                                   <option value="1" {{ $assessment->status ? 'selected' : '' }}>Aktif</option>
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
