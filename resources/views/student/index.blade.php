@extends('/layout/main')
@section('title', 'Student Page')
@section('navstudentactive', 'active')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h3>Students List :</h3>
            <ul class="list-group">
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

@endsection