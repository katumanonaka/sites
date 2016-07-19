<div class="categoryNames form">
<?php echo $this->Form->create('CategoryName'); ?>
	<fieldset>
		<legend><?php echo __('Add Category Name'); ?></legend>
	<?php
		echo $this->Form->input('cat_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Category Names'), array('action' => 'index')); ?></li>
	</ul>
</div>
