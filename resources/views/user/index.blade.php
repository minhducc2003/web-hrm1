@extends('master')
@section('title')
All Users
@stop
@section('content')
<div id="responsiveTables" class="mb-5">    
    <a href="#">
        <a href="#" title="title-bar" class="btn btn-primary btn-add-user">Add New</a>
    </a>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Profile</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th><img src="{{asset('/assets/uploads/profiles/')}}/{{$user->profile}}" alt="" 
                            style="width: 30px;"></th>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{date('d-m-Y', strtotime($user->start_date))}}</td>
                            <td>{{date('d-m-Y', strtotime($user->end_date))}}</td>
                            <td>
                                <a href="" title="" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                                <a href="" title="" class="btn btn-warning"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Trigger the modal with a button -->
<!-- Modal -->
<!-- The Modal -->
<div class="modal fade in" id="modalCreateUser">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="" id="form-signup" method="post" accept-charset="utf-8" >
        
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create User</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-control">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" placeholder="Last Name" class="form-control">
      </div>
        <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Email" class="form-control">
        </div>
        <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
        </div>
        <div class="form-group">
                <label for="password">Role</label>
                <select class="form-control" id="role" name="role">
                    <option value="0">Select Role</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
        </div>
      </div>
       
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
      
    </form>
    </div>
  </div>
</div>

@section('script')
    <script>
        $(document).ready(function() {
            
            $('.btn-add-user').click(function() {
                $('#modalCreateUser').modal('show');
                
                $('#form-signup').submit(function(e){
                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        url: "{{route('dashboard.users.create')}}",
                        type: "POST",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            console.log('success');
                        },
                    });
                }
            )
            })
        })
    </script>
@stop
@stop