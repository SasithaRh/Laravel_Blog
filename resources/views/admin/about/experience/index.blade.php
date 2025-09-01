@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row m-0 p-0">
                            <h4 class="card-title col-10 flex">About / Experience</h4>
                            <p class="card-title-desc col-2 p-0">
                                <a href="{{ route('experience.create') }}" class="btn btn-info sm">Add New Experience</a>
                            </p>
                        </div>
                        <h4 class="card-title"></h4>
                        <p class="card-title-desc">
                        </p>
                        <br />
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Year Gap</th>
                                    <th >Short Description</th>
                                    <th >Action</th>

                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($experience as $key => $experiences)
                                <tr>
                                    <td class="text-lg">{{ $key + 1}}</td>
                                    <td class="text-lg">{{ $experiences['title']}}</td>
                                    <td class="font-bold">{{ $experiences['year_gap'] }}</td>
                                    <td class="font-bold">{!! $experiences['short_description'] !!}</td>
                                    <td>
                                        <a href="{{ route('experience.edit',$experiences['id']) }}"
                                            class="btn btn-info sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('experience.delete',$experiences['id']) }}"
                                            class="btn btn-danger sm" id="delete"><i class="fas fa-trash"></i></button>
                                    </td>

                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-4">
                            <nav aria-label="Product Pagination">
                                <ul class="pagination pagination-sm shadow-sm">
                                    {{ $experience->links() }}
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
