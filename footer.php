

<footer class="main-footer">
    <div class="container-fluid">
	    <div class="row footer-content">
		    <div class="col-md-4 mx-auto footer-content--left">
			    <?php dynamic_sidebar( 'left-footer-sidebar' ); ?>
		    </div>
		    <div class="col-md-4 mx-auto footer-content--middle">
			    <?php dynamic_sidebar( 'middle-footer-sidebar' ); ?>
		    </div>
		    <div class="col-md-4 mx-auto footer-content--right">
			    <?php dynamic_sidebar( 'right-footer-sidebar' ); ?>
		    </div>
	    </div>
        <div class="row footer-brand">
            <div class="col-md-12">
                <p>CBM Web Development &copy;<?php echo date('Y'); ?></p>
            </div>
        </div>
    </div>
</footer>
<?php
wp_footer();
?>
</body>
</html>
