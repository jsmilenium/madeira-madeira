
@extends('layouts.app')

@section('content')

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

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
                <th>Stars</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div id="pageNavPosition"></div>
    </div>
</div>

<script>
    $(document).ready(function(){

        let length = 0;
        function load_data(repository = ''){
            $.ajax({
                url:"https://api.github.com/search/repositories",
                method:"GET",
                data:{q:repository},
                dataType:"jsonp",
                success:function(result)
                {
                    var output = '';
                    if(result.data.items != ''){
                        length = result.data.items.length;
                        for(var count = 0; count < result.data.items.length; count++)
                        {
                            output += '<tr>';
                            output += '<td>'+result.data.items[count].name+'</td>';
                            output += '<td>'+result.data.items[count].owner.login+'</td>';
                            output += '<td>'+result.data.items[count].stargazers_count+'</td>';
                            output += '</tr>';
                        }
                    }else{
                        output += '<tr>';
                        output += '<td colspan="6">No Data Found</td>';
                        output += '</tr>';
                    }
                    $('tbody').html(output);
                }
            });
        }

        $('#search').click(function(){
            let repository = $('#search_text').val();
            load_data(repository);
        });

    });

</script>

@endsection
