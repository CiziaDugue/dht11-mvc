<?php $title = 'DHT11 NodeMCU'; $link = 'public/css/main.css'; ?>
<?php $refresh = '<meta http-equiv="refresh" content="1">'; ?>

<?php ob_start(); ?>

<h1>Relevés de température et d'humidité</h1>

		<p>Il fait <?= $latestMeasure->getTemperature() ?>°C avec <?= $latestMeasure->getHumidite() ?>% d'humidité.</p>

		<p>Dernière mise à jour : <?= $latestMeasure->getDatetime() ?>.</p>

		<div id="thermometer">
			<div id="bargraph" style="height: <?= $bargraphHeight ?>px; top: <?= $bargraphTop ?>px;"></div>
		</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
