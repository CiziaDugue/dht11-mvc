<?php $title = 'DHT11 NodeMCU'; $link = 'public/css/main.css'; ?>
<?php $refresh = ''; ?>
<?php ob_start(); ?>

<h1>Historique de température et d'humidité</h1>
	<div>
		<input type="date" id="min" />
		<input type="date" id="max" />
		<table class="table table-striped" id="table">
			<thead>
				<tr>
					<th scope="col">Date</th>
					<th scope="col">Température</th>
					<th scope="col">Humidité</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($allMeasures as $measure): ?>
				<tr>
					<th scope="row"><?= $measure->getDatetime() ?></th>
					<td><?= $measure->getTemperature() ?> °C</td>
					<td><?= $measure->getHumidite() ?> %</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
