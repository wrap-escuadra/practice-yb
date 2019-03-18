$(window).load(function(){
   $('#loader').fadeOut(300);
   $('#overlay').fadeOut(300);
});

function myLoader(action)
{
  if(action == 'show')
  {
    $('#loader').fadeIn(300);
    $('#overlay').fadeIn(300);
  }else if(action == 'hide')
  {
    $('#loader').fadeOut(500);
    $('#overlay').fadeOut(300);
  }
}

//accepts object ( errors)
function showErrors(data){
console.log(data);
    $('.input-error').remove();
    $.each(data, function(i,item){
        elem = data[i].type+'[name='+ data[i].field+ ']';
        if(data[i].error != '' ){
            $(data[i].error).insertBefore($(elem));
            $(elem).addClass('red-border');
        }else{
            $(elem).removeClass('red-border');
        }
    });
}
// $(function(){
	


    /**
    	browser pressing keys  validation
    **/
    $(document).on('keypress','.nopress',function(e){
    	return false;
	});

    $(document).on('keypress','.number',function(e){
	    var regEx = /[0-9]/
	    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

		if (e.which > 13){return regEx.test(str);}
	});	


	$(".alphanumonly").keypress(function (e){
	    var regEx = /[a-zA-Z0-9\s]/
	    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

		if (e.which > 13){return regEx.test(str);}
	});

	$(".alpha").keypress(function (e){
	    var regEx = /[.,a-zA-Z_-\s]/
	    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

		if (e.which > 13){return regEx.test(str);}
	});

	/**
		end browser pressing keys  validation
	**/

	$('.datepicker').datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "-50:+0",
      // dateFormat: 'mm-dd-yy',
  	  constrainInput: false,
  	  maxDate: new Date,
      // showOn: "button",
      // buttonImage: "images/calendar.png",
      // buttonImageOnly: true,
      // buttonText: "Select date"
    }); 

	$( document ).on( 'focus', ':input', function(){
        $( this ).attr( 'autocomplete', 'off' );
    });

    // $('input[type=submit],input[type=submit]').click(function(){
    // 	alert();
    // 	$(this).attr('disabled',true);
    // 	setTimeout(function(){
    // 		$(this).attr('disabled',false);
    // 	},1500);
    // });
    

// });