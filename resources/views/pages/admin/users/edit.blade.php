@extends('layouts.master')
@section('page_title', 'Edit User')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit User</h6>
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
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf @method('PATCH')
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Username <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="username" value="{{ $user->username }}" required type="text" class="form-control" placeholder="Name of Class" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Role <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select name="role" id="role" class="form-control select" required>
                                    @foreach ($roles as $value=>$title )
                                        <option value="{{ $value }}" {{ $user->role == $value ? 'selected' : '' }}>{{ $title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Status <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select name="status" id="status" class="form-control select" required>
                                    <option value="0" {{ !$user->status ? 'selected' : ''  }}>Non Aktif</option>
                                    <option value="1" {{ $user->status ? 'selected' : ''  }}>Aktif</option>
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
