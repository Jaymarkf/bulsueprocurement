	$('document').ready(function(){

		var branch_state = false;
//		var email_sate = false;
	
		$('#branch').on('blur', function(){
			var branch = $('#branch').val();

			if (branch == '') {
				branch_state = false;
				return;
			}

			$.ajax({
				url: 'registration.php',
				type: 'post',
				data: {
					'branch_check' : 1,
					'branch' : branch,
				},
				success: function(response){
					if (response == 'taken' ) {
						branch_state = false;
						$('#branch').parent().removeClass();
						$('#branch').parent().addClass("form_error");
						$('#branch').siblings("span").text('Sorry... branch already taken');
					}else if (response == 'not_taken') {
						branch_state = true;
						$('#branch').parent().removeClass();
						$('#branch').parent().addClass("form_success");
						$('#branch').siblings("span").text('branch available');
					}
				}
			});
		});		

	//	$('#email').on('blur', function(){
	//		var email = $('#email').val();

//			if (email == '') {
	//			email_state = false;
	//			return;
	//		}

		//	$.ajax({
		//		url: 'register.php',
		//		type: 'post',
		//		data: {
		//			'email_check' : 1,
		//			'email' : email,
		//		},
		//		success: function(response){
		//			if (response == 'taken' ) {
		//				email_state = false;
		//				$('#email').parent().removeClass();
		//				$('#email').parent().addClass("form_error");
		//				$('#email').siblings("span").text('Sorry... Email already taken');
		//			}else if (response == 'not_taken') {
		//				email_state = true;
		//				$('#email').parent().removeClass();
		//				$('#email').parent().addClass("form_success");
		//				$('#email').siblings("span").text('Email available');
		//			}
		//		}
		//	});
	//	});

		$('#reg_btn').on('click', function(){
			var username = $('#username').val();
			var email = $('#email').val();
			var password = $('#password').val();

			if (username_state == false || email_state == false) {
				$('#error_msg').text('Fix the errors in the form first');
			}else{
				// proceed with form submission
				$.ajax({
					url: 'register.php',
					type: 'post',
					data: {
						'save' : 1,
						'email' : email,
						'username' : username,
						'password' : password,
					},
					success: function(response){
						alert('user saved');
						$('#username').val('');
						$('#email').val('');
						$('#password').val('');
					}
				});
			}

		});
	});