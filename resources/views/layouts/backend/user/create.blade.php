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

<div class="modal fade" id="exampleModalUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 800px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('backend/user.add_modal') }}</h5>
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
                            <form id="addUserForm">
                                <div class="loading"></div>
                                @csrf

                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>{{ trans('backend/user.add_name') }}</label>
                                                <input type="text" id="name" name="name" class="form-control">
                                            </div>

                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>{{ trans('backend/user.add_password') }}</label>
                                                <input type="password" id="password" name="password" class="form-control">
                                            </div>
                                        </div>

                                    </div>



                                    <div class="form-group">
                                        <label>{{ trans('backend/user.add_email') }}</label>
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>




                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <div class="modal-footer">
                                        <button type="button" id="close" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('backend/public.close') }}</button>
                                        <button type="button" id="add_user"
                                            class="btn btn-primary">{{ trans('backend/public.save') }}</button>
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
        function getData () {
            let tbody = $('#tbody');

            $.ajax({
                type:'get',
                url:'{{route('users.get')}}',
                success: function(data){
                    tbody.html('');
                    $.each(data.users, function (key, item) {

                        tbody.append(`
                            <tr id="${item.id}">
                               <td>${key+1}</td>
                               <td>${item.name}</td>
                               <td>${item.email}</td>
                               <td>
                                <button user-id="${item.id}" class="btn btn-info editUser"
                                data-toggle="modal" data-target="#edit_user">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button user-id="${item.id}" class="btn btn-danger deleteUser">
                                    <i class="fas fa-trash"></i>
                                </button>

                               </td>
                            </tr>

                        `);

                    });
                },

            });
         }
        $(document).on('click', '#add_user', function(e) {
            e.preventDefault();
            let form = $('#addUserForm')[0];
            let formData = new FormData(form);

            $.ajax({
                type: "post",
                url: "{{ route('users.store') }}",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('.loading').css('display', 'block');
                    $('#addUserForm input').attr('readonly', true);
                    $('#close').attr('disabled', true);
                    $('#add_user').attr('disabled', true);
                },
                complete: function() {
                    setTimeout(() => {
                        $('.loading').css('display', 'none');
                        $('#exampleModalUser').modal('hide'); // to hide the modal
                        $('#addUserForm input').attr('readonly', false);
                        $('#close').attr('disabled', false);
                        $('#add_user').attr('disabled', false);
                        getData();
                    }, 2000);
                },
                success: function() {
                    $('#addUserForm').trigger('reset');
                }
            });
        });

        $(document).on('click','.editUser',function(e){
            e.preventDefault();
            let id = $(this).attr('user-id');
           $.ajax({
               type: "get",
               url: "{{route('users.get_edit')}}",
               data: {'id':id},
               success: function (response) {
                    // $('#edit_user').modal('show');
                    $("#username").val(response.name);
                    $("#useremail").val(response.email);
                    $("#user_id").val(response.user_id);
               }
           });
        });

        $(document).on('click','#update_user',function(e){
            e.preventDefault();
            let form = $('#updateUserForm')[0];
            let formData = new FormData(form);
            $.ajax({
                type: "post",
                url: "{{route('users.myUpdate')}}",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('.loading').css('display', 'block');
                    $('#updateUserForm input').attr('readonly', true);
                    $('#close').attr('disabled', true);
                    $('#update_user').attr('disabled', true);
                },
                complete: function() {
                    setTimeout(() => {
                        $('.loading').css('display', 'none');
                        $('#edit_user').modal('hide'); // to hide the modal
                        $('#updateUserForm input').attr('readonly', false);
                        $('#close').attr('disabled', false);
                        $('#update_user').attr('disabled', false);
                        getData();
                    }, 2000);
                },
                success: function (response) {
                    $('#updateUserForm').trigger('reset');
                }
            });
        });

        $(document).on('click','.deleteUser',function(e){
            e.preventDefault();
            let id = $(this).attr('user-id');

            $.ajax({
                type: "post",
                url: "{{route('users.delete')}}",
                data: {
                    'id':id,
                    '_token': '{{ csrf_token() }}',
                },
                success: function (response) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    })


                    swalWithBootstrapButtons.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            @if (App::getLocale() == 'ar')
                                toastr.options.rtl = true;
                            @endif
                            toastr.success('{{ Session::get('delete') }}');
                            $(`#${response.id}`).remove();
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                'Cancelled',
                                'Your imaginary file is safe :)',
                                'error'
                            )
                        }
                    })


                }
            });

        });
    </script>

@endsection
