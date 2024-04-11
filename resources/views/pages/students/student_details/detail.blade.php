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
            <div class="col-10 text-center mb-4">
                <span class="title">IV. LEMBAR BUKU INDUK REGISTER</span>
                <div class="row">
                    <div class="offset-1 col-5 text-left">
                        <ul>
                            <li><span class="subtitle">NOMOR INDUK SISWA</span>: {{ $student->nis ?? '.......................' }}</span></li>
                            <li><span class="subtitle">NOMOR INDUK SISWA NASIONAL</span>: {{ $student->nisn ?? '.......................' }}</li>
                            <li><span class="subtitle">NOMOR KODE SEKOLAH</span>: {{ '.......................' }}</li>
                        </ul>
                    </div>
                    <div class="col-5 text-left">
                        <ul>
                            <li><span class="subtitle">NOMOR KODE KECAMATAN</span>: {{ '.......................' }}</li>
                            <li><span class="subtitle">NOMOR KODE KAB/KOTA</span>: {{ '.......................' }}</li>
                            <li><span class="subtitle">NOMOR KODE PROPINSI</span>: {{ '.......................' }}</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-left">
                        <table>
                            <tr>
                                <td class="numspace subtitle">A.</td>
                                <td colspan="3" class="subtitle">KETERANGAN SISWA</td>
                                <td style="width: 3rem;"></td>
                                <td class="numspace"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="numspace">1.</td>
                                <td colspan="2">Nama Siswa</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="numspace">a.</td>
                                <td>Lengkap</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->name ?? '...............................................' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>b.</td>
                                <td>Panggilan</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->nickname ?? '...............................................' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>2.</td>
                                <td colspan="2">Jenis Kelamin</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->gender }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>3.</td>
                                <td colspan="2">Kelahiran</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>a.</td>
                                <td>Tanggal</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->dob ?? '...............................................' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>b.</td>
                                <td>Tempat</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->pob ?? '...............................................' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>4.</td>
                                <td colspan="2">Agama</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->religion }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>5.</td>
                                <td colspan="2">Kewarganegaraan</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->nationality }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>6.</td>
                                <td colspan="2">Jumlah Saudara</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->siblings_count }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>7.</td>
                                <td colspan="2">Bahasa sehari-hari dirumah</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->daily_language }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>8.</td>
                                <td colspan="2">Golongan Darah</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->blood_type }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>9.</td>
                                <td colspan="2">Alamat dan Nomor Telepon</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->address }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td colspan="2"></td>
                                <td class="spacer"></td>
                                <td></td>
                                <td>Telepon : {{ $student->phone }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>10.</td>
                                <td colspan="2">Bertempat tinggal pada</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->residence_type }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>11.</td>
                                <td colspan="2">Jarak ke sekolah</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->school_distance }}</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td style="vertical-align: top">12.</td>
                                <td colspan="5">Penempatan pas photo 3 x 4 agar tidak bertumpuk pada satu sudut diisi sesuai dengan nomor urut 1, pas photo ditempel pada kotak (1), nomor 2 pada kotak nomor (2)  dan seterusnya kembali seperti semula. Setiap siswa membubuhi tanda tangan dibawah pas photonya, stempel sekolah, ketika masuk dan meninggalkan sekolah</td>
                            </tr>
                            <tr>
                                <td colspan="7" style="height: 2rem"></td>
                            </tr>
                            <tr>
                                <td class="numspace subtitle">B.</td>
                                <td colspan="3" class="subtitle">KETERANGAN ORANG TUA/WALI MURID</td>
                                <td></td>
                                <td class="numspace"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="numspace">13.</td>
                                <td colspan="2">Nama Orang Tua Kandung</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="numspace">a.</td>
                                <td>Ayah</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->student_guardian->father_name ?? '...............................................' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="numspace">b.</td>
                                <td>Ibu</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->student_guardian->mother_name ?? '...............................................' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="numspace">14.</td>
                                <td colspan="2">Pendidikan Tertinggi</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="numspace">a.</td>
                                <td>Ayah</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->student_guardian->father_highest_education ?? '...............................................' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="numspace">b.</td>
                                <td>Ibu</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->student_guardian->mother_highest_education ?? '...............................................' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="numspace">15.</td>
                                <td colspan="2">Pekerjaan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="numspace">a.</td>
                                <td>Ayah</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->student_guardian->father_occupation ?? '...............................................' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="numspace">b.</td>
                                <td>Ibu</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->student_guardian->mother_occupation ?? '...............................................' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="numspace">16.</td>
                                <td colspan="2">Wali Murid</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="numspace">a.</td>
                                <td>Nama</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->student_guardian->student_guardian ?? '...............................................' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="numspace">b.</td>
                                <td>Hubungan Keluarga</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->student_guardian->relationship ?? '...............................................' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="numspace">c.</td>
                                <td>Pendidikan Tertinggi</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->student_guardian->guardian_highest_education ?? '...............................................' }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="numspace">d.</td>
                                <td>Pekerjaan</td>
                                <td class="spacer">:</td>
                                <td></td>
                                <td>{{ $student->student_guardian->guardian_occupation ?? '...............................................' }}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>

            <div class="col-2 my-2">
                <div class="row d-block text-center right-box id">
                    No. Urut
                    <div class="d-flex justify-content-center align-items-center">
                        <span>{{ $student->id }}</span>
                    </div>
                </div>

                <div class="row d-block right-box my-4 foto">
                    <div class="col">
                        12. Pas photo ukuran 3 x 4 (1)
                    </div>
                </div>

                <div class="row d-block" style="margin-top: -1.6rem">
                    <div class="col-10">
                        <p class="text-center">Cap tiga jari tangan kiri mengenai pas photo bagian bawah waktu masuk</p>
                        <p class="text-center">Tanda Tangan Siswa</p>
                        <p class="text-center">(..........................)</p>
                    </div>
                </div>
                <div class="row d-block right-box my-4 foto">
                    <div class="col">
                        12. Pas photo ukuran 3 x 4 (1)
                    </div>
                </div>

                <div class="row d-block" style="margin-top: -1.6rem">
                    <div class="col-10">
                        <p class="text-center">Cap tiga jari tangan kiri mengenai pas photo bagian bawah waktu masuk</p>
                        <p class="text-center">Tanda Tangan Siswa</p>
                        <p class="text-center">(..........................)</p>
                    </div>
                </div>
                <div class="row d-block right-box my-4 foto">
                    <div class="col">
                        12. Pas photo ukuran 3 x 4 (1)
                    </div>
                </div>

                <div class="row d-block" style="margin-top: -1.6rem">
                    <div class="col-10">
                        <p class="text-center">Cap tiga jari tangan kiri mengenai pas photo bagian bawah waktu masuk</p>
                        <p class="text-center">Tanda Tangan Siswa</p>
                        <p class="text-center">(..........................)</p>
                    </div>
                </div>
                <div class="row d-block right-box my-4 foto">
                    <div class="col">
                        12. Pas photo ukuran 3 x 4 (1)
                    </div>
                </div>

                <div class="row d-block" style="margin-top: -1.6rem">
                    <div class="col-10">
                        <p class="text-center">Cap tiga jari tangan kiri mengenai pas photo bagian bawah waktu masuk</p>
                        <p class="text-center">Tanda Tangan Siswa</p>
                        <p class="text-center">(..........................)</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- PAGE 2 --}}
    <div class="container">
        <div class="row">
            <div class="col-10">
                <table>
                    <tr>
                        <td class="numspace subtitle">C.</td>
                        <td colspan="3" class="subtitle">PERKEMBANGAN SISWA</td>
                        <td style="widows: 3rem;"></td>
                        <td class="numspace"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="numspace">17.</td>
                        <td colspan="2">Pendidikan sebelumnya</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="numspace">a.</td>
                        <td>Masuk menjadi siswa baru tingkat I</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>1) Asal Siswa</td>
                        <td class="spacer">:</td>
                        <td></td>
                        <td>...............................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>2) Nama Taman Kanak Kanak</td>
                        <td class="spacer">:</td>
                        <td></td>
                        <td>...............................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>3) Tanggal dan Nomor STB</td>
                        <td class="spacer">:</td>
                        <td></td>
                        <td>...............................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="numspace">b.</td>
                        <td>Pindahan dari sekolah lain</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>1) Nama sekolah asal</td>
                        <td class="spacer">:</td>
                        <td></td>
                        <td>...............................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>2) Dari tingkat</td>
                        <td class="spacer">:</td>
                        <td></td>
                        <td>...............................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>3) Diterima tanggal</td>
                        <td class="spacer">:</td>
                        <td></td>
                        <td>...............................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="numspace">18.</td>
                        <td colspan="2">Keadaan Jasmani</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="numspace">a</td>
                                    <td>Tahun</td>
                                    <td class="text-muted">...........</td>
                                    <td class="text-muted">...........</td>
                                    <td class="text-muted">...........</td>
                                    <td class="text-muted">...........</td>
                                    <td class="text-muted">...........</td>
                                    <td class="text-muted">...........</td>
                                </tr>
                                <tr>
                                    <td class="numspace">b</td>
                                    <td>Berat Badan</td>
                                    <td><span class="text-muted">.........</span>kg</td>
                                    <td><span class="text-muted">.........</span>kg</td>
                                    <td><span class="text-muted">.........</span>kg</td>
                                    <td><span class="text-muted">.........</span>kg</td>
                                    <td><span class="text-muted">.........</span>kg</td>
                                    <td><span class="text-muted">.........</span>kg</td>
                                </tr>
                                <tr>
                                    <td class="numspace">c</td>
                                    <td>Tinggi Badan</td>
                                    <td><span class="text-muted">.........</span>cm</td>
                                    <td><span class="text-muted">.........</span>cm</td>
                                    <td><span class="text-muted">.........</span>cm</td>
                                    <td><span class="text-muted">.........</span>cm</td>
                                    <td><span class="text-muted">.........</span>cm</td>
                                    <td><span class="text-muted">.........</span>cm</td>
                                </tr>
                                <tr>
                                    <td class="numspace">d</td>
                                    <td>Penyakit</td>
                                    <td class="text-muted">...........</td>
                                    <td class="text-muted">...........</td>
                                    <td class="text-muted">...........</td>
                                    <td class="text-muted">...........</td>
                                    <td class="text-muted">...........</td>
                                    <td class="text-muted">...........</td>
                                </tr>
                                <tr>
                                    <td class="numspace">e</td>
                                    <td>Kelainan Jasmani</td>
                                    <td class="text-muted">...........</td>
                                    <td class="text-muted">...........</td>
                                    <td class="text-muted">...........</td>
                                    <td class="text-muted">...........</td>
                                    <td class="text-muted">...........</td>
                                    <td class="text-muted">...........</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" style="height: 2rem"></td>
                    </tr>
                    <tr>
                        <td class="numspace subtitle">D.</td>
                        <td colspan="3" class="subtitle">BEASISWA</td>
                        <td></td>
                        <td class="numspace"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="numspace">19.</td>
                        <td colspan="2">Jenis Beasiswa</td>
                        <td class="spacer">:</td>
                        <td></td>
                        <td>...............................................</td>
                    </tr>
                    <tr>
                        <td colspan="7" style="height: 2rem"></td>
                    </tr>
                    <tr>
                        <td class="numspace subtitle">E.</td>
                        <td colspan="3" class="subtitle">MENINGGALKAN SEKOLAH</td>
                        <td></td>
                        <td class="numspace"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="numspace">21.</td>
                        <td colspan="2">Tamat Belajar</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="numspace">a.</td>
                        <td>Tahun Tamat</td>
                        <td class="spacer">:</td>
                        <td></td>
                        <td>...............................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="numspace">b.</td>
                        <td>No. Ijazah / STTB</td>
                        <td class="spacer">:</td>
                        <td></td>
                        <td>...............................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="numspace">c.</td>
                        <td>Melanjutkan ke sekolah</td>
                        <td class="spacer">:</td>
                        <td></td>
                        <td>...............................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="numspace">22.</td>
                        <td colspan="2">Pindah Sekolah</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="numspace">a.</td>
                        <td>Dari Tingkat</td>
                        <td class="spacer">:</td>
                        <td></td>
                        <td>...............................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="numspace">b.</td>
                        <td>Ke sekolah</td>
                        <td class="spacer">:</td>
                        <td></td>
                        <td>...............................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="numspace">c.</td>
                        <td>Ke tingkat</td>
                        <td class="spacer">:</td>
                        <td></td>
                        <td>...............................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="numspace">c.</td>
                        <td>Tanggal</td>
                        <td class="spacer">:</td>
                        <td></td>
                        <td>...............................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="numspace">23.</td>
                        <td colspan="2">Keluar sekolah</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="numspace">a.</td>
                        <td>Tanggal</td>
                        <td class="spacer">:</td>
                        <td></td>
                        <td>...............................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="numspace">b.</td>
                        <td>Alasan</td>
                        <td class="spacer">:</td>
                        <td></td>
                        <td>...............................................</td>
                    </tr>
                    <tr>
                        <td colspan="7" style="height: 2rem"></td>
                    </tr>
                    <tr>
                        <td class="numspace subtitle">F.</td>
                        <td colspan="3" class="subtitle">LAIN-LAIN</td>
                        <td></td>
                        <td class="numspace"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">Catatan yang penting</td>
                        <td class="spacer">:</td>
                        <td></td>
                        <td>...............................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="6">............................................................................................................................................................................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="6">............................................................................................................................................................................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="6">............................................................................................................................................................................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="6">............................................................................................................................................................................................</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="6">............................................................................................................................................................................................</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


</body>
</html>
