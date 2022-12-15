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

                    <h4 class="card-title">Footer Page</h4>
                    <hr>
                    
                    <form method="post" action="{{ route('update.footer') }}" >
                        @csrf

                        <input type="hidden" name="id" value="{{ $allFooter->id }}">
                        
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="number" type="text" 
                                value="{{$allFooter->number}}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->
                        <br>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="address" type="text" 
                                value="{{$allFooter->address}}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->
                        <br>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-10">
                            <textarea required="" name="short_description" class="form-control" rows="5">
                                {{$allFooter->short_description}}
                            </textarea>
                            </div>
                        </div>
                        <br>                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="email" type="email" 
                                value="{{$allFooter->email}}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->
                        <br>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="facebook" type="text" 
                                value="{{$allFooter->facebook}}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->
                        <br>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="twitter" type="text" 
                                value="{{$allFooter->twitter}}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->
                        <br>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="copyright" type="text" 
                                value="{{$allFooter->copyright}}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->
                        <br>
                      
                        <br>
                        <!-- end row -->
                    
                        
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Footer">
                    </form>
                    
                </div>
            </div>
        </div> <!-- end col -->
    </div>


    </div>
</div>


@endsection