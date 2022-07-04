@extends('layouts.app')

@section('content')
<main class="main">
        <div class="container-fluid">
          <div class="page__inner">
            <div class="page__top flex-wrap">
              <h3 class="page__title">Manage Staffs</h3>
          
              <a class="btn btn-outline-primary" href="{{ route('staff.add') }}">Add Staff</a>
            </div>
            <div class="table-outer">
                <table id="order-table"  class="table main-table table-striped">
                  <thead>
                    <tr>
                      <th>Name Surname</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Faculty</th>
                      <th>Image</th>
                      <th>Edit</th>
                      <th>Profile</th>
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
            ajax: '{{ route('dt_staff') }}',
            
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
                { 
                  "width": "30%",
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