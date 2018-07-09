<?php if(!class_exists('Rain\Tpl')){exit;}?><script type="text/javascript">
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
		url: "./res/site/response.php",
		formatters: {
			
		}
   });
});
</script>


</body>
</html>