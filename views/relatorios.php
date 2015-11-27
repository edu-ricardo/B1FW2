<script type="text/javascript" src="scripts/googleCharts.js"></script>
<script type="text/javascript">

      // Carregar a API de visualizacao e os pacotes necessarios.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Especificar um callback para ser executado quando a API for carregada.
      google.setOnLoadCallback(desenharGrafico);

      /**
       * Funcao que preenche os dados do grafico
       */
      function desenharGrafico() {
        // Montar os dados usados pelo grafico
        var dados = new google.visualization.arrayToDataTable([
        	["Disciplina", "Média"],
<?php

include_once('dbfun/conexao.php');

$sql = "select d.cod_disciplina,round(coalesce(sum(nota)/count(distinct id_nota) ,0),2) media
from nota n
inner join disciplina d on d.id_disciplina = n.id_disciplina
group by d.cod_disciplina";

$q = mysqli_query($con, $sql);
$flag = True;
while ($res = mysqli_fetch_assoc($q)) {
	if($flag) 	
		$flag = False;
	else
		echo ",";

	echo "['".$res['cod_disciplina']."', ".$res['media']."]";
}

?>
        ]);

        // Configuracoes do grafico
        var config = {
            'title':'Média de nota por Disciplina',
            'width':800,
            'height':600,
            bars: 'horizontal', // Required for Material Bar Charts.
			bar: {groupWidth: "95%"},
        };

        // Instanciar o objeto de geracao de graficos de pizza,
        // informando o elemento HTML onde o grafico sera desenhado.
        var chart = new google.visualization.BarChart(document.getElementById('area_grafico'));

        // Desenhar o grafico (usando os dados e as configuracoes criadas)
        chart.draw(dados, config);
      }
</script>
<div class="col-md-10" id="area_grafico"></div>