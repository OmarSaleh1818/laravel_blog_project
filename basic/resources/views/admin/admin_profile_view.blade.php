@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Cards</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">UI Elements</a></li>
                            <li class="breadcrumb-item active">Cards</li>
                        </ol>
                    </div>
                </div>
            </div>    
        </div>
        
        <div class="row">
            <div class="col-lg-4">
                <div class="card"><br>
                    <center>
                        <img class="rounded-circle avatar-xl" src="{{ (!empty($adminData->profile_image)) 
                        ? url ('upload/admin_images/' . $adminData->profile_image) : url('upload/admin_images/no_image.jpg')}}"
                        alt="Card image cap">
                    </center><br>
                    <div class="card-body">
                        <h4 class="card-title">Name : {{ $adminData->name }}</h4>
                        <hr>
                        <h4 class="card-title">User Email : {{ $adminData->email }}</h4>
                        <hr>
                        <h4 class="card-title">Username : {{ $adminData->username }}</h4>
                        <hr>

                        <a href="{{route('edit.profile')}}" class="btn btn-info waves-effect waves-light">Edit pofile</a>
                        
                    </div>
                </div>
            </div>
        

        </div>


    </div>
</div>

@endsection