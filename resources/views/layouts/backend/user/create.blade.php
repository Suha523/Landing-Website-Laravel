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
                        // getData();
                    }, 3000);
                },
                success: function(response) {

                }
            });
        });
    </script>

@endsection
