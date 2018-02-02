<div class="sites form">
<?php echo $this->Form->create('Site'); ?>
	<fieldset>
		<legend><?php echo __('Edit Site'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('site_name');
		echo $this->Form->input('img_src');
		echo $this->Form->input('url');
		echo $this->Form->input('review');
                //チェックボックスの内容表示
//                echo $this->Form->input('cat_id1');
//                echo $this->Form->input('cat_id2');
//                echo $this->Form->input('cat_id3');
//                echo $this->Form->input('cat_id4');
//                echo $this->Form->input('cat_id5');
//                
                echo $this->Form->input('cat_id', array(
                        'options' =>$category,
                        'type' => 'select',
                        'multiple'=> 'checkbox',
                        'selected' => array($editcategory['Site']['cat_id1'],
                                            $editcategory['Site']['cat_id2'],
                                            $editcategory['Site']['cat_id3'],
                                            $editcategory['Site']['cat_id4'],
                                            $editcategory['Site']['cat_id5']),
                        ));
                //debug($editcategory['Site']['cat_id1']);
                //exit;
                
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Site.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Site.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Sites'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
