@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Tag Edit</h2>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif

        <form method="post" action="{{ route('tag.update', $tag->id) }}">
            <div class="form-group">
                @csrf
                @method('PUT')
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name" value="{{ $tag->name }}"/>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a class="btn btn-info" href="{{ route('tag.index') }}">Back</a>
        </form>
    </div>

@endsection