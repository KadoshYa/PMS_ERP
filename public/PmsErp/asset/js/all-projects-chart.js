( function ( $ ) {

	var charts = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

			this.ajaxGetProjectMonthlyData();

		},

		ajaxGetProjectMonthlyData: function () {
			var urlPath =  'http://' + window.location.hostname + ':8000/project-chart';
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {
				console.log( response );
				charts.createCompletedJobsChart( response );
			});
		},

		/**
		 * Created the Completed Jobs Chart
		 */
		createCompletedJobsChart: function ( response ) {

			var ctx = document.getElementById("myAreaChart");
			var myLineChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: response.months, // The response got from the ajax request containing all month names in the database
					datasets: [{
						fill: false,
						label: "All Projects",
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
						data: response.project_count // The response got from the ajax request containing data for the completed jobs in the corresponding months
					},
					{
						fill: false,
						label: "Completed Projects",
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
						data: response.complete // The response got from the ajax request containing data for the completed jobs in the corresponding months
					},
					{
						fill: false,
						label: "Ongoing Projects",
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
						data: response.ongoing // The response got from the ajax request containing data for the completed jobs in the corresponding months
					},
					{
						fill: false,
						label: "Stuck Projects",
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
						data: response.stuck // The response got from the ajax request containing data for the completed jobs in the corresponding months
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
								max: response.max, // The response got from the ajax request containing max limit for y axis
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