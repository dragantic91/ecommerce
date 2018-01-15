<!DOCTYPE html>
<html lang="en" style="height: 100%;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Schoengebraucht Admin Login</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('back/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php
        echo json_encode([
            'csrfToken' => csrf_token(),
        ]);
        ?>
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 1px solid #1a1a1a;">

    <a class="navbar-brand text-white" href="{{ route('admin.dashboard') }}">
        <img src="{{ asset('back/img/admin2.png') }}" height="30" />
    </a>

</nav>
<div class="container-fluid">
    <div class="row justify-content-center align-items-center" style="height: 100vh;" >
        <div class="col-8" style="max-width: 650px">
            <div class="card card-default">
                <div class="card-header">

                    {{ __('lang.admin-login-card-title') }}
                </div>
                <div class="card-body" >
                    <form method="post" action="{{ route('admin.login.post') }}" >
                        {{ csrf_field() }}

                        @include('admin.forms.text',['name' => 'email','label' => __('lang.admin-email-label')])
                        @include('admin.forms.password',['name' => 'password','label' => __('lang.admin-password-label')])

                        <div class="form-group">

                            <button type="submit" class="btn btn-primary">
                                {{ __('lang.admin-login-button-title') }}
                            </button>

                            <a href="{{ route('admin.password.reset') }}">
                                {{ __('lang.admin-login-forget-password-link') }}
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Scripts -->
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('admin/js/jquery-3.2.1.min.js') }}"></script>

<script>
    $(function() {
        var timeoutFlag;
        function checkFields() {

            clearTimeout(timeoutFlag);
            var emailFieldValue = jQuery('#email').val();
            var passwordFieldValue = jQuery('#password').val();


            var emailValidationRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            if(emailFieldValue != "" && emailValidationRegex.test(emailFieldValue) && passwordFieldValue  != "") {
                jQuery('.login-button').attr('disabled', false);
                jQuery('.login-button').addClass('btn-primary');
            } else {
                jQuery('.login-button').attr('disabled', true);
                jQuery('.login-button').removeClass('btn-primary');
            }
        }
        jQuery(document).on('keyup', '#email , #password', function(e){
            checkFields();
        });

        jQuery(document).on('change', '#email, #password', function(e){
            checkFields();
        });
        timeoutFlag = setTimeout(function(){ checkFields(); }, 100);

    });
</script>
</body>
</html>