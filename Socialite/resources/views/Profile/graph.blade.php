<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL('custom css/home.css')}}">
    <script src="https://kit.fontawesome.com/3ac9a28dc6.js" crossorigin="anonymous"></script>

    <title>Document</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Institution Name', 'Date'],
          <?php echo $chartData ; ?>
        ]);

        var options = {
          title: 'Working Experience (Institution vs working Days)'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <style>
        #piechart{
            position: absolute;
            left:30%;
        }
        
}
    </style>
</head>
<body>
@include('Layouts.header')
<div class="container">
        {{-- left-sidebar --}}
        @include('Layouts.sidebar')
        {{-- main-content --}}
        <div class="main-content">
            
                
          <div id="piechart" style=" width: 900px; height: 500px;"></div>

        </div>
        {{-- right-sidebar --}}
        <div class="right-sidebar"></div>
    </div>
   
</body>
</html>