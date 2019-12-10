@extends('/layout/main')
@section('title', 'Create Student Page')
@section('navstudentactive', 'active')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h3>Create New Student :</h3>
            <form method="post" action="/student/store">
                @csrf
                <div class="form-group">
                    <label for="formNama">Nama</label>
                    <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="formNama" placeholder="Masukkan Nama">
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="formNIM">NIM</label>
                    <input name="nim" type="text" class="form-control @error('nim') is-invalid @enderror" id="formNIM" placeholder="Masukkan NIM">
                    @error('nim')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="formJurusan">Jurusan</label>
                    <input name="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror" id="formJurusan" placeholder="Masukkan Jurusan">
                    @error('jurusan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-success btn-sm">Tambah Data</button>
            </form>
        </div>
    </div>
</div>

@endsection