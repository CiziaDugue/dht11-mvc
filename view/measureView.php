<?php $title = 'DHT11 NodeMCU'; $link = 'public/css/main.css'; $refresh = '<meta http-equiv="refresh" content="1">'; ?>

<?php ob_start(); ?>

<div id="header" class="container-fluid">
	<h1 class="text-center m-3">Relevés de température et d'humidité</h1>
</div>

<div class="container-fluid">
	<div class="row justify-content-around">
		<div class="col-md-4 col-xs-12">
			<h2 class="text-center m-2">DHT11</h2>
			<p class="text-center">Il fait <?= $latestMeasure->getTemperature() ?>°C avec <?= $latestMeasure->getHumidite() ?>% d'humidité.</p>
			<p class="text-center">Dernière mise à jour : <?= $latestMeasure->getDatetime() ?>.</p>

			<div id="thermometer" style="margin:0 auto;">
				<div id="bargraph" style="height: <?= $bargraphHeight ?>px; top: <?= $bargraphTop ?>px;"></div>
			</div>
		</div>

		<div class="col-md-8 col-xs-12">
			<h2 class="text-center m-2">API</h2>

			<div class="container my-3">

				<div class="row justify-content-end align-items-end">
					<div class="col-6">
						<h3 class="text-left m-2">Aujourd'hui</h3>
					</div>
					<div class="col-6">
						<img src="<?= $api->current_condition->icon_big ?>" alt="weather_icon">
					</div>
				</div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Heure</th>
							<th scope="col">Temps</th>
							<th scope="col">Température</th>
							<th scope="col">Humidité</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row"><?= $api->current_condition->hour ?></th>
							<td><?= $api->current_condition->condition ?></td>
							<td><?= $api->current_condition->tmp ?> °C</td>
							<td><?= $api->current_condition->humidity ?> %</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="container my-3">
				<h3 class="text-left m-2">Prévisions</h3>
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Température Min</th>
							<th scope="col">Température Max</th>
							<th scope="col">Icon</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row"><?= $api->fcst_day_1->day_long ?></th>
							<td><?= $api->fcst_day_1->tmin ?> °C</td>
							<td><?= $api->fcst_day_1->tmax ?> °C</td>
							<td><img src="<?= $api->fcst_day_1->icon ?>" alt="weather_icon"></td>
						</tr>
						<tr>
							<th scope="row"><?= $api->fcst_day_2->day_long ?></th>
							<td><?= $api->fcst_day_2->tmin ?> °C</td>
							<td><?= $api->fcst_day_2->tmax ?> °C</td>
							<td><img src="<?= $api->fcst_day_2->icon ?>" alt="weather_icon"></td>
						</tr>
						<tr>
							<th scope="row"><?= $api->fcst_day_3->day_long ?></th>
							<td><?= $api->fcst_day_3->tmin ?> °C</td>
							<td><?= $api->fcst_day_3->tmax ?> °C</td>
							<td><img src="<?= $api->fcst_day_3->icon ?>" alt="weather_icon"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
