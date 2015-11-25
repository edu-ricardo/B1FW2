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

?>

<div class="col-md-10 main">
  <form action="crud/professor.php" method="post" class="form-horizontal">
    <fieldset>
      <legend>Incluir Professor</legend>
      <div class="form-group">
        <label class="col-md-2 control-label" for="matricula">matricula</label>
        <div class="col-md-10">
          <input required class="form-control" id="matricula" name="matricula" type="text" placeholder="matricula" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label" for="nome">nome</label>
        <div class="col-md-10">
          <input required class="form-control" id="nome" name="nome" type="text" placeholder="nome" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label" for="titulacao">titulação</label> 
        <div class="col-md-10">
          <input required class="form-control" id="titulacao" name="titulacao" type="text" placeholder="titulacao" />
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label" for="usuario">usuario</label>
        <div class="col-md-10">
          <select class="form-control" name="id_usuario" id="usuario">
            <option value='' selected=""></option>
            <?php 
              include "crud/usuario.php";
              $qProf = getUsuarioProfessor();
              while ($uProf = mysqli_fetch_array($qProf)){
                echo "<option value='".$uProf['id_usuario']."'>".$uProf['login']."</option>";
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
                echo "<option value='".$uCurso['id_curso']."'>".$uCurso['nome']." - ".$uCurso['periodo']."</option>";
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
                echo "<option value='".$uDisc['id_disciplina']."'>".$uDisc['cod_disciplina']." - ".$uDisc['nome']."</option>";
              } 
            ?>
          </select>
          <span class="text-muted">Pression [CTRL] para seleção multipla.</span>
        </div>        
      </div>

      <input type="hidden" name="operacao" value="I" />

      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="reset" class="btn btn-default">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>

    </fieldset>
  </form>
</div>