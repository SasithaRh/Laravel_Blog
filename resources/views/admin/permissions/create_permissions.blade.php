@extends('admin.admin_master')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h3 class="card-title mb-5">Add New Permission</h3>
                       <form action="{{ route('permission.store') }}"  method="post" >
                        @csrf


                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Permission Name</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" type="text"  name="name" id="example-text-input">
                        @error('name')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                            </div>

                        </div>

                    <center>
                        <input type="submit" class="btn btn-lg btn-info" value="Add Permission">
                    </center>

                    </form>


                        <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>

<script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
@endsection
