@extends('admin.admin_master')
@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#standard-modal">Add Blog Category</button>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">All Blog Category</h5>
            </div><!-- end card header -->

            <div class="card-body">
                <table id="key-table" class="table table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $key=> $item )
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->category_name }}</td>
                            <td>{{ $item->category_slug }}</td>
                            <td>
                                <a href="{{ route('edit.blog.category', $item->id) }}" id="{{ $item->id }}" class="btn btn-success btn-sm" data-bs-toggle="modal" onclick="EditCategory(this.id)"  data-bs-target="#edit-modal">Edit</a>
                                <a href="{{ route('delete.blog.category', $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>




<!-- Default Modal -->
<div class="modal fade" id="standard-modal" tabindex="-1" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="standard-modalLabel">Add Blog Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store.blog.category') }}" method="post" class="form-group col-md-12">
                    @csrf

                    <label for="input1" class="form-label">Blog Category Name</label>
                    <input type="text" name="category_name" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>





<!-- Edit Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="standard-modalLabel">Edit Blog Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update.blog.category', ':id') }}" id="editForm" method="post" class="form-group col-md-12">
                    @csrf
                    
                    <input type="hidden" name="categoryId"  id="categoryId">
                    <label for="categoryName" class="form-label">Blog Category Name</label>
                    <input type="text" name="category_name" id="categoryName" value="" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    function EditCategory(id){
        $.ajax({
            type: 'GET',
            url: '/blog/category/edit/'+id,
            dataType: 'json',
            success:function(data){
                $('#categoryName').val(data.category_name);
                $('#categoryId').val(data.id);
                $('#editForm').attr('action', '/blog/category/update/' + data.id);
            }
        })
    }
</script>


@endsection