<hr />
<footer class="footer container">
	<div class="col-md-12">
		<div class="">
			<p>
				Page rendered in <strong>{elapsed_time}</strong> seconds.
				and used <strong>{memory_usage}</strong> of memory
				<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
			</p>
		</div>
	</div>
</footer>