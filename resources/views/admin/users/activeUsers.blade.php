@extends('admin.layouts/adminlayout')


@section('title', 'Active Members')
@section('adminlayout')
<style>
a[title]::after {
  content: attr(title) !important; /* Use the title attribute value as content */
  display: block !important; /* Display the tooltip on a new line */
  background-color: #333 !important; /* Background color of the tooltip */
  color: #fff !important; /* Text color of the tooltip */
  padding: 5px 10px !important; /* Padding for the tooltip */
  border-radius: 5px !important; /* Rounded corners for the tooltip */
  position: absolute !important; /* Position the tooltip absolutely */
  left: 0 !important; /* Adjust the left position as needed */
  top: 100% !important; /* Position the tooltip below the anchor element */
  z-index: 1 !important; /* Ensure the tooltip appears above other content */
  opacity: 0 !important; /* Initially hide the tooltip */
  transition: opacity 0.3s ease-in-out !important; /* Add a smooth fade-in transition */
}

a:hover[title]::after {
  opacity: 1 !important; /* Show the tooltip on hover */
}
td{
  padding: 20px !important;
}

</style>
<div class="container-fluid py-4" style="height:100vh">

    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-2">Active Members, </h5>
                        <p><small class="text-info">(No Active Subscription)</small></p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-5">
                        @if(count($users) > 0)
                        <table id="myTable" class="table table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>s/n</th>
                                    <th>Account ID</th>
                                    <th>Name</th>
                                    <th>username</th>
                                    <th>Email</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->userid }}</td>
                                    <td>{{ ucwords($user->name) }}</td>
                                    <td>{{ ucwords($user->username) }}</td>
                                    <td>{{Str::lower( $user->email) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                       
                        @else
                        <p class="alert alert-danger">No Data Available</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


@endsection
@section('scripts')
<script src="{{ asset('backend/assets/js/core/jquery.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function(){
        $(document).on('click', '#delete', function(e){
          e.preventDefault();
          var link = $(this).data("id");
          console.log({link});
    
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              if($("#delete").submit()){
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            }
          })
        })
    
      })
</script>



@endsection