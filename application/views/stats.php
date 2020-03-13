    
<?php  if(current_url() == 'http://harlie.com/Create/film/'.$films['lngFilmTitleID'].'')
{echo "
<script type=\"text/javascript\" src=\"https://www.gstatic.com/charts/loader.js\"></script>
    <script type=\"text/javascript\" class=\"card-text\">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([  
          ['Rating', 'User vote'],
          [\"Ok\", ".$rating_1."],
          [\"Good\",".$rating_2."],
          [\"Satisfactory\",".$rating_3."],
          [\"Very Satisfactory\",".$rating_4."],
          ['Excellent',".$rating_5."]
        ]);

        var options = {
          title: 'Movie rating',
          width: 600,
          legend: { position: 'none' },
          chart: { title: 'Movie Rating',
                   subtitle: 'popularity by user votes %' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Votes'} // Top x-axis.
            }
          },
          bar: { groupWidth: \"90%\" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
      // document.location.reload(true);
    </script>
    <div id=\"top_x_div\" style=\"width: 900px; height: 500px;\"></div>"; } 
else {
  echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:[\'corechart\']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Ratings", { role: "style" } ],
        ["Jan",'.$month_1.', "cyan"],
        ["Feb",'.$month_2.', "silver"],
        ["Mar",'.$month_3.', "gold"],
        ["Apr", '.$month_4.', "color: #e5e4e2"],
        ["May",'.$month_5.', "lightblue"],
        ["Jun",'.$month_6.', "grey"],
        ["Jul",'.$month_7.', "green"],
        ["Aug",'.$month_8.', "yellow"],
        ["Sep",'.$month_9.', "purple"],
        ["Oct",'.$month_10.', "orange"],
        ["Nov",'.$month_11.', "maroon"],
        ["Dec",'.$month_12.', "whitegrey"],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Ratings per Month",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("top_x_div"));
      chart.draw(view, options);
  }
  </script>
<div id="top_x_div" style="width: 900px; height: 300px;"></div>';

}?>
<br><div>
<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item <?php  if(current_url() == 'http://harlie.com/Create/film/'.$films['lngFilmTitleID'].''){echo 'active'; }?>">
      <?php echo anchor("Create/film/".$films["lngFilmTitleID"]."", "1" , "class=\"page-link\""); ?>
    </li>
    <li class="page-item <?php  if(current_url() == 'http://harlie.com/Create/film/'.$films['lngFilmTitleID'].'/2'){echo 'active'; }?>">
      <?php echo anchor("Create/film/".$films["lngFilmTitleID"]."/2", "2" , "class=\"page-link\""); ?>
    </li>
  </ul>
</nav>
</div>
</body>
</html>

<!-- ['Rating', 'User vote'],
          [\"Ok\", ".$analytics[0]['voter']."],
          [\"Good\",".$analytics[1]['voter']."],
          [\"Satisfactory\",".$analytics[2]['voter']."],
          [\"Very Satisfactory\",".$analytics[3]['voter']."],
          ['Excellent',".$analytics[4]['voter']."] -->