
@extends('layouts.app')

@section('content')

    <div class="container">
    <br />
    <h3 align="center">Repository Search in GitHub API</h3>
    <br />
    <div class="row">
        <div class="col-md-10">
            <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search" value="">
        </div>
        <div class="col-md-2">
            @csrf
            <button type="button" name="search" id="search" class="btn btn-success">Search</button>
        </div>
    </div>
    <br />
    <div class="table-responsive">
        <table id="repository_table" name="repository_table" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Repository</th>
                <th>Owner</th>
                <th>Data Created</th>
                <th>Stars</th>
                <th>Tag</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div id="pageNavPosition"></div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="associateTag" tabindex="-1" role="dialog" aria-labelledby="associateTagLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Associate Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection
