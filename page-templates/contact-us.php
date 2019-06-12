<?php
	/* Template Name: Contact Us */
get_header();
?>

<div class="container-fluid" style="padding-left:0px; padding-right:0px">
    <div class="row" align="center">
        <div class="col-md-12">
            <img src="<?php echo BLOG_URI; ?>/includes/img/contact-us.png" width="25%" style="max-height:200px" alt="IT Banner"/>
        </div>
    </div>
</div>
<div class='container-fluid'>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; endif;?>
		</div>
	</div>
    <div class='row'>
        <div class="col-md-6">
            <div class="conatiner-fluid">
                <div class="contact-area" >
                    <form align="left" onsubmit="return sendEmail()" class="contact-form" >
                        <h1 align="center">Contact Us</h1>
                        <div class="row">
                            <div class=" col-xs-12 col-md-8 col-md-offset-4">
                                <p class="error-message">Please fill out all required fields</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><label for="name" >Name:*</label><br /><input type="text" name="name"/></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><label for="email" >Email:*</label><br /><input type="email" name="email"/></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><label for="phone" >Phone:*</label><br /><input type="tel" name="phone"/></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><label for="website" >Website:</label><br /><input type="text" name="website"/></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><label for="company" >Company:</label><br /><input type="text" name="company"/></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><label for="message" >Message:*</label><br /><textarea rows="5" cols="50" name="message"></textarea></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="send-button" type="submit">Send Email</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h1>Contact Information</h1>
            <address>
                <p><label>Instagram:</label> <a href="https://www.instagram.com/cbmwebdevelopment/">@cbmwebdevelopment</a></p>
                <p><label>Facebook:</label> <a href="https://www.facebook.com/cbmwebdevelopment/">CBM Web Development</a></p>
                <p><label>Tel:</label> <a href="tel:336.260.0061">(336) 260-0061</a></p>
                <p><label>Email:</label> <a href="mailto:Connor.Meehan@cbmwebdevelopment.com">Connor.Meehan@cbmwebdevelopment.com</a></p>
            </address>
        </div>
    </div>
</div>
<?php
get_footer();
