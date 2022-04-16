<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Ajax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Laravel Ajax Crud Operations</h1>
        <div class="row">
            <div class="col">
                <table id="cities" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>City</th>
                            <th>State</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            //Data Insert Code
            $('#submit').click(function(e) {
                e.preventDefault();
                
                $.ajax({
                    url: "{{ url('addCity') }}",
                    type: "post",
                    dataType: "json",
                    data: $('#myForm').serialize(),
                    success: function(response) {
                        $('#myForm')[0].reset();
                        console.log(response);
                        table.ajax.reload();
                    }
                });
            });
            // Data Display Code
            var table = $('#cities').DataTable( {
                ajax: "{{ URL::to('getdata_quanlydetai') }}",
                columns: [
                    { "data": "MaDT" },
                    { "data": "TenDT" },
                    { "data": "TenDT" },
                    { "data": "TenDT" },
                    { "data": "TenDT" }
                   
                ]
            } );
            // edit city code goes here
            $(document).on('click', '#edit', function() {
                $.ajax({
                    url: "{{ url('getCityById') }}",
                    type: "post",
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": $(this).data('id')
                    },
                    success: function(response) {
                        $('input[name="id"]').val(response.data.id);
                        $('select[name="edit_state_id"]').val(response.data.state_id);
                        $('input[name="edit_city_name"]').val(response.data.city_name);
                        $('select[name="edit_status"]').val(response.data.status);
                    }
                })
            })
            // Update city code goes here
            $(document).on('click', '#update', function() {
                if(confirm('Are you sure you want to update??')) {
                    $.ajax({
                        url: '{{ url("updateCity") }}',
                        type: 'post',
                        dataType: 'json',
                        data: $('#updateForm').serialize(),
                        success: function(response) {
                            $('#updateForm')[0].reset();
                            table.ajax.reload();
                            $('#exampleModal').modal('hide')
                        }
                    })
                }
            })
            // delete city code goes here
            $(document).on('click', '#delete', function() {
                if(confirm('Are you sure you want delete??')){
                    $.ajax({
                        url: "{{ url('deleteCityById') }}",
                        type: "post",
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": $(this).data('id')
                        },
                        success: function(response) {
                            table.ajax.reload();
                        }
                    })
                }
            })
        });
    </script>
</body>
</html>