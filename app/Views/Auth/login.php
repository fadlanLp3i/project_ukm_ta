<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="col-md-4 mx-auto">
        <div class="card p-4">
            <h4 class="text-center">Login Sistem UKM</h4>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form method="post" action="/login/auth">
                <input type="text" name="username" id="username" class="form-control mb-3" placeholder="Username">
                <input type="password" name="password" id="password" class="form-control mb-3" placeholder="Password">
                <button class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>