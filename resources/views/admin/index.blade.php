@extends('admin.admin_master')
@section('admin')
<style>
    .gradient-card {
        cursor: pointer;
        transition: all 0.5s ease;
    }

    .gradient-card .card-body {
        background: #ffffff;
        border-radius: 14px;
    }


    /* Active state */
    .active-card {
        transform: translateY(-6px);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.35);
        border: 2px solid transparent;
        background: linear-gradient(135deg, #667eea, #764ba2);
    }

    /* Keep inner body white */
    .active-card .card-body {
        background: #ffffff;
    }

    /* Soft shadow */
    .gradient-card {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);

    }

    /* Hover effect */
    .gradient-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(102, 126, 234, 0.25);
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Blogger</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Users</p>
                                <h4 class="mb-2">{{ $blogsCount }}</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i
                                            class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from
                                    previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-user-3-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Blogs</p>
                                <h4 class="mb-2">{{ $blogCount }}</h4>
                                <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i
                                            class="ri-arrow-right-down-line me-1 align-middle"></i>1.09%</span>from
                                    previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="fab fa-blogger font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Portfolios</p>
                                <h4 class="mb-2">{{ $portfolioCount }}</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i
                                            class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from
                                    previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="fab fa-blogger font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">New Mail</p>
                                <h4 class="mb-2">{{ $mailCount }}</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i
                                            class="ri-arrow-right-up-line me-1 align-middle"></i>11.7%</span>from
                                    previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="ri-mail-send-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-xl-6">

            </div>
            <!-- end col -->
            <div class="col-xl-6">

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Latest Blogs</h4>
                        <div class="row">
                            @foreach ($categories as $categorie)
                            <div class="col-xl-4 col-md-6" id="getBlogs" data-val="{{ $categorie->id }}">
                                <div class="card gradient-card">
                                    <div class="card-body border p-2">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="font-size-14 mb-0 text-wrap">
                                                    {{ $categorie->category_name }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="table-responsive" style="height: 321px; overflow:scroll;">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap"
                                id="blog_table">
                                <thead class="table-light" style="position: sticky;top: 0;">
                                    <tr>
                                        <th width="40%">Title</th>
                                        <th width="20%">Tags</th>
                                        <th width="20%">Image</th>
                                        <th width="20%">Created Date</th>

                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>



                                    @foreach ($blogs as $blog)
                                    <tr>
                                        <td>  <a href="{{ route('blog.edit',$blog['id']) }}"><h6>{{ $blog->blog_title }}</h6></a></td>
                                        <td>{{ $blog->blog_tags }}</td>
                                        <td> <img src="{{ $blog->blog_image }}" width="70px" height="50px">
                                        <td>
                                            {{ $blog->created_at->format('d-M-Y') }}
                                        </td>
                                    </tr>
                                    @endforeach



                                    <!-- end -->
                                </tbody><!-- end tbody -->
                            </table> <!-- end table -->
                        </div>
                    </div><!-- end card -->
                </div><!-- end card -->
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">


                        <h4 class="card-title mb-1">Latest Portfolios</h4>

                        <div class="table-responsive" style="height: 400px; overflow:scroll;">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light" style="position: sticky; top: 0;  z-index: 1" >
                                    <tr>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Image</th>

                                        <th>Created Date</th>

                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>

                                    @foreach ($portfolios as $key => $portfolio)
                                    <tr>
                                        <td>
                                            <h6 class="mb-0"><a href="{{ route('portfolio.edit',$portfolio['id']) }}">{{
                                                    $portfolio['portfolio_name']}}</a></h6>
                                        </td>
                                        <td>{{ $portfolio['portfolio_string']}}</td>
                                        <td> <img src="{{ $portfolio['portfolio_image'] }}" width="70px" height="50px">
                                        </td>
                                        <td>{{ $portfolio['created_at']->format('d-M-Y') }}</td>

                                    </tr>
                                    @endforeach
                                    <!-- end -->
                                </tbody><!-- end tbody -->
                            </table> <!-- end table -->
                        </div>
                    </div><!-- end card -->
                </div><!-- end card -->
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->
    </div>

</div>
<script>

    $(document).on('click', '#getBlogs', function () {

    $('#blog_table tbody').empty();

     $('.gradient-card').removeClass('active-card');
    let card = $(this).find('.gradient-card');
    card.toggleClass('active-card');
       var id = $(this).attr('data-val');
        $.ajax({
        url: "{{ route('dashboard.get_blogs') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            id: id
        },
        success: function (response) {
            console.log(response);
            response.forEach(function (blog) {
              var row = '<tr>' +
                    '<td><a href="{{ route("blog.edit",$blog["id"]) }}"><h6>' + blog.blog_title + '</h6></a></td>' +
                    '<td>' + blog.blog_tags + '</td>' +
                    '<td><img src="' + blog.blog_image + '" width="70px" height="50px"></td>' +
                    '<td>' + new Date(blog.created_at).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) + '</td>' +
                    '</tr>';
                $('#blog_table tbody').append(row);
            });
        }
    });
    });
</script>
@endsection

<!-- End Page-content -->
