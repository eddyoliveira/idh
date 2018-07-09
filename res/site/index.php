<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Example Bootgrid (Server Side) with PHP, MySQL and Ajax</title>
<link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all">
<link href="dist/jquery.bootgrid.css" rel="stylesheet" />
<script src="dist/jquery-1.11.1.min.js"></script>
<script src="dist/bootstrap.min.js"></script>
<script src="dist/jquery.bootgrid.min.js"></script>
</head>
    
<body>
       
       <div class="container">
      <div class="">
        <h1><a href="#" target="_blank" rel="nofollow" class="link-red">Portal da Transparência</a></h1>
        <div class="">
		<table id="employee_grid" class="table table-condensed table-hover table-striped" width="100%" cellspacing="0">
        <thead>
            <tr>
                <!--<th data-column-id="Name" data-type="numeric">Empd</th>-->
                <th data-column-id="cidade">Cidade</th>
				<th data-column-id="periodo">Período</th>
                <th data-column-id="tipo">Tipo de Execução</th>
                <th data-column-id="setor">Setor</th>
                <th data-column-id="arquivo">Arquivo</th>
            </tr>
        </thead>
 
        
    </table>
    </div>
      </div>

    </div>

<script type="text/javascript">
$( document ).ready(function() {
	$("#employee_grid").bootgrid({
		ajax: true,
		post: function ()
		{
			/* To accumulate custom parameter with the request object */
			return {
				id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
			};
		},
		url: "response.php",
		formatters: {
			
		}
   });
});
</script>

        
  