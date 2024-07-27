 @extends('superadmin.layout.index')
@section('content')
<div class="pagetitle mt-2">
    <h1>Manage User Role</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Manage Roles</li>
      </ol>
    </nav>
  </div>

    <form action="{{ route('updateRole') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-2">
                <label for="">Select User</label>
            </div>
            <div class="col-md-4">
                <select name="user_id" required class="form-control" style="border: 1px solid;">
                    <option value="">Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">
                <label for="">Select Role</label>
            </div>
            <div class="col-md-4">
                <select name="role_id" required class="form-control" style="border: 1px solid;">
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                    <option value="0">User</option>
                </select>
            </div>
        </div>
        <input type="submit" value="Update Role" class="btn btn-golden">
    </form>
    @endsection
