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

  function getProfessores()
  {
    include 'dbfun/conexao.php';

    $sql = "select * from professor";
    if ( $query = mysqli_query($con, $sql)){
      return $query;
    }else
      echo mysqli_error($con);
  }  

  function getAlunos()
  {
    include 'dbfun/conexao.php';

    $sql = "select * from aluno";
    if ( $query = mysqli_query($con, $sql)){
      return $query;
    }else
      echo mysqli_error($con);
  }    

?>
<div class="col-md-10 main">
  <form action="crud/turma.php" method="post" class="form-horizontal">
    <fieldset>
      <legend>Incluir Turma</legend>
      <div class="form-group">
        <label class="col-md-2 control-label" for="nome">nome</label>
        <div class="col-md-10">
          <input required class="form-control" id="nome" name="nome" type="text" placeholder="nome" />
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label" for="dia_semana">dia</label> 
        <div class="col-md-10">
          <select class="form-control" name="dia_semana" id="dia_semana">
            <option value='1'>Segunda-Feira</option>
            <option value='2'>Terça-Feira</option>
            <option value='3'>Quarta-Feira</option>
            <option value='4'>Quinta-Feira</option>
            <option value='5'>Sexta-Feira</option>
            <option value='6'>Sábado</option>            
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label" for="curso">curso</label>
        <div class="col-md-10">
          <select class="form-control" name="id_curso" id="curso" >
            <?php 
              $qCursos = getCursos();
              while ($uCurso = mysqli_fetch_array($qCursos)){
                echo "<option value='".$uCurso['id_curso']."'>".$uCurso['nome']." - ".$uCurso['periodo']."</option>";
              } 
            ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label" for="disciplinas">disciplina</label>
        <div class="col-md-10">
          <select class="form-control" name="id_disciplina" id="disciplinas" >
            <?php 
              $qDisc = getDisciplinas();
              while ($uDisc = mysqli_fetch_array($qDisc)){
                echo "<option value='".$uDisc['id_disciplina']."'>".$uDisc['cod_disciplina']." - ".$uDisc['nome']."</option>";
              } 
            ?>
          </select>
        </div>        
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label" for="professor">professor</label>
        <div class="col-md-10">
          <select class="form-control" name="id_professor" id="professor" >
            <?php 
              $qProf = getProfessores();
              while ($uProf = mysqli_fetch_array($qProf)){
                echo "<option value='".$uProf['id_professor']."'>".$uProf['nome']."</option>";
              } 
            ?>
          </select>
        </div>        
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label" for="disciplinas">alunos</label>
        <div class="col-md-10">
            <table class="table table-responsive table-striped">
              <tr>
                <td>Check</td>
                <td>Nome</td>
              </tr>
              <?php 
              $qAlunos = getAlunos();
                while ($uAluno = mysqli_fetch_array($qAlunos)){
              ?>
                <tr>
                  <td> <input type="checkbox" name="alunos[]" value="<?php echo $uAluno['id_aluno']; ?>" /> </td>
                  <td><?php echo $uAluno['nome']; ?></td>
                </tr>
              <?php                  
                } 
              ?>
            </table>
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