@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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

                    <h4 class="card-title">Edit Profile Page</h4>
                    <hr>
                    
                    <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="profile_image" type="file" 
                                id="image">
                            </div>
                        </div>
                        <div class="row mb-3">    
                            <div class="col-sm-10">
                            <label for="example-text-input" class="col-sm-3 col-form-label"></label>
                            <img class="rounded avatar-lg" id="showImage" src="{{ (!empty($editData->profile_image)) 
                            ? url ('upload/admin_images/' . $editData->profile_image) : url('upload/admin_images/no_image.jpg')}}"
                            alt="Card image cap">
                            </div>
                        </div>
                        <br>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="name" type="text" 
                                value="{{$editData->name}}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->
                        <br>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="email" type="email" 
                                value="{{$editData->email}}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->
                        <br>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="username" type="text" 
                                value="{{$editData->username}}" id="example-text-input">
                            </div>
                        </div>
                        <br>
                        <!-- end row -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update pofile">
                    </form>
                    
                </div>
            </div>
        </div> <!-- end col -->
    </div>


    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection