@extends('post')
@section('content')
    <form action="{{route('search')}}" method="get">
        @csrf
        <div class="input-group">
            <input type="search" class="form-control rounded" placeholder="Поиск" aria-label="Поиск"
                   aria-describedby="search-addon" required/>
            <button type="submit" class="btn btn-outline-secondary">Поиск</button>
        </div>
    </form>
@endsection
