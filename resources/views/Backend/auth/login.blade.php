<!DOCTYPE html>
<html lang="en">
    <head>
        @include('Backend/elements.head')
    </head>
    <body class="bg-login">
        <div class="account-pages pt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">

                                <div class="text-center w-75 m-auto">
                                    <h5 class="text-uppercase text-center font-bold mt-2">Đăng nhập</h5>
                                </div>
                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        {{ session('error') }}<br/>
                                    </div>
                                @endif
                                <form action="{{ route($controllerName.'/postLogin')}}" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Tài khoản</label>
                                        <input class="form-control" type="text" name="username" required="" placeholder="">
                                    </div>

                                    <div class="form-group mb-3 password-admin">
                                        <label for="password">Mật khẩu</label>
                                        <input id="passAdmin" class="form-control" type="password" required="" name="password" placeholder="" >
                                        <span class="show-pass" id="btnShowPass"><i class="fa fa-eye" aria-hidden="true"></i></span>
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-gradient btn-block" type="submit"> Đăng nhập </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        @include('Backend/elements.script')

        <script>
             // step 1
                const ipnElement = document.querySelector('#passAdmin');
                const btnElement = document.querySelector('#btnShowPass');

                // step 2
                btnElement.addEventListener('click', function() {
                // step 3
                const currentType = ipnElement.getAttribute('type');
                var typePass = '';
                // step 4
                if(currentType === 'password'){
                    typePass = 'text';
                    $('#btnShowPass').closest('.password-admin').find('.show-pass i').removeClass('fa-eye');
                    $('#btnShowPass').closest('.password-admin').find('.show-pass i').addClass('fa-eye-slash');
                }else {
                    typePass = 'password';
                    $('#btnShowPass').closest('.password-admin').find('.show-pass i').removeClass('fa-eye-slash');
                    $('#btnShowPass').closest('.password-admin').find('.show-pass i').addClass('fa-eye');
                }
                ipnElement.setAttribute(
                    'type',
                    typePass
                )
                });
        </script>
    </body>
</html>
