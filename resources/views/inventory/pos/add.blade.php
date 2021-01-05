<form action="{{ route('custommer.store_modal') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Add Custommer</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name" required autofocus>
                                <label class="form-label"> Name <span style="color:red">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="email" class="form-control" name="email">
                                <label class="form-label">Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="nid">
                                <label class="form-label">National id</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="phone" required>
                                <label class="form-label">Phone<span style="color:red">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="address" required>
                                <label class="form-label">Address<span style="color:red">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="shop_name">
                                <label class="form-label">Shop Name </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="account_holder">
                                <label class="form-label">Account Holder </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="account_number">
                                <label class="form-label">Accoun Number</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="bank_name">
                                <label class="form-label">Bank Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="bank_branch">
                                <label class="form-label">Bank Branch</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="city" required>
                                <label class="form-label">City<span style="color:red">*</span></label>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <b>CUSTOMMER Photo</b>
                        <div class="form-group form-float">

                            <img src="{{ asset('/') }}backend/images/user.png" style="height: 200px; width: auto"
                                alt="Custommer Photo" id="custommer_show">
                            <input type="file" class="custom-file-input" accept="image/*" name="photo" id="slideImage"
                                onchange="showImage(this, 'custommer_show')">
                            <label class="custom-file-label" for="inputGroupFile02" id="fileLabel1"></label>

                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success  waves-effect">ADD CUSTOMMER</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
</form>
