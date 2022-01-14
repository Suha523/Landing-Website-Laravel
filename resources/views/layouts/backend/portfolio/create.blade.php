@section('css')
<style>
    .loading {
    width: 50px;
    height: 50px;
    background-color: #fff;
    position: absolute;
    left: 50%;
    top: 20%;
    z-index: 99999;
    display: none;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    border: 5px solid darkblue;
    border-left-color: transparent;

    animation-name: spin;
    animation-duration: 3s;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
    }
}

/* by esraa eid 31-12-2021 */
</style>


@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 800px;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ trans('backend/portfolio.add_modal') }}</h5>
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
                    <form id="addForm">
                        <div class="loading"></div>
                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ trans('backend/portfolio.add_ar_name') }}</label>
                                        <input type="text" name="name_ar" class="form-control" id="exampleInputEmail1">
                                      </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ trans('backend/portfolio.add_en_name') }}</label>
                                        <input type="text" name="name_en" class="form-control" id="exampleInputEmail1">
                                      </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <label>{{ trans('backend/portfolio.add_desc') }}</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                          </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="modal-footer">
                                <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">{{ trans('backend/public.close') }}</button>
                                <button type="button" id="add_portfolio" class="btn btn-primary">{{ trans('backend/public.save') }}</button>
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

  @section('js')
      <script>
           getData();
           function getData(){
               let tbody=$('#tbody');
               $.ajax({
                  type: 'get',
                  url:'{{route('portfolios.get')}}',
                  success: function(data){
                    //  console.log(data.portfolios);
                    tbody.html('');
                    $.each(data.portfolios,function(key,item){
                        // console.log(item.name.{{App::getLocale()}});
                        tbody.append(
                           ` <tr>
                            <td>${key+1}</td>
                            <td>${item.name.{{App::getLocale()}}}</td>
                            <td>${item.description}</td>
                            <td>

                                <button port-id="${item.id}" class="btn btn-info editPortfolio"
                                data-toggle="modal" data-target="#edit_portfolio">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>`
                        );
                    });
                  }
               });
           }
           $(document).on('click','.editPortfolio',function(e) {
               e.preventDefault();
               let id = $(this).attr('port-id');
               $.ajax({
                type:'get',
                url:'{{route('portfolios.get_edit')}}',
                data:{'id':id},
                // $('#edit_portfolio').modal('show');
                success:function(response) {
                    $("#name_ar").val(response.name_ar);
                    $("#name_en").val(response.name_en);
                    $("#description").html(response.description);
                }
               });
           });

           $(document).on('click','#add_portfolio',function(e){
               e.preventDefault();
            //     let form = $('#addForm');
            //    console.log(form); //return the form and all things inside it
                let form = $('#addForm')[0];
                // console.log(form); // return the form
                let formData = new FormData(form); //get the values of the inputs that inside the form

              $.ajax({
                  type:'post',
                  url:'{{route('portfolios.store')}}',
                  data: formData,
                  contentType: false,
                  processData:false,
                  beforeSend:function(){
                    $('.loading').css('display','block');
                    $('#addForm input').attr('readonly',true);
                    $('textarea').attr('readonly',true);
                    $('#close').attr('disabled', true);
                    $('#add_portfolio').attr('disabled', true);
                  },
                  complete:function(){
                    setTimeout(() => {
                        $('.loading').css('display','none');
                        $('#exampleModal').modal('hide'); // to hide the modal
                        $('#addForm input').attr('readonly',false);
                        $('textarea').attr('readonly',false);
                        $('#close').attr('disabled', false);
                        $('#add_portfolio').attr('disabled', false);
                        getData();
                    }, 3000);
                  },
                  success: function(){
                    $('#addForm').trigger('reset');
                  }
              });
           });

      </script>
  @endsection
