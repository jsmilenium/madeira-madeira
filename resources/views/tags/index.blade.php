@extends('layouts.app')

@section('content')

    <div class="container text-center">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Tags</h2>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <a class="btn btn-success" href="{{ route('tag.create') }}">Create</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            <table id="dbTags" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th class="th-sm">Nome</th>
                    <th colspan="2">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>
                            {{ $tag->id }}
                        </td>
                        <td>
                            {{ $tag->name }}
                        </td>
                        <td>
                            <form action="{{ route('tag.destroy',$tag->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('tag.edit',$tag->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        {{ $tags->links() }}
    </div>

@endsection