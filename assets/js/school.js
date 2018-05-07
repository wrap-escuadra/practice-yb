$(function(){
	

	$(document).on('click','.add-award',function(){
			$('.awards').append('<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input' +
							'  type="text" class="form-control" name="awards[]" placeholder="" maxlength="100"></div>');
		});


		$(document).on('click','#addCourse',function(){
		  	$('#courseModal').modal('show');
		});


		function ddCourses(courseObject){
			var data = courseObject;
			// console.log(data);
			var courseOptions = '';
			$('select[name=course_id]').html('');
			$.each(data,function(index,item){
				courseOptions += '<option value="'+ data[index].course_id +'">'+ data[index].course_desc +' - ' + data[index].course_desc +'</option>';
			});
			// console.log(courseOptions);
			$('select[name=course_id]').html(courseOptions).selectpicker('refresh');;
			// $('select[name=country]')
		};

		$('#course-form').submit(function(e){
			e.preventDefault();
			$('input[type=submit]').attr('disabled','true').addClass('btn-disabled');
			$('#overlay').show();
			$('#spinner').show();
			$.ajax({
				url: base_url + 'school/course_add',
				data: $(this).serialize(),
				type: 'post',
				dataType: 'json',
				success: function(response){
					$('input[type=submit]').removeAttr('disabled').removeClass('btn-disabled');
					$('#overlay').hide();
					$('#spinner').hide();
					if(response.success == true)
					{
						$('.form-msg').html(response.message);	
						ddCourses(response.courses);
		            	setTimeout(function(){
		            		$('.form-modal').modal('hide');
		            		$('#form-country .form-msg').html('');
		            		$('input[name=country]').val('');
		            		$('input[name=country_code]').val('');
		            	},3000);					
					}else{
						$('.form-msg').html(response.message);
					}
				}
			});

		});

});//end jquery