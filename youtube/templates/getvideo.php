	<ul class="dl-list">
<?php foreach($this->get('streams', []) as $format) { ?>
		<li>
			<a class="btn btn-default btn-type disabled"><?php echo $format['type']; ?> - <?php echo $format['quality']; ?></a>
<?php if ($format['show_direct_url'] === true) { ?>
			<a class="btn btn-default btn-download" href="<?php echo $format['direct_url']; ?>" class="mime"><i class="glyphicon glyphicon-download-alt"></i> Direct</a>
<?php } ?>
<?php if ($format['show_proxy_url'] === true) { ?>
			<a class="btn btn-primary btn-download" href="<?php echo $format['proxy_url']; ?>" class="mime"><i class="glyphicon glyphicon-download-alt"></i> Download</a>
<?php } ?>
			<div class="label label-warning"><?php echo $format['size']; ?></div>
			
		</li>
<?php } ?>
	</ul>
	