<div class="modal fade" id="edit_portfolio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 800px;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
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
                    <form id="updateForm">
                        <div class="loading"></div>
                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ trans('backend/portfolio.add_ar_name') }}</label>
                                        <input id="name_ar" type="text" name="name_ar" class="form-control">
                                        <input hidden id="port_id" type="text" name="port_id" class="form-control">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ trans('backend/portfolio.add_en_name') }}</label>
                                        <input id="name_en" type="text" name="name_en" class="form-control">
                                      </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <label>{{ trans('backend/portfolio.add_desc') }}</label>
                            <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                          </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="modal-footer">
                                <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">{{ trans('backend/public.close') }}</button>
                                <button type="button" id="update_portfolio" class="btn btn-primary">{{ trans('backend/public.save') }}</button>
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





