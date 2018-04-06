<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-md-offset-4 form">
                
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                
                <form class="form-horizontal" action="#" method="post">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <h3 class="text-center">Вход на сайт</h3>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-9 col-sm-offset-1">
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label">Пароль</label>
                        <div class="col-sm-9 col-sm-offset-1">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Пароль" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group btn-div">
                        <div class="col-sm-4 col-sm-offset-1">
                            <a href="/user/register" class="regist">Регистрация</a>
                        </div>
                        <div class="col-sm-4 col-sm-offset-3">
                            <button type="submit" name="submit" class="btn btn-info">Вход</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>