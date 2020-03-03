$(document).ready(function(){

    let date_format = new Intl.DateTimeFormat('pt-BR');

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
                        output += '<td>'+date_format.format(new Date(result.data.items[count].created_at))+'</td>';
                        output += '<td>'+result.data.items[count].stargazers_count+'</td>';
                        output += '<td></td>';
                        output += '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#associateTag" data-id="'+result.data.items[count].id+'">Associate</button></td>';
                        output += '</tr>';

                    }
                }else{
                    output += '<tr>';
                    output += '<td colspan="6">No Data Found</td>';
                    output += '</tr>';
                }
                $('tbody').html(output);
                $('#repository_table').dataTable( {
                    "destroy": true,
                    columnDefs: [
                        {
                            type: 'date-br', 
                            targets: 2 
                        }
                    ],
                } );
            }
        });
    }

    $('#search').click(function(){
        let repository = $('#search_text').val();
        load_data(repository);
    });

    jQuery.extend(jQuery.fn.dataTableExt.oSort, {
        "date-br-pre": function ( a ) {
            if (a == null || a == "") {
                return 0;
            }
            var brDatea = a.split('/');
            return (brDatea[2] + brDatea[1] + brDatea[0]) * 1;
        },
    
        "date-br-asc": function ( a, b ) {
            return ((a < b) ? -1 : ((a > b) ? 1 : 0));
        },
    
        "date-br-desc": function ( a, b ) {
            return ((a < b) ? 1 : ((a > b) ? -1 : 0));
        }
    });

});