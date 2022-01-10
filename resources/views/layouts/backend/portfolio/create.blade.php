<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
             <div class="row">
                 <div class="col-md-12">
                    <form action="{{route('portfolios.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">الاسم باللغة العربية</label>
                            <input type="text" name="name_ar" class="form-control" id="exampleInputEmail1">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">الاسم باللغة الانجليزية</label>
                            <input type="text" name="name_en" class="form-control" id="exampleInputEmail1">
                          </div>
                          <div class="form-group">
                            <label>الوصف (اختياري)</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                          </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
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
