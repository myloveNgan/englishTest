<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Đăng nhập</title>
</head>
<style>
    body{
    background-image: url('frontend/images/background_login.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    padding-top: 100px;
    width: 100%;
    height: 100%;
}
</style>
<body>
    <div class="container_login">
        <div class="row d-flex justify-content-center align-content-center">
            <div class="col-md-4 box_login_acc">
                <h5 class="text-center">Đăng nhập</h5>
                <form action="{{route('admin_login')}}" method="post">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tài khoản</label>
                        <input type="text" class="form-control" name="admin_user" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput12" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" name="admin_password" id="exampleFormControlInput12">
                    </div>
                    <div >
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                      </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>