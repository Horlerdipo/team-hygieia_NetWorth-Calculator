

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Poppins|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>
<body>
   <div class="container-fluid">
       <div class="row">
            <div class="col-md-1"></div>
           <div class="col-md-6 adjust form-container">
           <div class="alert-box">
					
          </div>
                <div class="spinner-border text-primary text-center" role="status">
            <span class="sr-only">Signing you up...</span>
            </div>
                <form action="" method="post">
                    <div class="form-group form-input">
                        
                        <div class="input-group">
                            <input type="text" class="form-control" id="last-name-field" placeholder="Your Name*" name="name" minlength="4" required>
                        </div>
                        <div class="input-group">
                            <input type="email" class="form-control" id="email-field" placeholder="Email*" name="email" required>
                        </div>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password-field" placeholder="Password*" name="password" required>
                        </div>
                    </div>
                    <div class="sign-in">
                        <button class="btn btn-primary btn-block">Sign up</button>
                    </div>
                    
                </form>
                <div class="sign-up text-center">
                        <p>Already a member? <a href="<?php echo base_url()?>"><span class="sign">Sign in</span></a></p>
                    </div>
           </div>
           <div class="col-md-4 form-container gradient-bg">
                <div class="welcome">
                   <h1 class="text-center hygieia">Hygieia<br> Net Worth Calculator</h1>
                   <p class="details">Calculate your total net work</p>
                   <p class="details">Get your total asset all in one place</p>
                   <p class="details">Summary of your liabilities</p>
                </div>
                <div class="icon row justify-content-center">
                    <i class="fas fa-arrow-alt-circle-left fa-2x"></i>
                </div>
            </div>
       </div>
   </div> 
</body>
</html>









<script>
	$(document).ready(()=>{
		$('.spinner-border').hide();
	})
	$('form').on('submit',(e)=>{
		e.preventDefault();
        console.log($('#pass1').val());
        console.log($('#pass2').val());
        if($('#pass1').val()===$('#pass1').val()){
		$.ajax({
			type:'POST',
			url:'<?php echo base_url();?>auth/register',
			dataType:'text',
			data:$('form').serialize(),
			beforeSend:()=>{
				$('.spinner-border').show();
				$('form').hide();
                $('.alert-box').html('');
			},
			
			success:(data)=>{
				//console.log(data);
				function succession(){
					let result=JSON.parse(data);
					$('.spinner-border').hide();
					
					
					if(result['success'] !== ''){
						$('.alert-box').html('<div class="alert alert-success" role="alert">'+result['success']+'</div>');
						
					}else{
						$('form').show();
						$('.alert-box').html('<div class="alert alert-danger" role="alert">'+result['error']+'</div>');
					}
				}
				setTimeout(succession,3000);
				
			},
			error:(err)=>{
				$('.spinner-border').hide();
				$('form').show();
				console.log(err);
			}
		})
    }else{

        $('form').show();
        $('.alert-box').html('<div class="alert alert-danger" role="alert">Passwords do not match</div>');

    }
	})
</script>



