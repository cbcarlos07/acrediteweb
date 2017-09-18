<html>
  <head>
      <title>Pesquisas</title>
      <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
      <link rel="stylesheet" href="css/bootstrap-chosen.css" type="text/css" />
  </head>
   <body>

    <div class="container">
        <div class="col-lg-5">
            <label for="combo">Teste</label>
            <select id="combo" class="form-control cmb-teste"></select>
        </div>
        <div class="row"></div>
        <div class="col-lg-5 dados">
            <h3>Total de Respostas: <span class="total"></span></h3>
        </div>
    </div>

   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery.min.js"></script>
   <script src="js/chosen.jquery.js"></script>
   <script src="js/pesquisas.js"></script>
   <script>
       $('#combo').chosen();
   </script>
   </body>


</html>