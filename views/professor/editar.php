<?php
  function getCursos()
  {
    include 'dbfun/conexao.php';

    $sql = "select * from curso";
    if ( $query = mysqli_query($con, $sql)){
      return $query;
    }else
      echo mysqli_error($con);
  }

  function getDisciplinas()
  {
    include 'dbfun/conexao.php';

    $sql = "select * from disciplina";
    if ( $query = mysqli_query($con, $sql)){
      return $query;
    }else
      echo mysqli_error($con);
  }  

  function isCursoProf($curso, $prof)
  {
  	include 'dbfun/conexao.php';

    $sql = "select * from curso_professor where id_curso = $curso and id_professor = $prof";

    if ( $query = mysqli_query($con, $sql)){
  		if (mysqli_num_rows($query) != 0){
  			return TRUE;
  		}else
  			return FALSE;
    }else
      echo mysqli_error($con);
  }

  function isDiscProf($disc, $prof)
  {
  	include 'dbfun/conexao.php';

    $sql = "select * from disciplina_professor where id_disciplina = $disc and id_professor = $prof";

    if ( $query = mysqli_query($con, $sql)){
  		if (mysqli_num_rows($query) != 0){
  			return TRUE;
  		}else
  			return FALSE;
    }else
      echo mysqli_error($con);
  }

  include 'crud/professor.php';
  $prof = getProfessor($_GET['id']);
?>

<div class="col-md-10 main">
  <form action="crud/professor.php" method="post" class="form-horizontal">
    <fieldset>
      <legend>Editar Professor</legend>
      <div class="form-group">
        <label class="col-md-2 control-label" for="matricula">matricula</label>
        <div class="col-md-10">
          <input required class="form-control" id="matricula" name="matricula" type="text" placeholder="matricula" value="<?php echo $prof['matricula'];?>" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label" for="nome">nome</label>
        <div class="col-md-10">
          <input required class="form-control" id="nome" name="nome" type="text" placeholder="nome" value="<?php echo $prof['nome'];?>"  />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label" for="titulacao">titulação</label> 
        <div class="col-md-10">
          <input required class="form-control" id="titulacao" name="titulacao" type="text" placeholder="titulacao" value="<?php echo $prof['titulacao'];?>" />
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label" for="usuario">usuario</label>
        <div class="col-md-10">
          <select class="form-control" name="id_usuario" id="usuario">
            <option value='' selected=""></option>
            <?php 
              $qProf = getUsuarioProfessorAll();
              while ($uProf = mysqli_fetch_array($qProf)){
                echo "<option ";
                if ($uProf['id_usuario'] == $prof['id_usuario'] ) 
                  echo 'selected ';
                echo " value='".$uProf['id_usuario']."'>".$uProf['login']."</option>";
              } 
            ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label" for="curso">curso(s)</label>
        <div class="col-md-10">
          <select multiple class="form-control" name="id_curso[]" id="curso" >
            <?php 
              $qCursos = getCursos();
              while ($uCurso = mysqli_fetch_array($qCursos)){
                echo "<option ";
                if (isCursoProf($uCurso['id_curso'], $_GET['id']) == TRUE){ echo "selected ";} 
                echo " value='".$uCurso['id_curso']."'>".$uCurso['nome']." - ".$uCurso['periodo']."</option>";
              } 
            ?>
          </select>
          <span class="text-muted">Pression [CTRL] para seleção multipla.</span>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label" for="disciplinas">disciplina(s)</label>
        <div class="col-md-10">
          <select multiple class="form-control" name="id_disciplina[]" id="disciplinas" >
            <?php 
              $qDisc = getDisciplinas();
              while ($uDisc = mysqli_fetch_array($qDisc)){
                echo "<option ";
                if (isDiscProf($uDisc['id_disciplina'], $_GET['id']) == TRUE){ echo "selected ";} 
                echo " value='".$uDisc['id_disciplina']."'>".$uDisc['cod_disciplina']." - ".$uDisc['nome']."</option>";
              } 
            ?>
          </select>
          <span class="text-muted">Pression [CTRL] para seleção multipla.</span>
        </div>        
      </div>

      <input type="hidden" name="operacao" value="E" />
      <input type="hidden" name="id" value="<?php echo $prof['id_professor'];?>" />

      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="reset" class="btn btn-default">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>

    </fieldset>
  </form>
</div>