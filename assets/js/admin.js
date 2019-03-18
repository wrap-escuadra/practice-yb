

$(function(){
	function ddCountries(countryObject){
		var data = countryObject;
		// console.log(data);
		var countryOptions = '';
		$('select[name=country]').html('');
		$.each(data,function(index,item){
			countryOptions += '<option value="'+ data[index].country_id +'">' + data[index].country_name +'</option>';
		});
		console.log(countryOptions);
		$('select[name=country]').html(countryOptions).selectpicker('refresh');;
		// $('select[name=country]')
	};

	$('select[name=country]').selectpicker();
	$('#form-country').submit(function(event) {
		 event.preventDefault();
		$('input[type="submit"]').attr('disabled');
		$('input[type="submit"]').addClass('btn-disabled');
		$('#overlay').show();
		$('#spinner').show();
	    $.ajax({
	        url : base_url + 'admin/country_add',
	        data : $(this).serialize(),
	        type : 'post',
	        dataType: 'json',
	        success : function(response) {
	        	console.log(response);
	        	$('input[type="submit"]').removeAttr('disabled');
	        	$('#overlay').hide();
				$('#spinner').hide();
	            if(response.success == true ){
	            	$('#form-country .form-msg').html(response.message);
	            	ddCountries(response.countries);
	            	setTimeout(function(){
	            		$('.form-modal').modal('hide');
	            		$('#form-country .form-msg').html('');
	            		$('input[name=country]').val('');
	            		$('input[name=country_code]').val('');
	            	},3000);
	            }else{
	            	$('#form-country .form-msg').html(response.message);
	            }
	      	}
	    });
	});

}); //endjquery


