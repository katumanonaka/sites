<div class="categoryNames view">
<h2><?php echo __('Category Name'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoryName['CategoryName']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cat Name'); ?></dt>
		<dd>
			<?php echo h($categoryName['CategoryName']['cat_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($categoryName['CategoryName']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($categoryName['CategoryName']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category Name'), array('action' => 'edit', $categoryName['CategoryName']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Category Name'), array('action' => 'delete', $categoryName['CategoryName']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $categoryName['CategoryName']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Category Names'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category Name'), array('action' => 'add')); ?> </li>
	</ul>
</div>
