@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Review</h4>
            </div>
        </div>




        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <div class="tab-pane pt-4" id="profile_setting" role="tabpanel" aria-labelledby="setting_tab">
                            <div class="row">

                                <div class="row">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="card border mb-0">

                                            <div class="card-header">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h4 class="card-title mb-0">Edit Review</h4>
                                                    </div><!--end col-->
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <form action="{{ route('update.review', $review->id) }}" enctype="multipart/form-data" method="post">
                                                    @csrf

                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label">Name</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <input class="form-control" type="text" name="name" value="{{ $review->name }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label">Position</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i class="mdi mdi-email"></i></span>
                                                                <input type="text" class="form-control" value="{{ $review->position }}" name="position" placeholder="Position" aria-describedby="basic-addon1">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label">Message</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i class="mdi mdi-email"></i></span>
                                                                <textarea class="form-control" name="message">{{ $review->message }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label">User Photo</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i class="mdi mdi-email"></i></span>
                                                                <input type="file" class="form-control" value="{{ $review->image }}" id="image" name="image">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label"></label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <img src="{{ asset($review->image) }}" class="rounded-circle avatar-xxl img-thumbnail float-start" id="showImage" alt="image profile">
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div><!--end card-body-->
                                            </form>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div> <!-- end education -->

                </div> <!-- Tab panes -->
            </div>
        </div>
    </div>
</div>





</div>
</div>

<script>
    $(document).ready(function() {
        $('#image').change(function(e) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result)
            }
            reader.readAsDataURL(e.target.files['0'])
        })
    })
</script>



@endsection