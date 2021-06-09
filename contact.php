<?php include 'header.php';?>

	<div class="first-widget parallax" id="contact">
		<div class="parallax-overlay">
			<div class="container pageTitle">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h2 class="page-title">Contact</h2>
					</div> <!-- /.col-md-6 -->
					<div class="col-md-6 col-sm-6 text-right">
						<span class="page-location">Home / Contact</span>
					</div> <!-- /.col-md-6 -->
				</div> <!-- /.row -->
			</div> <!-- /.container -->
		</div> <!-- /.parallax-overlay -->
	</div> <!-- /.pageTitle -->

	<div class="container">	
		<div class="row"> 

			<div class="col-md-8 ">
			
				<div class="row">
                    <div class="col-md-12">
                        <div class="contact-form">
                            <h3>Send a Direct Message</h3>
	                        <div class="widget-inner">
                            <form action="#" method="post" id="contact-form">
                                <div class="row"> 
                                    <div class="col-md-4">
                                        <p>
                                            <label for="name">Your Name:</label>
                                            <input type="text" name="name" id="name">
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>
                                            <label for="email">Email Address:</label>
                                             <input type="text" name="email" id="email">
                                        </p>
                                    </div>
                                    <div class="col-md-4"> 
                                        <p>
                                            <label for="subject">Mobile No:</label>
                                             <input type="text" name="subject" id="subject" onkeypress='return isNumberKey(event)' maxlength=13>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>
                                            <label for="message">Your message:</label>
                                            <textarea name="message" id="message"></textarea>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="mainBtn" id="loading_img1" type="submit">Send Message</button>
                                <button type="button" class="mainBtn" style="display: none;" id="loading_img">
                                <i class="fa fa-spinner fa-spin"></i>Loading
                                </button>
                                    </div>
                                </div>
                               
                            </form>
                          </div> <!-- /.widget-inner -->
                        </div> <!-- /.contact-form -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
			</div> <!-- /.col-md-8 -->

		

		</div> <!-- /.row -->
	</div> <!-- /.container -->	

	
	<?php include 'footer.php';?>

	<script > 
$('form#contact-form').submit(function(e){
 e.preventDefault();
   $('#loading_img').show();
  $('#loading_img1').hide();  
 // alert('dd');
 // $("#submit").attr("disabled", true);
  $.ajax({
                url: "insert_conatct.php",
                type: "POST",
                data: new FormData(this),
                contentType:false,
                processData:false,
                success: function(data)

                {
                	// alert(data);
                	if(data=='1')
                	{
                  swal({
								position: "top-end",
								type: "success",
								title: "Your Response Successfully  Send",
								showConfirmButton: false,
								timer: 3000
								}).then(function() {
    window.location = "contact.php";
});
                                    $('#loading_img').hide(); 
                                $('#loading_img1').show(); 
                }
                else
                {
                	alert(data);
                    $('#loading_img').hide(); 
                $('#loading_img1').show(); 
                }
            }
            });
});
  </script>
  <script>

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>