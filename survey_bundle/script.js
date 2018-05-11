$(document).ready(function(){
		$('#submit_survey').on('click', function(){
			$('.message').remove();
			var name=$('#user_name').val();
			var goal1=$('#goal1').val();
			var goal2=$('#goal2').val();
			var goal3=$('#goal3').val();
			$.ajax({
				dataType: 'json', 
				data: {
				name:name, 
				goal1:goal1, 						
				goal2:goal2,
				goal3:goal3
			},
				type: 'post',
				success: function (response) {
					var message= '<span class="message">'+response.message+'</span>';
					if (response.status == 'success') {	

						$('#myModal p').html(message);
						$('#myModal p').addClass('success');
						$('#myModal').show();

					}
					else if(response.status == 'missing_parameter'){
						$('#myModal p').html(message);
						$('#myModal p').addClass('error');
						$('#myModal').show();
					}
				},
				error: function (response) {

				}
			});
		})

			$('.close').on('click', function(){
				$('#myModal').hide();
			})

	})