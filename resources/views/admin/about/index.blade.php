@extends('admin.admin_master')
@section('admin')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h3 class="card-title mb-5">Edit About Page</h3>
                            <form action="{{ route('about_me.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $aboutDetails['id'] }}">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $aboutDetails['title'] }}"
                                            name="title" id="example-text-input">
                                    </div>
                                    @error('title')
                                        <span class="text-danger" align="center">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-10">
                                        <textarea  name="short_title" class="form-control"  rows="3">{{ $aboutDetails['short_title'] }}</textarea>

                                    </div>
                                    @error('short_title')
                                        <span class="text-danger" align="center">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea  name="short_description" class="form-control" rows="3">{{ $aboutDetails['short_description'] }}</textarea>
                                    </div>
                                    @error('short_description')
                                        <span class="text-danger" align="center">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Long
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea  name="long_description" class="form-control" rows="3">{{ $aboutDetails['long_description'] }}</textarea>
                                    </div>
                                    @error('long_description')
                                        <span class="text-danger" align="center">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="aboutimage" id="images">
                                    </div>
                                </div>
                                <div>
                                    <label for="example-email-input" class="col-sm-2 col-form-label"></label>

                                    <img id="showimage" class="rounded-circle  avatar-xl"
                                        src="{{ asset($aboutDetails['aboutimage']) }}">

                                </div>
                                <center>
                                    <input type="submit" class="btn btn-lg btn-info" value="Update About Page">
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
        $(document).ready(function() {
            $('#images').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showimage').attr('src', e.target.result);

                }
                reader.readAsDataURL(e.target.files['0']);

            });
        });
        $(document).ready(function() {
     if ($("textarea").length > 0) {
            tinymce.init({
                selector: "textarea", // apply to all textareas
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | " +
                         "bullist numlist outdent indent | link image | print preview media fullpage | " +
                         "forecolor backcolor emoticons",
                style_formats: [
                    { title: "Bold text", inline: "b" },
                    { title: "Red text", inline: "span", styles: { color: "#ff0000" }},
                    { title: "Red header", block: "h1", styles: { color: "#ff0000" }},
                    { title: "Example 1", inline: "span", classes: "example1" },
                    { title: "Example 2", inline: "span", classes: "example2" },
                    { title: "Table styles" },
                    { title: "Table row 1", selector: "tr", classes: "tablerow1" }
                ]
            });
        }
    });
    </script>

    <script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
@endsection
