
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
              	  explode: $('#tenExplode').is(':checked'),
              	  fail: $('#oneFail').is(':checked')
            },
            dataType: 'html',
            success: function(data){
            	var data = JSON.parse(data);
            	console.log('Request OK');
                $('#results_label').removeClass('label_hidden');
                drawGraph(data);
                
            },
            error: function(data){
            	console.log('Request ERROR');
            }
        })
            
    })
	
    $('[data-toggle="tooltip"]').tooltip();
    
});      
function drawGraph(data) {

	var ctx = document.getElementById("chart");

	ctx.height = 300;
	var myChart = new Chart(ctx, {
	  type: 'line',
	  data: {
	    labels: data.labels,
	    datasets: [
	      { 
	        data: data.counts
	      }
	    ]
	  },
		options: {
		    maintainAspectRatio: false,
		    legend: {
		    	display: false
		    }

		}
	});
}
