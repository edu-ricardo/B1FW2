

<div class="col-md-10 main">
  <form action="crud/usuario.php" method="post" class="form-horizontal">
    <fieldset>
      <legend>Incluir Usuario</legend>
      <div class="form-group">
        <label class="col-md-2 control-label" for="login">login</label>
        <div class="col-md-10">
          <input required autofocus class="form-control" id="login" name="login" type="text" placeholder="login" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label" for="senha">senha</label> 
        <div class="col-md-10">
          <input required class="form-control" id="senha" name="senha" type="password" placeholder="senha" />
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label">nivel</label>
        <div class="col-md-10">
          <div class="radio">
            <label>
              <input name="nivel" id="nivel" value="M" type="radio" checked>
              Master
            </label>
          </div>
          <div class="radio">
            <label>
              <input name="nivel" id="nivel" value="P" type="radio">
              Professor
            </label>                    
          </div>
          <div class="radio">
            <label>
              <input name="nivel" id="nivel" value="A" type="radio">
              Aluno
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label">sexo</label>
        <div class="col-md-10">
          <div class="radio">
            <label>
              <input name="sexo" id="sexo" value="M" type="radio" checked>
              Masculino
            </label>
          </div>
          <div class="radio">
            <label>
              <input name="sexo" id="sexo" value="F" type="radio">
              Feminino
            </label>
          </div>
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