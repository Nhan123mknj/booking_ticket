<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
    <base href="{{asset(' ')}}"/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="source/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="source/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="source/login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="source/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="source/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="source/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="source/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="source/login/images/img-01.png" alt="IMG">
				</div>

				<form action='{{ route('post-register') }}' method="POST" class="login100-form validate-form">
                    @csrf
					<span class="login100-form-title">
						Đăng ký
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        <span class="error-message" style="color: red; display: none;">Vui lòng nhập địa chỉ email hợp lệ.</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid name is required">
                        <input class="input100" type="text" name="name" placeholder="Name" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid name is required">
                        <input class="input100" type="text" name="phone" placeholder="Số điện thoại" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" placeholder="Mật khẩu" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Đăng ký
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Đã có tài khoản
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="source/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="source/login/vendor/bootstrap/js/popper.js"></script>
	<script src="source/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="source/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="source/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<!--===============================================================================================-->
	<script src="source/login/js/main.js"></script>

</body>
</html>