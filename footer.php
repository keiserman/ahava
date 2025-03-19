<!--.............................................FOOTER SECTION....................................................................-->

</main>
<a href="#" onclick="toggle('footer-info-top')" class="accessibility-hidden">Toggle Footer Info Top</a>
<aside class="footer_info_top" id="footer-info-top">
	<div class="f_info_wrap">
	<div class="flex-wrap align-center">
		<div class="f_info_left">
			<div>
				<h2>Get an appointment</h2>
				<p>Click below to enter your information and request an appointment. Our receptionist will reach out to you with available appointment times.</p>
				<a class="request_appointment" href="/request-appointment/">REQUEST APPOINTMENT</a>
			</div>
		</div>
		<div class="f_info_right">
			<h2>Get in touch</h2>
			<p>Reach out to our friendly receptionists and we’ll take you under our wing, addressing your concerns and health goals.</p>
			<a class="f_contact_btn" href="/contact/">CONTACT US</a>
		</div>
	</div>
	</div>
</aside>

<footer>
	<div class="footer_wrap">
		<div class="f_logo">
			<a href="/"> <img src="https://ahavamedical.com/wp-content/uploads/2023/12/Ahava-Primary-Logo-2023_Ahava-Primary-Logo-2023-Color.png" alt="Ahava Medical Logo" /> </a>
			<p>Home to better health <sup>TM</sup></p>
		</div>

		<h2 class="accessibility-hidden">
			Footer Links
		</h2>
		<div class="f_links">
			<h3>Patient links</h3>
			<ul>
				<li><a href="/our-services/">Services</a></li>
				<li><a href="/locations/">Find a location</a></li>
				<li><a href="/our-doctors/">Find a doctor</a></li>
			</ul>
		</div>

		<div class="f_links">
			<h3>Resources</h3>
			<ul>
				<li><a href="/about/">About us</a></li>
				<li><a href="/about/insurance/">Insurance</a></li>
				<li><a href="/news/">News</a></li>
			</ul>
		</div>

		<div class="f_links">
			<h3>Help &amp; contacts</h3>
			<ul>
				<li><a href="/contact/">Contact us</a></li>
				<li><a href="/request-appointment/" target="_blank">Schedule appointment</a></li>
				<li><a href="https://www.google.com/search?q=ahava%20medical&sxsrf=ALiCzsbBIkgy5cA2ihXVvwjgOkQlOT_ZRQ:1657645084645&source=hp&ei=GKjNYrPpJa-29u8PiMuZqAY&iflsig=AJiK0e8AAAAAYs22KOYTyAMBboyXVIhmHPXSUwtZKL0J&oq=ahava+&gs_lcp=Cgdnd3Mtd2l6EAEYADIECCMQJzIFCAAQywEyBQgAEMsBMgUIABCABDIFCAAQkQIyBQgAEIAEMgUIABCABDIFCAAQgAQyCggAEIAEEIcCEBQyCggAEIAEEIcCEBQ6BQguEIAEOgsILhCABBDHARDRAzoLCC4QgAQQxwEQrwE6CAguEIAEENQCUABYzAVgtxFoAHAAeACAAZ0BiAHaBZIBAzAuNpgBAKABAQ&sclient=gws-wiz&tbs=lf:1,lf_ui:4&tbm=lcl&rflfq=1&num=10&rldimm=5387079785170282649&lqi=Cg1haGF2YSBtZWRpY2FsIgOIAQFIi7r8oZiCgIAIWh8QABABGAAYASINYWhhdmEgbWVkaWNhbCoGCAIQABABkgEObWVkaWNhbF9jbGluaWOqARUQASoRIg1haGF2YSBtZWRpY2FsKAA&ved=2ahUKEwis6buT6fP4AhWEk_0HHTNIDaQQvS56BAgNEAE&sa=X&rlst=f#rlfi=hd:;si:5387079785170282649,l,Cg1haGF2YSBtZWRpY2FsIgOIAQFIi7r8oZiCgIAIWh8QABABGAAYASINYWhhdmEgbWVkaWNhbCoGCAIQABABkgEObWVkaWNhbF9jbGluaWOqARUQASoRIg1haGF2YSBtZWRpY2FsKAA;mv:[[44.3075737,41.3541209],[-2.6028602,-81.32079]];tbs:lrf:!1m4!1u3!2m2!3m1!1e1!2m1!1e3!3sIAE,lf:1,lf_ui:4" target="_blank"><span class="accessibility-hidden">Google.com </span>Reviews</a></li>
			</ul>
		</div>

		<div class="f_links newsletter_form">
			<h3>Sign up for newsletter</h3>
			<?php echo do_shortcode('[contact-form-7 id="168" title="Newsletter"]'); ?>
		</div>

	</div>

	<div class="copy">
		<p>© <?php echo date("Y"); ?> Ahava Medical</p>
		<ul class="copy_links">
			<li><a href="/about/ethics/">Non-discrimination policy</a></li>
			<li><a href="/terms-conditions/">Terms & conditions</a></li>
			<li><a href="/privacy-policy/">Privacy policy</a></li>
			<li><a href="/our-careers/">Careers</a></li>
		</ul>

		<ul class="footer_social">
			<li><a href="https://www.facebook.com/ahavamedical" target="_blank"><i class="fab fa-facebook-f"></i><p class="accessibility-hidden">
				Facebook.com
				</p></a></li>
			<li><a href="https://www.instagram.com/ahavamedicalcenter/" target="_blank"><i class="fab fa-instagram"></i><p class="accessibility-hidden">
				Instagram.com
				</p></a></li>
			<li><a href="https://www.linkedin.com/in/ahava-medical-95248b238/" target="_blank"><i class="fab fa-linkedin-in"></i><p class="accessibility-hidden">
				Linkedin.com
				</p></a></li>
		</ul>
	</div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
