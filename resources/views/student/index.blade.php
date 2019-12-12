@extends('/layout/main')
@section('title', 'Students Page')
@section('navstudentactive', 'active')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-6">
            <a href="/student/create" class="btn mb-3 btn-sm btn-success">New</a>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                   <b> Students List : </b>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($students as $student)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $student -> nama }}
                        <a href="/student/detail/{{ $student -> id }}" class="btn btn-sm btn-primary">Detail</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection