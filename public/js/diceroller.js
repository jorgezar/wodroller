
$(document).ready(function() {
    $('#rollForm').on('submit', function(e) {

    	var myChart;
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
            	// show label
                $('#results_label').removeClass('label_hidden');

                // create fresh canvas
                $('#diceroller_results').html('<canvas id="chart"  width="400" height="200"></canvas>');

            	var ctx = document.getElementById("chart");

            	ctx.height = 300;

            	var labels = data.labels;
            	var counts = data.counts;
            	
            	var myChart = new Chart(ctx, {
            	  type: 'line',
            	  data: {
            	    labels: labels,
            	    datasets: [
            	      { 
            	        data: counts
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
            	
            	
            	
            	
                
            },
            error: function(data){
            	console.log('Request ERROR');
            }
            
        })
            
    })
	
//    $('[data-toggle="tooltip"]').tooltip();
    
});      
function drawGraph(data) {

	var ctx = document.getElementById("chart");
	
	ctx.height = 300;

	var labels = data.labels;
	var counts = data.counts;
	
	var myChart = new Chart(ctx, {
	  type: 'line',
	  data: {
	    labels: labels,
	    datasets: [
	      { 
	        data: counts
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
