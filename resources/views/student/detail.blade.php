@extends('/layout/main')
@section('title', 'Detail Page')
@section('navstudentactive', 'active')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h3>Students Detail :</h3>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $student -> nama }}</h5>
                    <h6 class="card-subtitle mb-2">{{ $student -> nim }}</h6>
                    <p class="card-text">{{ $student -> jurusan }}</p>

                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection