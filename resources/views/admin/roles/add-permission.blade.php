@extends('admin.admin_master')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h3 class="card-title mb-5">Role : {{ $role['name'] }}</h3>
                       <form action="{{ route('add-permission',$role['id']) }}" method="post" enctype="multipart/form-data">
                        @csrf
                         <input type="hidden" name="id" value="{{$role['id'] }}">
                        <div class="row mb-5">
                            @foreach ($permission as $permissions)
                              <div class=" col-md-3">
                                  <input  type="checkbox" class="pl-3" value="{{$permissions['name'] }}"
                                  name="permission[]"
                                  {{ in_array($permissions['id'] , $rolepermission)?'checked':'' }}
                                  > {{ $permissions['name'] }}
                             </div>
                             @endforeach
                              @error('permission')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                        </div>







                    <center>
                        <input type="submit" class="btn btn-lg btn-info" value="Update">
                    </center>

                    </form>


                        <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
@endsection
