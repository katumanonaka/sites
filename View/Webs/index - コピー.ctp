<div class="row">
    <!--タイトル-->
    <div class="sites index col-md-12">     
        <div class="jumbotron">
            <CENTER>
                <h1>SitesReport!</h1>
                <p>コーディング検索ツール</p>
            </CENTER>

        </div>

<!--  <h2><?php echo __('SitesReport'); ?></h2>-->
        <div class="sites index col-md-3">

        </div>
        <div class="sites index col-md-9">    
            <table cellpadding="0" cellspacing="0" class="table table-hover table-striped">
                
               
                    
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('site_name'); ?></th>
                        <th><?php echo $this->Paginator->sort('img_src'); ?></th>
                        <th><?php echo $this->Paginator->sort('url'); ?></th>
                        
                        <th><a href="http://qiita.com/BUN/items/403cccad9eaa831e6fd8"></a></th>
                        <th><?php echo $this->Paginator->sort('review'); ?></th>
                        <!--URL追加-->
                        <th><?php //echo $this->Paginator->sort('cat_id1'); ?></th>
                        <th><?php //echo $this->Paginator->sort('cat_id2'); ?></th>
                        <th><?php //echo $this->Paginator->sort('cat_id3'); ?></th>
                        <th><?php //echo $this->Paginator->sort('cat_id4'); ?></th>
                        <th><?php //echo $this->Paginator->sort('cat_id5'); ?></th>

                        <th><?php echo $this->Paginator->sort('created'); ?></th>
                        <th><?php echo $this->Paginator->sort('modified'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
	<?php foreach ($sites as $site): ?>
                    <tr>
                        <td><?php echo h($site['Site']['id']); ?>&nbsp;</td>
                        <td><?php echo h($site['Site']['site_name']); ?>&nbsp;</td>
                        <td><?php echo h($site['Site']['img_src']); ?>&nbsp;</td>
                        <?php
                        $idimg = $site['Site']['id'];
                        ?>
                        <td><img src="http://localhost/sites/upimg/{$idimg}.jpg" class="img-rounded img-responsive"></td>
                        
                        <td><?php echo h($site['Site']['url']); ?>&nbsp;</td>
                        <td><?php echo h($site['Site']['review']); ?>&nbsp;</td>
                        <th><a href="http://qiita.com/BUN/items/403cccad9eaa831e6fd8"></a></th>
                        <td><?php //echo h($site['Site']['cat_id1']); ?>&nbsp;</td>
                        <td><?php //echo h($site['Site']['cat_id2']); ?>&nbsp;</td>
                        <td><?php //echo h($site['Site']['cat_id3']); ?>&nbsp;</td>
                        <td><?php //echo h($site['Site']['cat_id4']); ?>&nbsp;</td>
                        <td><?php //echo h($site['Site']['cat_id5']); ?>&nbsp;</td>

                        <td><?php echo h($site['Site']['created']); ?>&nbsp;</td>
                        <td><?php echo h($site['Site']['modified']); ?>&nbsp;</td>



                        <td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $site['Site']['id'])); ?>
			<!--<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $site['Site']['id'])); ?>-->
			<!--<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $site['Site']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $site['Site']['id']))); ?>-->
                        </td>
                    </tr>
<?php endforeach; ?>
                </tbody>
            </table>
            <p>
	<?php
    /*
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    ));*/
	?>	</p>
            <div class="paging">
	<?php
        /*
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
         */
	?>
            </div>
        </div>
    </div>
    <!--    <div class="actions col-md-4">
            <h3><?php echo __('Actions'); ?></h3>
            <ul>
                <li><?php echo $this->Html->link(__('New Site'), array('action' => 'add'), array('class'=>'btn btn-success')); ?></li>
                <li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
            </ul>
        </div>-->
</div>