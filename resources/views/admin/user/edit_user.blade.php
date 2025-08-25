@extends('admin.admin_master')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h3 class="card-title mb-5">Update User</h3>
                       <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$user['id'] }}">

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">User Name</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" type="text" value="{{$user['name'] }}" name="name" id="example-text-input">
                        @error('name')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                            </div>

                        </div>

                         <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">User Email</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" type="email" name="email" value="{{$user['email'] }}" >

                        @error('email')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                            </div>

                        </div>

                         <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">User Password</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" type="password" value="" name="password">
                        @error('password')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Roles</label>
                            <div class="form-group col-sm-10">
                                <select class="form-control"   name="roles[]" multiple id="example-text-input">
                                    <option value="" disabled>Select Roles</option>
                                    @foreach ($roles as $roles)
                                        <option {{ in_array($roles , $userRole)?'checked':'' }}
                                        value={{ $roles }}>{{ $roles }}</option>
                                    @endforeach
                                </select>
                        @error('roles')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                            </div>

                        </div>

                           <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file"  name="image" id="images">
                            </div>
                        </div>
                    <div>
                        <label for="example-email-input" class="col-sm-2 col-form-label"></label>

                        <img id="showimage" class="rounded-circle  avatar-xl" src="{{ asset($user['image'])}}" >

                    </div>

                    <center>
                        <input type="submit" class="btn btn-lg btn-info" value="Update User">
                    </center>

                    </form>


                        <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#images').change(function(e){
            var reader = new FileReader();
                reader.onload = function(e){
                    $('#showimage').attr('src',e.target.result);

                }
                reader.readAsDataURL(e.target.files['0']);

        });
    });
</script>
<script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
@endsection
