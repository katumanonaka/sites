<div class="categoryNames form">
<?php echo $this->Form->create('CategoryName'); ?>
	<fieldset>
		<legend><?php echo __('Edit Category Name'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cat_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CategoryName.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('CategoryName.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Category Names'), array('action' => 'index')); ?></li>
	</ul>
</div>
