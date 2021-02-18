  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>


    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Views',     <?php echo $session->count;?>],
          ['Comments',  <?php echo Comment::count_all();?>],
          ['Users',     <?php echo User::count_all(); ?>],
          ['Photos',    <?php echo Photo::count_all(); ?>]
        ]);

        var options = {
          legend:'none',
          pieSliceText:'label',
          backgrounColor:'transparent',
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/pxojxjmpv9eset56rmbmp3zqzlt109o74a1xslbrwpfybbln/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
