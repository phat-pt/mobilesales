@extends('admin.layouts.app')

@section('content')
<div class="content">
    <h2> Employee create </h2>
    &nbsp;
    <div class="card-body card-block">
        <form action="/create_employee" method="POST" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Employee Name</label>
                    <input id="cname" class="form-control" name="employee_name" type="text" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Password</label>
                    <input id="cname" class="form-control" name="employee_password" type="text" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Email</label>
                    <input id="cname" class="form-control" name="employee_email" type="text" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Address</label>
                    <input id="cname" class="form-control" name="employee_address" type="text" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Phone</label>
                    <input id="cname" class="form-control" name="employee_phone" type="text" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">HireDate</label>
                    <input id="cname" class="form-control" name="employee_hiredate" type="date" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">BasicSalary</label>
                    <input id="cname" class="form-control" name="employee_basicsalary" type="text" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Coefficient</label>
                    <input id="cname" class="form-control" name="employee_coefficient" type="text" required>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Select Role</label></div>
                <div class="col-12 col-md-9">
                    <select name="employee_roleid" id="select" class="form-control">
                        <?php $roles=DB::table('role')->get(); ?>
                        <option value="-1">Please select</option>
                        @foreach ($roles as $role)
                            <option value="{{$role->RoleID}}">{{$role->RoleName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Status</label></div>
                <div class="col col-md-9">
                    <div class="form-check">
                        <div class="checkbox">
                            <label for="checkbox1" class="form-check-label ">
                                <input type="checkbox" id="checkbox1" name="employee_status" value="1"
                                    class="form-check-input">True
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
