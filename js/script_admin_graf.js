$(document).ready(function(){
	$(".vivod_ot").hide();
    $("#but_date").on("click",function(){
		var date_do = $("#do_date").val();
		var date_pos = $("#posle_date").val();
		var vid_oper = $("#vid_otch").val();
		if(date_do == "" || date_pos == "" || vid_oper == "" || date_do > date_pos){
			alert("Данные не коректно введены");
		}
		else{
			$.ajax({
				type:'POST',
				url:'admin_graf.php',
				data:({date_do, date_pos,vid_oper}),
				dataType:"html",
				beforeSend:function(){
					$("title").html("Загрузка");
				},
				success:function(data){
					$("title").html("Готово");
					var char_data = JSON.parse(data);
					google.charts.load("current", {packages:["corechart"]});
					google.charts.setOnLoadCallback(drawChart);
					function drawChart() {
						var data2 = google.visualization.arrayToDataTable([
							['Task', 'Hours per Day'],
							['RUB',Number(char_data["RUB"])],
							['USD',Number(char_data["USD"])],
							['EUR',Number(char_data["EUR"])],
							['CHF',Number(char_data["CHF"])],
							['CZK',Number(char_data["CZK"])]
							]);
						var options = {
							title: vid_oper+' за переод от '+date_do+" до "+date_pos,
							is3D: true,
						};
						var chart = new google.visualization.PieChart(document.getElementById("piechart_3d"));
						chart.draw(data2, options);
					}
				$(".table_otchet").empty();
				$(".table_otchet").append('<CAPTION>' + vid_oper + '</CAPTION> <tr> <td>'+ 'RUB'+'<td> <td>'+ 'USD' + '<td> <td>' + 'EUR'+'<td> <td>'+ 'CHF'+'<td> <td>'+ 'CZK'+'<td> </tr>'+
					'<tr><td>'+ Number(char_data["RUB"])+'<td> <td>'+ Number(char_data["USD"]) + '<td> <td>' + Number(char_data["EUR"]) +'<td> <td>'+ Number(char_data["CHF"])+'<td> <td>'+ Number(char_data["CZK"])+'<td> </tr>');
				$(".vivod_ot").show();
				$(".piechart_3d").show();
				}
			});
		}
	});
});
