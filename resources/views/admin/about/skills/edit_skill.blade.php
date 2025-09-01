@extends('admin.admin_master')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h3 class="card-title mb-5">Edit Skill</h3>
                       <form action="{{ route('skill.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$skill['id'] }}">

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Skill Title</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" type="text" value="{{$skill['title'] }}" name="title" id="example-text-input">
                        @error('title')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                            </div>

                        </div>
                           <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Percentage</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" type="text" value="{{$skill['percentage'] }}" name="percentage" id="example-text-input">
                        @error('percentage')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                            </div>

                        </div>



                    <center>
                        <input type="submit" class="btn btn-lg btn-info" value="Update Skill">
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
