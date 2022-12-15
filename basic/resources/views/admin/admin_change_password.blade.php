@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Forms Elements</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Forms Elements</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Change Password Page</h4>
                    <hr>
                    <br>

                    @if(count($errors))
                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger alert-dismissible fade show">
                                {{$error}}
                            </p>
                        @endforeach
                    @endif
            
                    <form method="post" action="{{ route('update.password')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="old_password" type="password" 
                                value="" id="old_password">
                            </div>
                        </div><br>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="new_password" type="password" 
                                value="" id="new_password">
                            </div>
                        </div><br>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="confirm_password" type="password" 
                                value="" id="confirm_password">
                            </div>
                        </div><br>
                        <!-- end row -->
              
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
                    </form>
                    
                </div>
            </div>
        </div> <!-- end col -->
    </div>


    </div>
</div>

@endsection