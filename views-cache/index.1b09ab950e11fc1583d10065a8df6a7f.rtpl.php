<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
  
        <div class="">
		<table id="employee_grid" class="table table-condensed table-hover table-striped" width="100%" cellspacing="0">
        <thead>
            <tr>
                <!--<th data-column-id="id" data-type="numeric">Empd</th>-->
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
		url: "/res/site/response.php",
		formatters: {
			
		}
   });
});
</script>
