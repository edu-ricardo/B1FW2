<?php
  include 'crud/aluno.php';
  $aluno = getAluno($_GET['id']);
?>

<div class="col-md-10 main">
  <form action="crud/aluno.php" method="post" class="form-horizontal">
    <fieldset>
      <legend>Editar Aluno</legend>
      <div class="form-group">
        <label class="col-md-2 control-label" for="nome">nome</label>
        <div class="col-md-10">
          <input required class="form-control" id="nome" name="nome" type="text" placeholder="nome" value="<?php echo $aluno['nome'];?>" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label" for="matricula">matricula</label> 
        <div class="col-md-10">
          <input required class="form-control" id="matricula" name="matricula" type="text" placeholder="matricula" value="<?php echo $aluno['matricula'];?>"/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label" for="usuario">usuario</label>
        <div class="col-md-10">
          <select class="form-control" name="id_usuario" id="usuario">
            <option value=''></option>
            <?php 
              
              $qAlunos = getUsuarioAlunoAll();
              while ($uAluno = mysqli_fetch_array($qAlunos)){
                echo "<option ";
                if ($uAluno['id_usuario'] == $aluno['id_usuario'] ) 
                  echo 'selected ';
                echo "value='".$uAluno['id_usuario']."'>".$uAluno['login']."</option>";
              } 
            ?>
          </select>
        </div>
      </div>

      <input type="hidden" name="operacao" value="E" />
      <input type="hidden" name="id" value="<?php echo $aluno['id_aluno'];?>" />

      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="reset" class="btn btn-default">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>

    </fieldset>
  </form>
</div>