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
              <table id="order-table" class="table main-table table-striped">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>email</th>
                        <th>gender</th>
                        <th>facuty</th>
                        <th>cv</th>
                        <th>edit</th>
                        <th>profile</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
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
            
            columnDefs: [
              {  
                "targets": "_all",
              },
            ],
            "columns": [
                { "width": "35%" },
                { "width": "30%" },
                { "width": "10%" },
                { "width": "30%" },
                { "width": "30%",
                  "render": function ( url, type, full) {
                    if(full[4] == null)
                      return '<span class="flex9 text-warning"> No CV </span>';
                    return '<a href="'+full[4]+'" download>Download</a>';
                  },
                 },
                { 
                  "width": "30%",
                  "render": function ( url, type, full) {
                    return '<a href="'+full[5]+'" class="table-tool">edit</a>';
                  },
                },
                { 
                  "width": "30%",
                  "render": function ( url, type, full) {
                    return '<a href="'+full[6]+'" class="table-tool">profile</a>';
                  },
                },
            ],
        });
        
        $('#order-table tbody').on('click', 'tr', function() {
            //var data = table.row(this).data();
            //var url = '';
            //url = url.replace(':id', data[0]);
            //window.open(url, '_blank');
        });
    });

    
</script>
@endsection