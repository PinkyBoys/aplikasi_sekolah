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
    <div class="container">
        <div class="row">
            <div class="col-10 text-center my-2 mb-4">
                <span class="title">IV. LEMBAR BUKU INDUK REGISTER</span>
            </div>
        </div>


        <div class="row">
            <div class="col-5">
                <ul>
                    <li><span class="subtitle">NOMOR INDUK SISWA</span>: {{ $student->nis ?? '.......................' }}</li>
                    <li><span class="subtitle">NOMOR INDUK SISWA NASIONAL</span>: {{ $student->nisn ?? '.......................' }}</li>
                    <li><span class="subtitle">NOMOR KODE SEKOLAH</span>: {{ '.......................' }}</li>
                </ul>
            </div>
            <div class="col-5">
                <ul>
                    <li><span class="subtitle">NOMOR KODE KECAMATAN</span>: {{ '.......................' }}</li>
                    <li><span class="subtitle">NOMOR KODE KAB/KOTA</span>: {{ '.......................' }}</li>
                    <li><span class="subtitle">NOMOR KODE PROPINSI</span>: {{ '.......................' }}</li>
                </ul>
            </div>
            <div class="col-1">
                <div class="row d-block text-center right-box id">
                    Nomor Urut
                    <div class="d-flex justify-content-center align-items-center" style="border-top:1px solid black">
                        <span style="display: inline-block;">{{ $student->id }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <span>A. KETERANGAN SISWA</span>
            </div>
        </div>
        <div class="row px-2" >
            <div class="col-10">
                <table>
                    <tr>
                        <td>1. Nama Siswa</td>
                        <td style="width: 5rem;"></td>
                        {{-- <td style="width: 5rem;"></td> --}}
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp; a. Lengkap</td>
                        <td class="spacer">:</td>
                        {{-- <td></td> --}}
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $student->name ?? '...............................................' }}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp; b. Panggilan</td>
                        <td class="spacer">:</td>
                        {{-- <td></td> --}}
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $student->nickname ?? '...............................................'}}</td>
                    </tr>
                    <tr>
                        <td>2. Jenis Kelamin</td>
                        <td class="spacer">:</td>
                        {{-- <td style="width: 5rem;"></td> --}}
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $student->gender == 'L' ? 'Laki - Laki' : ($student->gender == 'P' ? 'Perempuan' : '...............................................') }}</td>
                    </tr>
                    <tr>
                        <td>3. Kelahiran</td>
                        <td class="spacer"></td>
                        {{-- <td style="width: 5rem;"></td> --}}
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp; a. Tanggal</td>
                        <td class="spacer">:</td>
                        {{-- <td></td> --}}
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $student->dob ?? '...............................................' }}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp; a. Tempat</td>
                        <td class="spacer">:</td>
                        {{-- <td></td> --}}
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $student->pob ?? '...............................................' }}</td>
                    </tr>
                    <tr>
                        <td>4. Agama</td>
                        <td class="spacer">:</td>
                        {{-- <td style="width: 5rem;"></td> --}}
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $student->religion ?? '...............................................' }}</td>
                    </tr>
                    <tr>
                        <td>5. Kewarganegaraan</td>
                        <td class="spacer">:</td>
                        {{-- <td style="width: 5rem;"></td> --}}
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $student->nationality ?? '...............................................' }}</td>
                    </tr>
                    <tr>
                        <td>6. Jumlah Saudara</td>
                        <td class="spacer">:</td>
                        {{-- <td style="width: 5rem;"></td> --}}
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $student->siblings_count ?? '...............................................' }}</td>
                    </tr>
                    <tr>
                        <td>7. Bahasa sehari-hari dirumah</td>
                        <td class="spacer">:</td>
                        {{-- <td style="width: 5rem;"></td> --}}
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $student->daily_language ?? '...............................................' }}</td>
                    </tr>
                    <tr>
                        <td>8. Golongan Darah</td>
                        <td class="spacer">:</td>
                        {{-- <td style="width: 5rem;"></td> --}}
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $student->blood_type ?? '...............................................' }}</td>
                    </tr>
                    <tr>
                        <td>9. Alamat dan Nomor Telepon</td>
                        <td class="spacer">:</td>
                        {{-- <td style="width: 5rem;"></td> --}}
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $student->address ?? '...............................................' }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;Telepon : {{ $student->phone }}</td>
                    </tr>
                    <tr>
                        <td>10. Bertempat tinggal pada</td>
                        <td class="spacer">:</td>
                        {{-- <td style="width: 5rem;"></td> --}}
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $student->residence_type ?? '...............................................' }}</td>
                    </tr>
                    <tr>
                        <td>11. Jarak ke sekolah</td>
                        <td class="spacer">:</td>
                        {{-- <td style="width: 5rem;"></td> --}}
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $student->school_distance ?? '...............................................' }}</td>
                    </tr>
                    <tr>
                        <td colspan="3">12. Penempatan pas photo 3 x 4 agar tidak bertumpuk pada satu sudut diisi sesuai dengan nomor urut 1, pas photo ditempel pada kotak (1), nomor 2 pada kotak nomor (2)  dan seterusnya kembali seperti semula. Setiap siswa membubuhi tanda tangan dibawah pas photonya, stempel sekolah, ketika masuk dan meninggalkan sekolah</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <span>B. KETERANGAN ORANG TUA/WALI MURID</span>
            </div>
        </div>
        <div class="row px-2">
            <div class="col-10">
                <table>
                    <tr>
                        <td>1. Nama Orang Tua Kandung</td>
                        <td style="width: 5rem;"></td>
                        {{-- <td style="width: 5rem;"></td> --}}
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp; a. Ayah</td>
                        <td class="spacer">:</td>
                        {{-- <td></td> --}}
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $student->student_guardian->father_name ?? '...............................................' }}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp; a. Ibu</td>
                        <td class="spacer">:</td>
                        {{-- <td></td> --}}
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $student->student_guardian->mother_name ?? '...............................................' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


</body>
</html>
