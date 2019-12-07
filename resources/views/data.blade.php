@extends('/layout/main')
@section('title', 'Data Page')
@section('navdataactive', 'active')
@section('content')
<br>
<div class="container">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <!-- <th scope="row">{{ $loop -> iteration }}</th> -->
                <th scope="row">{{ $user -> id }}</th>
                <td>{{ $user -> nim }}</td>
                <td>{{ $user -> nama }}</td>
                <td>{{ $user -> jurusan }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#EditModal{{ $user -> id }}">
                        Edit
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#DeleteModal{{ $user -> id }}">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Edit Modal -->
@foreach($users as $user)
<div class="modal fade" id="EditModal{{ $user -> id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" id="nim" value="{{ $user -> nim }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" value="{{ $user -> nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" value="{{ $user -> jurusan }}" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Delete Modal -->
@foreach($users as $user)
<div class="modal fade" id="DeleteModal{{ $user -> id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Yakin ingin mengahapus user {{ $user -> nama }} ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection