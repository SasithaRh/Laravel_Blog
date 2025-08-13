@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row m-0 p-0">
                        <h4 class="card-title col-10 flex">Users</h4>
                        <p class="card-title-desc col-2 p-0">
                            {{-- <a href="{{ route('user.create') }}" class="btn btn-info sm">Add Users</a> --}}
                        </p>
                        </div>
                        <br/>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User name</th>
                                <th style="width: 25%;">Email</th>
                                <th style="width: 25%;">Roles</th>
                                <th>Action</th>

                            </tr>
                            </thead>


                            <tbody>
                              @foreach ($users as $key => $user)
                              <tr>
                                <td class="text-lg">{{$user['id']}}</td>
                                <td class="text-lg">{{ $user['name']}}</td>
                                <td class="font-bold">{{ $user['email']}}</td>
                                <td>
                                    @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $roleName)
                                        <lable class="badge bg-primary mx-2">{{ $roleName}}</lable>
                                    @endforeach

                                    @endif
                                </td>
                                <td>
                                      <a href="{{ route('user.edit',$user['id']) }}" class="btn btn-info sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('user.delete',$user['id']) }}"   class="btn btn-danger sm" id="delete"><i class="fas fa-trash"></i></button>
                                </td>

                            </tr>
                              @endforeach


                            </tbody>
                        </table>
<div class="d-flex justify-content-center mt-4">
    <nav aria-label="Product Pagination">
        <ul class="pagination pagination-sm shadow-sm">
            {{ $users->links() }}
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
