<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        .login-container { width: 300px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; }
        .form-group { margin-bottom: 15px; }
        input { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    
    <form action="<?= base_url('/login/auth') ?>" method="post">
        
        <?= csrf_field() ?>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan Password" required>
        </div>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>