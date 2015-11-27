<div class="col-md-10 main">
  <form action="crud/aluno.php" method="post" class="form-horizontal">
    <fieldset>
      <legend>Incluir Aluno</legend>
      <div class="form-group">
        <label class="col-md-2 control-label" for="nome">nome</label>
        <div class="col-md-10">
          <input required autofocus class="form-control" id="nome" name="nome" type="text" placeholder="nome" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label" for="matricula">matricula</label> 
        <div class="col-md-10">
          <input required class="form-control" id="matricula" name="matricula" type="text" placeholder="matricula" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label" for="usuario">usuario</label>
        <div class="col-md-10">
          <select class="form-control" name="id_usuario" id="usuario">
            <option value='' selected=""></option>
            <?php 
              include "crud/usuario.php";
              $qAlunos = getUsuarioAluno();
              while ($uAluno = mysqli_fetch_array($qAlunos)){
                echo "<option value='".$uAluno['id_usuario']."'>".$uAluno['login']."</option>";
              } 
            ?>
          </select>
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