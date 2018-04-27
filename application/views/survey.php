<?php foreach($formulario as $elemento): ?>
	<div class="row">
		<div class="input-field col s12">			
			<?= $obj->setComponent($elemento)?>
		</div>
	</div>		
<?php endforeach;?>		
	<div class="row">
		<div class="input-field col s12">	
			<a href="#!gracias" class="waves-effect waves-light btn-large col s12"
				ng-disabled ="<?= $obj->validateForm($formulario) ?>">
			Continuar 
			</a>
		</div>
	</div>
<script>
 $(document).ready(function() {
    $('select').material_select();
  });          
</script>