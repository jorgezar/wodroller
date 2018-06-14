
$(document).ready(function() {
    $('#rollForm').on('submit', function(e) {

        /* stop form from submitting normally */
        e.preventDefault(e);
        $.ajax({
            type:"GET",
            url:'wodroll',
            data:{
            	  diceNumber: $('#diceNo').val(), 
              	  difficulty: $('#difficulty').val(),
              	  explode: $('#tenExplode').val(),
              	  fail: $('#oneFail').val()
            },
            dataType: 'html',
            success: function(data){
            	console.log('Request OK');
                console.log(data);
                $('#diceroller_results').html(data);
            },
            error: function(data){
            	console.log('Request ERROR');
            }
        })
            
        
        
/*        var posting = $.get( url, { 
      	  diceNumber: $('#diceNo').val(), 
      	  difficulty: $('#difficulty').val(),
      	  explode: $('#tenExplode').val(),
      	  fail: $('#oneFail').val()
        } );
        
        posting.done(function( data ) {
            alert('success');
          });
*/        
    })
	
    $("#rollForm").submit(function(event) {

      } )

      /* Alerts the results */

      

});      