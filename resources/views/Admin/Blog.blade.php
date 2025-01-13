@extends('AdminLayout.DashboardTemplate')
@section('main-section')
    <div class="container-fluid">
        <div class="row mt-3">
            <h3 class="text-center fw-bold ff-poppins">Blogs</h3>
        </div>

        <div class="row mt-3 ff-inter">
            <div class="col-md-4">
                <a href="{{ route('Add.Blog') }}" class="btn btn-dark Atext-decoration-none">Publish New Blog</a>
            </div>
        </div>


        <div class="row mt-5 ff-inter">
            <div class="col-md-12" style="overflow-x:auto;">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Thumbnail</th>
                        <th>Blog Headline</th>
                        <th>Publish Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($fetchAllBlogs as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>
                                <img src="{{asset('Blog/'.$record->thumbnail_image)}}" alt="" class="img-fluid rounded" style="height: 100px; width:100px;">
                            </td>
                            <td>{{$record->blog_headline}}</td>
                            <td>{{ date('d M Y', strtotime($record->publish_date)) }}</td>
                            <td class="text-center">
                                <a href="{{route('Edit.Blog', ['id' => $record->id])}}" class="text-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{route('Delete.Blog', ['id' => $record->id])}}" class="text-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
