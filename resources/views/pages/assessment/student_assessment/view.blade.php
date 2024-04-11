@extends('layouts.master')
@section('page_title', 'List Penilaian')
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
                <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">Penilaian Siswa</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-classes">
                    <form action="{{ route('student.assessment.add') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label font-weight-semibold" for="assesment_id">Penilaian<span class="text-danger">*</span></label>
                            <div class="col-lg-3">
                                <select class="select-search form-control" id="assesment_id" name="assesment_id" data-fouc data-placeholder="Choose.." required>
                                    <option value=""></option>
                                    @foreach ( $assessments as $a )
                                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-form-label font-weight-semibold">Tipe<span class="text-danger">*</span></label>
                            <div class="col-lg-3">
                                <select class="select-search form-control" id="semester" name="semester" data-fouc data-placeholder="Choose..">
                                    <option value=""></option>
                                    @foreach ( $semester as $value=>$label )
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary col-1">Save</button>
                        </div>
                        <table class="table datatable-button-html5-columns">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS/NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>status</th>
                                    <th><input type="checkbox" class="form-check-input" id="selectAllCheckbox"><span>Nilai</span></th>
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
                                        <td><input type="checkbox" class="form-check-input studentCheckbox" name="selected_students[]" value="{{ $s->student_profile->id }}">
                                            <input type="number" class="form-control score" name="score_num[{{ $s->student_profile->id }}]" min="0" max="100" disabled>
                                            <input type="hidden" name="class_id" value="{{ $classroom->id }}" >
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </form>
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
@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectAllCheckbox = document.getElementById('selectAllCheckbox');
        const studentCheckboxes = document.querySelectorAll('.studentCheckbox');

        // Ketika checkbox "Select All" di klik
        selectAllCheckbox.addEventListener('change', function() {
            studentCheckboxes.forEach(function(checkbox) {
                checkbox.checked = selectAllCheckbox.checked;
                toggleScoreInput(checkbox);
            });
        });

        // Ketika checkbox siswa di klik
        studentCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                toggleScoreInput(checkbox);
            });
        });

        // Fungsi untuk menonaktifkan input nilai jika checkbox siswa tidak dicentang
        function toggleScoreInput(checkbox) {
            const scoreInput = checkbox.closest('tr').querySelector('.score');
            scoreInput.disabled = !checkbox.checked;
        }
    });
</script>

@endsection


