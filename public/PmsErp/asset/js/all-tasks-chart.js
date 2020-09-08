( function ( $ ) {

	var charts = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
	

			this.ajaxGetTasksMonthlyData();
 
		},

		ajaxGetTasksMonthlyData: function () {
			var urlPath =  'http://' + window.location.hostname + ':8000/task-chart';
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response2 ) {
				console.log( response2 );
				charts.createCompletedJobsChart( response2 );
			});
		},

		/**
		 * Created the Completed Jobs Chart
		 */
		createCompletedJobsChart: function ( response2 ) {

			var ctx = document.getElementById("myAreaChart_Tasks");
			var myLineChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: response2.taskMonths, // The response got from the ajax request containing all month names in the database
					datasets: [{
						fill: false,
						label: "All Tasks",
						lineTension: 0.3,
						backgroundColor: "rgba(2,117,216,1)",
						borderColor: "rgba(2,117,216,1)",
						pointRadius: 5,
						pointBackgroundColor: "rgba(2,117,216,1)",
						pointBorderColor: "rgba(255,255,255,0.8)",
						pointHoverRadius: 5,
						pointHoverBackgroundColor: "rgba(2,117,216,1)",
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: response2.task_count // The response got from the ajax request containing data for the completed jobs in the corresponding months
					},
					{
						fill: false,
						label: "Completed Tasks",
						lineTension: 0.3,
						backgroundColor: "green",
						borderColor: "green",
						pointRadius: 5,
						pointBackgroundColor: "green",
						pointBorderColor: "rgba(255,255,255,0.8)",
						pointHoverRadius: 5,
						pointHoverBackgroundColor: "rgba(2,117,216,1)",
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: response2.complete // The response got from the ajax request containing data for the completed jobs in the corresponding months
					},
					{
						fill: false,
						label: "Ongoing Tasks",
						lineTension: 0.3,
						backgroundColor: "orange",
						borderColor: "orange",
						pointRadius: 5,
						pointBackgroundColor: "orange",
						pointBorderColor: "rgba(255,255,255,0.8)",
						pointHoverRadius: 5,
						pointHoverBackgroundColor: "rgba(2,117,216,1)",
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: response2.ongoing // The response got from the ajax request containing data for the completed jobs in the corresponding months
					},
					{
						fill: false,
						label: "Stuck Tasks",
						lineTension: 0.3,
						backgroundColor: "red",
						borderColor: "red",
						pointRadius: 5,
						pointBackgroundColor: "red",
						pointBorderColor: "rgba(255,255,255,0.8)",
						pointHoverRadius: 5,
						pointHoverBackgroundColor: "rgba(2,117,216,1)",
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: response2.stuck // The response got from the ajax request containing data for the completed jobs in the corresponding months
					}
				],
				},
				options: {
					scales: {
						xAxes: [{
							time: {
								unit: 'month'
							},
							gridLines: {
								display: false
							},

							ticks: {
								maxTicksLimit: 7
							}
						}],
						yAxes: [{
							ticks: {
								min: 0,
								max: response2.max, // The response got from the ajax request containing max limit for y axis
								maxTicksLimit: 5
							},
							gridLines: {
								color: "rgba(0, 0, 0, .125)",
							}
						}],
					},
					legend: {
						display: true
					}
				}
			});
		}
	};

	charts.init();

} )( jQuery );