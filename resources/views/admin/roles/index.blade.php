@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row m-0 p-0">
                        <h4 class="card-title col-10 flex">Roles</h4>
                        <p class="card-title-desc col-2 p-0">
                            <a href="{{ route('role.create') }}" class="btn btn-info sm">Add Roles</a>
                        </p>
                        </div>
                        <br/>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Role name</th>
                                <th style="width: 25%;">Guard_name</th>
                                <th>Action</th>

                            </tr>
                            </thead>


                            <tbody>
                              @foreach ($role as $key => $roles)
                              <tr>
                                <td class="text-lg">{{$roles['id']}}</td>
                                <td class="text-lg">{{ $roles['name']}}</td>
                                <td class="font-bold">{{ $roles['guard_name']}}</td>
                                <td>
                                      <a href="{{ route('role.edit',$roles['id']) }}" class="btn btn-info sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('role.delete',$roles['id']) }}"   class="btn btn-danger sm" id="delete"><i class="fas fa-trash"></i></button>
                                </td>

                            </tr>
                              @endforeach


                            </tbody>
                        </table>
<div class="d-flex justify-content-center mt-4">
    <nav aria-label="Product Pagination">
        <ul class="pagination pagination-sm shadow-sm">
            {{ $role->links() }}
        </ul>
    </nav>
</div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>

@endsection
