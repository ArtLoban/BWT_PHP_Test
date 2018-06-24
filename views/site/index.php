<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="main-content col-md-6 col-md-offset-3">
            	<div class="row">
            		<div class="top-part">
	            		<div class="date col-md-2 col-md-offset-3">
	            			<span class="text-primary"> <b><?= $weather['general'][0] ?></b> <br> <?= date('d.m')?> </span>
	            		</div>
	            		<div class="general-for-today col-md-4">
	            			<img src=" <?= $weather['general'][1] ?>" alt="" width="55" height="55">
	            			<span class='value min_temp text-primary'><?= $weather['general'][2] ?></span>
	            			..
	            			<span class='value max_temp text-danger'><?= $weather['general'][3] ?></span>
	            		</div>
            		</div>
            	</div>
            	<hr>

            	<div class="row">
            		<div class="wcontainer">
            			<table >

            				<thead>
                                <th></th>
                                <th colspan="2">Характеристики&nbsp;погоды, атмосферные&nbsp;явления</th>
                                <th>Tемпература воздуха,&nbsp;&deg;C</th>
                                <th>Атм.&nbsp;давл.,<br> мм рт. ст.</th>
                                <th>Ветер,<br>м/с</td>
                                <th>Влажность  воздуха,&nbsp;%</th>
                                <th>Ощущается, &deg;C</th>
                            </thead>

                            <tbody class="text-primary">
                                <?php for($i = 0; $i < 4; $i++):?>
                                    <tr>
                                        <th class="day-part"> <?= $weather['dayParts'][$i][0]?> </th>
                                        <td>
                                            <img src="<?= $weather['dayParts'][$i][1]?>" alt="" width="55" height="55">
                                        </td>
                                        <td>
                                            <span class="cltext"> <?= $weather['dayParts'][$i][2]?> </span>
                                        </td>
                                        <td>
                                            <span class="temp-value"> <?= $weather['dayParts'][$i][3]?> </span>
                                        </td>
                                        <td>
                                            <span> <?= $weather['dayParts'][$i][4]?> </span>
                                        </td>
                                        <td>
                                            <span> <?= $weather['dayParts'][$i][5]?> </span>
                                            <span> <?= $weather['dayParts'][$i][6]?> </span>
                                        </td>
                                        <td> <?= $weather['dayParts'][$i][7]?> </td>
                                        <td>
                                            <span> <?= $weather['dayParts'][$i][8]?> </span>
                                        </td>
                                    </tr>
                            	<?php endfor; ?>
                            </tbody>

            			</table>
            		</div>
            	</div>
            </div>
        </div>
    </div>

</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>