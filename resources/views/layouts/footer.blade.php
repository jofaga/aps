<footer>
	<div class="footeraps">
		<div class="container-fluid">
		
			<div class="row justify-content-around align-items-center">
				
				@foreach($socials as $social)
					<div class="col-2 footer-links">
						<a class="footer-links" href="{{$social->link}}"><h5>{{$social->nombre}}</h5></a>
					</div>
				@endforeach
				
			</div>
			<div class="row justify-content-around align-items-end">
				<div class="col-4 footer-links">
					<a class="footer-links" target="_blank" href="https://www.kriegsoft.com"><h5>Diseño Kriegsoft</h5></a>
				</div>
				<div class="col-4 footer-links">
					<p class="footer-links"><h5>Aqua productos y servicios © <?php echo date("Y"); ?></h5></p>
				</div>
				<div class="col-4 footer-links">
					<a class="footer-links" href=""><h5>Aviso de privacidad</h5></a>
				</div>
			</div>
		</div>	
	</div>
</footer>