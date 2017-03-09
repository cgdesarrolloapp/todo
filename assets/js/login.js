$(document).ready(function() {
			
				//login
				
				$('#login').click(function(){
				var username=$("#username").val();
				var password=$("#password").val();
				var dataString = 'username='+username+'&password='+password;
				//alert(dataString);
				if($.trim(username).length>0 && $.trim(password).length>0){}			{
				$.ajax({
			    type: "POST",
				url: "ajaxLogin.php",
				data: dataString,
				cache: false,
				beforeSend: function(){ $("#login").val('Conectando...');},
				success: function(data){
				if(data){
					if( data == 1 ){
						window.location.href = "index.php";
						console.log(data);
					} else {
												
						 $('#box').shake();
						 $("#login").val('Ingresar')
						 $("#error").html("<center><h3><span class='glyphicon glyphicon-warning-sign' style='color:#cc0000'></span> Usuario o password incorrecto. </h3><center>");
						 $('#login').css('background-color','red');
						 $('#error').css('background-color','#ffffff')
						 $('#error h3').css('color','#000000')
						  console.log(data);
						
						}
				}
				}
				});
				
				}
				return false;
				});
				
				
					
			});