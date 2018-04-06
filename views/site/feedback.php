<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 form">
                
                <?php if ($result): ?>
                    <div class="col-md-12 text-center">
                        <p>Ваш отзыв принят!</p><br>
                        <a href="/" class="regist"><p>Перейти на главную страницу</p></a>  
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
                            <div class="col-md-12">
                                <h3 class="text-center">Ваш отзыв</h3>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-1 control-label">Имя:</label>
                            <div class="col-md-11">
                                <input type="text" name="name" class="form-control" placeholder="Ваше имя" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-md-1 control-label">Email:</label>
                            <div class="col-md-11">
                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder=<?= $_SESSION['email']?> required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Сообщение:</label>
                             <textarea class="form-control" name="message" rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <p>Введите правильный ответ:<p>
                            <div class="col-md-2 col-sm-2">
                                <img src="/components/captcha.php" alt="Picture">
                            </div>
                            <div class="col-md-2 col-sm-2 captcha">
                                <input type="text" name="captcha" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group btn-div">
                            <div class="col-md-12">
                                <button type="submit" name="submit" class="btn btn-info">Отправить</button>
                            </div>
                        </div>
                    </form>
                
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
