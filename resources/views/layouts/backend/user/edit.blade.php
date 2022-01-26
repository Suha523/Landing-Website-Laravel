<div class="modal fade" id="edit_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 800px;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ trans('backend/user.edit') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card card-primary">

                <!-- /.card-header -->
                <!-- form start -->
             <div class="row">
                 <div class="col-md-12">
                    <form id="updateUserForm">
                        <div class="loading"></div>
                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ trans('backend/user.name') }}</label>
                                        <input id="username" type="text" name="name" class="form-control">
                                        <input hidden id="user_id" type="text" name="user_id" class="form-control">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ trans('backend/user.email') }}</label>
                                    <input id="useremail" type="email" name="email" class="form-control">                                  </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="modal-footer">
                                <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">{{ trans('backend/public.close') }}</button>
                                <button type="button" id="update_user" class="btn btn-primary">{{ trans('backend/public.save') }}</button>
                              </div>
                        </div>
                      </form>
                 </div>
             </div>
              </div>
        </div>

      </div>
    </div>
</div>





