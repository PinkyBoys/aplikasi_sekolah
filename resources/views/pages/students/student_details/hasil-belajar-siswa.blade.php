<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('partials.inc_top')
    <link rel="stylesheet" href="{{ asset('assets/css/detail-student.css') }}">

    <title>{{ $student->name }}</title>
</head>
<body>
    <div class="double-underline-wrapper text-center">
        <img src="{{ asset('global_assets/images/vec-tutwuri.png') }}" alt="tut wurihandayani" width="90"><span class="double-underline title">HASIL BELAJAR SISWA SEKOLAH DASAR</span>
    </div>
    <div class="container text-center">
        <div class="row ">
            <div class="col">
                <span class="header-title">NAMA SISWA : {{ $student->name ?? '..........................' }}</span>
            </div>
            <div class="col">
                <span class="header-title">NO.INDUK/NISN : {{ $student->nisn ?? '..........................' }}</span>
            </div>
            <div class="col">
                <span class="header-title">KELAS : {{ $student->nisn ?? '..........................' }}</span>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td colspan="2">TAHUN PELAJARAN</td>
                    <td colspan="3">20...</td>
                    <td colspan="3">20..</td>
                </tr>
                <tr>
                    <td rowspan="3">NO</td>
                    <td rowspan="3">MATA PELAJARAN</td>
                    <td colspan="3">Semester I (Satu)</td>
                    <td colspan="3">Semester II (Dua)</td>
                </tr>
                <tr>
                    <td rowspan="2">KKM</td>
                    <td colspan="2">Nilai</td>
                    <td rowspan="2">KKM</td>
                    <td colspan="2">Nilai</td>
                </tr>
                <tr>
                    <td>Angka</td>
                    <td>Huruf</td>
                    <td>Angka</td>
                    <td>Huruf</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($umum as $u)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-left">{{ $u->name }}</td>
                        <td>{{ $u->minimum }}</td>
                        @php
                            $semester_1 = $assessments->where('assesment_id', $u->id)->where('semester', '1')->first();
                        @endphp
                        <td>{{ $semester_1->score_num ?? '' }}</td>
                        <td>{{ $semester_1->score_let ?? '' }}</td>
                        <td>{{ $u->minimum }}</td>
                        @php
                        $semester_2 = $assessments->where('assesment_id', $u->id)->where('semester', '2')->first();
                        @endphp
                        <td>{{ $semester_2->score_num ?? '' }}</td>
                        <td>{{ $semester_2->score_let ?? '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
