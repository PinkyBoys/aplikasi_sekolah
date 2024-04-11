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
                        <table class="table datatable-button-html5-columns">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS/NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nilai Semester 1</th>
                                    <th>Nilai Semester 2</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($students)
                                @foreach ($students as $s)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $s->student_profile->nis ?? '...' }} / {{ $s->student_profile->nisn ?? '...' }}</td>
                                        <td>{{ $s->student_profile->name }}</td>
                                        <td>{{ $s->student_profile->gender }}</td>
                                        @php
                                            foreach ([1, 2] as $semester) {
                                                $assessmentCount = \App\Models\StudentAssessment::where('class_id', $classroom->id)
                                                    ->where('student_id', $s->student_profile->id)
                                                    ->where('semester', $semester)
                                                    ->count();

                                                $status = ($totalAssessment - $assessmentCount >= 1) ? 'bg-danger' : 'bg-primary';
                                        @endphp
                                        <td class="{{ $status }} text-center">{{ $totalAssessment . ' / ' . $assessmentCount }}</td>
                                        @php
                                            }
                                        @endphp
                                        <td></td>
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


