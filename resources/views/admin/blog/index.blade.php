@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row m-0 p-0">
                            <h4 class="card-title col-10 flex">Blog Page All</h4>
                            <p class="card-title-desc col-2 p-0">
                                <a href="{{ route('blog.create') }}" class="btn btn-info sm">Add New Blog</a>
                            </p>
                        </div>

                        <br />
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Blog Category</th>
                                    <th>Blog Title</th>
                                    <th>Blog Tags</th>
                                    <th>Blog Iamge</th>
                                    <th>Action</th>

                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($blogs as $key => $blog)
                                <tr>
                                    <td>{{ $key + 1}}</td>
                                    <td>{{ $blog['category']['category_name'] }}</td>
                                    <td>{{ $blog['blog_title'] }}</td>
                                    <td>{{ $blog['blog_tags'] }}</td>
                                    <td><img src="{{ $blog['blog_image'] }}" width="50px" height="50px"></td>
                                    <td>
                                        <a href="{{ route('blog.edit',$blog['id']) }}" class="btn btn-info sm"><i
                                                class="fas fa-edit"></i></a>
                                        <a href="{{ route('blog.delete',$blog['id']) }}" class="btn btn-danger sm"
                                            id="delete"><i class="fas fa-trash"></i></button>
                                    </td>

                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-4">
                            <nav aria-label="Product Pagination">
                                <ul class="pagination pagination-sm shadow-sm">
                                    {{ $blogs->links() }}
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
