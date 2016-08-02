<div class="sites form">
<?php echo $this->Form->create('Site'); ?>
	<fieldset>
		<legend><?php echo __('Add Site'); ?></legend>
	<?php
		echo $this->Form->input('site_name');
		echo $this->Form->input('img_src');
		echo $this->Form->input('url');
		echo $this->Form->input('review');
               /* 
                echo $this->Form->input( 'yesno', array( 
                    'type' => 'checkbox', 
                //  'checked' => true,    // 初期表示で選択させる場合
                    'label' => '選ぶ',    // チェックボックスのラベル
                    //  'div' => false        // div親要素の有無(true/false)
                ));
                */
                
                
                /*$options = array(
                2 => 'ajax',
                6 => 'backbone.js',
                8=> 'Bootstrap',
                13 => 'CoffeeScript',
                );
                */
                
                
                
                echo $this->Form->input('cat_id', array(
                'options' =>$category,
                'type' => 'select',
                'multiple'=> 'checkbox',
                //'empty' => '(choose one)'
                ));
                
                //  echo $this->Form->create('User', array('type' => 'get'));
                  //  echo $this->Form->checkbox('done');
                    
                 //   echo $this->Form->checkbox('done', array('value' => 555));
                    
      
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sites'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
