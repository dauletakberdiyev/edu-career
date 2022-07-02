@extends('layouts.app')

@section('content')
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            <div class="page__top flex-wrap">
              <h3 class="page__title">Manage Student</h3>
          
              <a class="btn btn-outline-primary" href="{{ route('student.add') }}">Add student</a>
            </div>
          
          
            <div class="table-outer">
              <table id="order-table" class="table table-striped table-bordered nowrap datatable"  style="width:100%">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>email</th>
                        <th>gender</th>
                        <th>facuty</th>
                        <th>avatar</th>
                        <th>update</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
              
          </div>
        </div>
      </main>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        var table = $('#order-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('dt_students') }}',
            dom: 'Bfrtip',
            buttons: [
              'csv', 'excel'
            ], 
            columnDefs: [
              {  
                "targets": "_all",
              },
            ],
            "columns": [
                { "width": "5%" },
                { "width": "35%" },
                { "width": "30%" },
                { "width": "30%" },
                { "width": "30%",
                  "render": function ( url, type, full) {
                    return '<img src="'+full[4]+'" alt="default__img" class="table__img">';
                  },
                 },
                { 
                  "width": "30%",
                  "render": function ( url, type, full) {
                    return '<a href="'+full[5]+'" class="table-tool">edit</a>';
                  },
                },
            ],
        });
        
        $('#order-table tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            var url = '';
            url = url.replace(':id', data[0]);
            window.open(url, '_blank');
        });
    });

    
</script>
@endsection