@extends('layouts.web')
@include('layouts.navbar')
@section('content')


<link rel="stylesheet" href="{!! asset('/css/acordion.css' )!!}">

<div class="flex-container">
  <div class="spinner">
    <p>
    
    <div class="cube1"></div>
    <div class="cube2"></div>
    Loading...
    </p>
  </div>
  <div class="flex-slide home">
    <div class="flex-title flex-title-home">Home</div>
    <div class="flex-about flex-about-home">
      <p>Click here to navigate to the home section of the website</p>
    </div>
  </div>
  <div class="flex-slide about">
    <div class="flex-title">About</div>
    <div class="flex-about">
      <p>Click here to navigate to the About section of the website</p>
    </div>
  </div>
  <div class="flex-slide work">
    <div class="flex-title">Work</div>
    <div class="flex-about">
      <p>Listing relevant snippets of work:</p>
      <ul>
        <li>First piece of work</li>
        <li>Second piece of work</li>
        <li>Third piece of work</li>
      </ul>
    </div>
  </div>
  <div class="flex-slide contact">
    <div class="flex-title">Contact</div>
    <div class="flex-about">
      <p>Use the contact form below</p>
      <form class="contact-form">
        <p>Email
          <input type="text" name="email">
        </p>
        <p>Comment
          <textarea type="text" name="comment" row="5"></textarea>
        </p>
        <p>
          <input type="submit" name="email" value="Send Message">
        </p>
      </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.waitforimages/2.2.0/jquery.waitforimages.min.js"></script> 
<script>
(function(){
		$('.flex-container').waitForImages(function() {
			$('.spinner').fadeOut();
	}, $.noop, true);
	
	$(".flex-slide").each(function(){
		$(this).hover(function(){
			$(this).find('.flex-title').css({
				transform: 'rotate(0deg)',
				top: '10%'
			});
			$(this).find('.flex-about').css({
				opacity: '1'
			});
		}, function(){
			$(this).find('.flex-title').css({
				transform: 'rotate(90deg)',
				top: '15%'
			});
			$(this).find('.flex-about').css({
				opacity: '0'
			});
		})
	});
})();
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

@endsection

