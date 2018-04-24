<?php foreach($formulario as $elemento): ?>
	<div class="row">
		<div class="input-field col s12">			
			<?= $obj->setComponent($elemento)?>
		</div>
	</div>		
<?php endforeach;?>		
	<div class="row">
		<div class="input-field col s12">	
			<button type="submit" class="waves-effect waves-light btn-large col s12">Listo.</button>
		</div>
	</div>