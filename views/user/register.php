<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-md-offset-4 form">

                <?php if ($result): ?>
                    <div class="col-sm-12 text-center">
                        <p>Вы зарегистрированы!</p><br>
                        <a href="/" class="regist"><p>Перейти к просмотру погоды</p></a>  
                    </div>
                <?php else: ?>
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
                                <h3 class="text-center">Регистрация</h3>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-4 control-label">Ваше имя</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSurname" class="col-sm-4 control-label">Фамилия</label>
                            <div class="col-sm-8">
                                <input type="text" name="surname" class="form-control" id="inputSurname" placeholder="Surname" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-4 control-label">Пароль</label>
                            <div class="col-sm-8">
                                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Ваш пол</label>
                            <div class="col-sm-8">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="gridRadios1" value="male">
                                        Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="gridRadios2" value="female">
                                        Female
                                    </label>

                                </div>
                            </div>   
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-4 control-label">День рождения</label>
                            <div class="col-sm-8 bday">
                                 <input type="date" name="bday">
                            </div>
                        </div>

                        <hr>
                        <div class="form-group btn-div">
                            <div class="col-sm-4 col-sm-offset-3">
                                <button type="submit" name="submit" class="btn btn-info">Зарегистрироваться</button>
                            </div>
                        </div>
                    </form>
                
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>