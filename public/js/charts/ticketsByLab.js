function getChartTicketsByLab(url, params)
{
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: params,
		beforeSend: function(xhr){
			//$('#chartBarClientsByAgeSpin').show();
		},
		success: function(result){			
			//$('#chartBarClientsByAgeSpin').hide();
      //console.log(result);
			createChartTicketsByLab(result);
		}
	});	
}

function createChartTicketsByLab(jsonData)
{
    console.log(jsonData.data);
    var donutChartCanvas = $('#ticketsByLab').get(0).getContext('2d');
    var donutData = {
      labels: jsonData.labels,
      datasets: [
        {
          data: jsonData.data,
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions = {
      maintainAspectRatio : false,
      responsive : true,
    }
    
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
  
}