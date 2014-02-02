
          <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="plugin/jquery/jquery-1.10.2.min.js"></script>
    <script src="plugin/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
  $(function(){
    $('.actor').tooltip();
    $('#playing-area-tab a').click(function (e) {
              e.preventDefault();
              $(this).tab('show');
            })

  });
</script>
  <footer>
  <div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4 text-center text-gray">
                Designed and built by <a target='_blank'href="https://github.com/gaplo917/php_movie_center.git">@GaryLo</a>.
  Code licensed under MIT, documentation under CC BY 3.0.
    </div>
  </div>

  </div>

  <!-- <ul class="list-unstyled ">
    <li class="text-right">Powered By</li>
    <li class="text-right">LO Gap</li>
  </ul> -->
  </footer>
</html>
