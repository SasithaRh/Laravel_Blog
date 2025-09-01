@extends('admin.admin_master')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h3 class="card-title mb-5">Add New Experience</h3>
                       <form action="{{ route('experience.store') }}"  method="post" >
                        @csrf


                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Experience Title</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" type="text"  name="title" id="example-text-input">
                        @error('title')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                            </div>

                        </div>
                         <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Year Gap</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" type="text"  name="year_gap" id="example-text-input">
                        @error('year_gap')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                            </div>

                        </div>
                         <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                            <div class="form-group col-sm-10">
                                 <textarea id="elm1" name="short_description" class="form-control"  rows="3"></textarea>
                        @error('short_description')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                            </div>

                        </div>

                    <center>
                        <input type="submit" class="btn btn-lg btn-info" value="Add Experience">
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
