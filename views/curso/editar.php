<?php
  include 'crud/curso.php';
  $curso = getCurso($_GET['id']);
?>

<div class="col-md-10 main">
  <form action="crud/curso.php" method="post" class="form-horizontal">
    <fieldset>
      <legend>Editar Curso</legend>
      <div class="form-group">
        <label class="col-md-2 control-label" for="nome">nome</label>
        <div class="col-md-10">
          <input required class="form-control" id="nome" name="nome" type="text" placeholder="nome" value="<?php echo $curso['nome'];?>" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label" for="periodo">periodo</label> 
        <div class="col-md-10">
          <input required class="form-control" id="periodo" name="periodo" type="text" placeholder="periodo" value="<?php echo $curso['periodo'];?>"/>
        </div>
      </div>
      <input type="hidden" name="operacao" value="E" />
	  <input type="hidden" name="id" value="<?php echo $curso['id_curso'];?>" />
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="reset" class="btn btn-default">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>

    </fieldset>
  </form>
</div>