<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="/js/bootstrap.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row mt-4 justify-content-center align-items-center w-100 h-100">
            <div class="col-md-4">
            <img src="/img/logo.png" alt="" class="img-fluid">
            </div>
        </div>

        <div class="row mt-4 justify-content-center align-items-center w-100 h-100">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Login</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="post">
                            <div class="row">
                                <div class="col-md-3">Username</div>
                                <div class="col-md-9"><input name="username" class="form-control" required type="text"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">Password</div>
                                <div class="col-md-9"><input name="password" class="form-control" required type="password"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>