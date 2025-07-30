@extends('admin.admin_master')
@section('admin')


<style type="text/css">
    .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h3 class="card-title mb-5">Blog Page</h3>
                        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Blog Category ID</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="blog_category_id"
                                        aria-label="Default select example">

                                        @foreach ($categories as $key => $categorie)
                                        <option value="{{$categorie['id']  }}">{{ $categorie['category_name'] }}
                                        </option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="blog_title" id="example-text-input">
                                    @error('blog_title')
                                    <span class="text-danger" align="center">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags</label>
                                <div class="col-sm-10">
                                    <input class="form-control" style="width: 500px !important;" type="text"
                                        name="blog_tags" id="example-text-input" data-role="tagsinput">
                                    @error('blog_tags')
                                    <span class="text-danger" align="center">{{ $message }}</span>
                                    @enderror
                                </div>


                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="blog_description" rows="3"></textarea>
                                    @error('blog_description')
                                    <span class="text-danger" align="center">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Insert Blog
                                    Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="blog_image" id="images">
                                    @error('blog_image')
                                    <span class="text-danger" align="center">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div>
                                <label for="example-email-input" class="col-sm-2 col-form-label"></label>

                                <img id="showimage" class="rounded-circle  avatar-xl" src="">

                            </div>
                            <center>
                                <input type="submit" class="btn btn-lg btn-info" value="Add Blog Page">
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
