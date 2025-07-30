@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Blog Categories</h4>
                        <p class="card-title-desc">
                        </p>
                        <br/>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Blog Category name</th>
                                <th style="width: 15%;">Status</th>
                                <th>Action</th>

                            </tr>
                            </thead>


                            <tbody>
                              @foreach ($blogcategory as $key => $blogcategorys)
                              <tr>
                                <td class="text-lg">{{ $key + 1}}</td>
                                <td class="text-lg">{{ $blogcategorys['category_name']}}</td>
                                <td class="font-bold">{!! $blogcategorys['status'] == 1
                                    ? '<p class="text-success text-bold">Active</p>'
                                    : '<p class="text-danger text-bold">In Active</p>' !!}</td>
                                <td>
                                      <a href="{{ route('category.edit',$blogcategorys['id']) }}" class="btn btn-info sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('category.delete',$blogcategorys['id']) }}"   class="btn btn-danger sm" id="delete"><i class="fas fa-trash"></i></button>
                                </td>

                            </tr>
                              @endforeach


                            </tbody>
                        </table>
<div class="d-flex justify-content-center mt-4">
    <nav aria-label="Product Pagination">
        <ul class="pagination pagination-sm shadow-sm">
            {{ $blogcategory->links() }}
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
