<div class="col-md-10 main">
  <form action="crud/disciplina.php" method="post" class="form-horizontal">
    <fieldset>
      <legend>Incluir Disciplina</legend>
      <div class="form-group">
        <label class="col-md-2 control-label" for="cod_disciplina">código</label>
        <div class="col-md-10">
          <input required class="form-control" id="cod_disciplina" name="cod_disciplina" type="text" placeholder="código" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label" for="nome">nome</label>
        <div class="col-md-10">
          <input required class="form-control" id="nome" name="nome" type="text" placeholder="nome" />
        </div>
      </div>      
      <div class="form-group">
        <label class="col-md-2 control-label" for="descricao">descrição</label> 
        <div class="col-md-10">
          <textarea class="form-control" id="descricao" name="descricao" placeholder="descricao"></textarea>
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