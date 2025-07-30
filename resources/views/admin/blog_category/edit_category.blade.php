@extends('admin.admin_master')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h3 class="card-title mb-5">Edit Blog Category</h3>
                       <form action="{{ route('category.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$blog_Category['id'] }}">

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" type="text" value="{{$blog_Category['category_name'] }}" name="category_name" id="example-text-input">
                        @error('category_name')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                                       <label for="example-text-status" class="col-sm-2 col-form-label">Status</label>
                                       <div class="form-group col-sm-10">
                                        <select id="example-text-status" name="status" class="form-control">
                                            <option value="1" {!! $blog_Category['status'] == 1 ? "selected" : "" !!}>Active</option>
                                            <option value="0"{!! $blog_Category['status'] == 0 ? "selected" : "" !!}>InActive</option>
                                        </select>
                                       </div>
                                        @error('status')
                                            <span class="text-danger" align="center">{{ $message }}</span>
                                        @enderror
                        </div>


                    <center>
                        <input type="submit" class="btn btn-lg btn-info" value="Update Category">
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
