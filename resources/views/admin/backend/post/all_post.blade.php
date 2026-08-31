@extends('admin.admin_master')
@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">All Review</h5>
            </div><!-- end card header -->

            <div class="card-body">
                <table id="key-table" class="table table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $key=> $item )
                        <tr>
                        
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->blogcat?->category_name }}</td>
                            <td>{{ $item->blog_title }}</td>
                            <td><img src="{{ asset($item->blog_image) }}" style="width: 70px; height:40px ;" alt=""></td>
                            <td>{{ Str::limit(strip_tags(html_entity_decode($item->blog_content)), 50, '...') }}</td>
                            
                            <td>
                                <a href="{{ route('edit.blog.post', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <a href="{{ route('delete.blog.post', $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>


@endsection