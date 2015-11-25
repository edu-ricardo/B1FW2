<div class="col-md-10 main">
  <form action="crud/usuario.php" method="post" class="form-horizontal">
    <fieldset>
      <legend>Editar Usuario</legend>

      <div class="form-group">
        <label class="col-md-2 control-label" for="senha">senha antiga</label> 
        <div class="col-md-10">
          <input class="form-control" id="senha" name="senha" type="password" placeholder="senha"/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label" for="senha">senha nova</label> 
        <div class="col-md-10">
          <input class="form-control" id="senha_nova" name="senha_nova" type="password" placeholder="senha"/>
        </div>
      </div>
      <input type="hidden" name="operacao" value="AS" />
      <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="reset" class="btn btn-default">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>

    </fieldset>
  </form>