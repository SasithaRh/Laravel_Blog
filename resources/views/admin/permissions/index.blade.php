@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Permissions</h4>
                        <p class="card-title-desc">
                        </p>
                        <br/>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Permission name</th>
                                <th style="width: 25%;">Guard_name</th>
                                <th>Action</th>

                            </tr>
                            </thead>


                            <tbody>
                              @foreach ($permission as $key => $permissions)
                              <tr>
                                <td class="text-lg">{{ $key + 1}}</td>
                                <td class="text-lg">{{ $permissions['name']}}</td>
                                <td class="font-bold">{{ $permissions['guard_name']}}</td>
                                <td>
                                      <a href="{{ route('permission.edit',$permissions['id']) }}" class="btn btn-info sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('permission.delete',$permissions['id']) }}"   class="btn btn-danger sm" id="delete"><i class="fas fa-trash"></i></button>
                                </td>

                            </tr>
                              @endforeach


                            </tbody>
                        </table>
<div class="d-flex justify-content-center mt-4">
    <nav aria-label="Product Pagination">
        <ul class="pagination pagination-sm shadow-sm">
            {{ $permission->links() }}
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
