<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 fb-list">
                <h4 class="text-center text-info">Отзывы пользователей</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php for($i = 0; $i < $count; $i++):?>
                    <div class="row">
                        <div class="col-md-12">
                            <span><strong><?= $feedbacksList[$i]['name']; ?></strong></span>
                            <span> ( <u><?= $feedbacksList[$i]['email']; ?></u> ) </span>
                        </div>
                        <div class="col-md-12">
                            <p><?= nl2br($feedbacksList[$i]['message']); ?></p>
                        </div>
                        <div class="col-md-12 text-right">
                            <span><span class="text-muted">Дата: </span><?= FeedbackController::getDate($feedbacksList[$i]['date']) ?></span>
                            <hr>
                        </div>
                    </div>     
               <?php endfor; ?>
                
                <!-- Постраничная навигация -->
                <?php echo $pagination->get(); ?>
                
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>