<div class="row" style="background-color : #AAEEDD">
    <!--タイトル-->
    <div class="sites index col-md-12">     
        <div class="jumbotron">
            <CENTER>
                <h1>SitesReport!</h1>
                <p>コーディング検索ツール</p>
            </CENTER>

        </div>

        <!--  <h2><?php echo __('SitesReport'); ?></h2>-->
        <div class="sites index col-md-2">
            <!--            <div class="list-group">
                            <a href="#" class="list-group-item active">PHP</a>
                            <a href="#" class="list-group-item">cakePHP</a>
                            <a href="#" class="list-group-item">Git</a>
                            <a href="#" class="list-group-item">CSS</a>
                            <a href="#" class="list-group-item">Bootstrap</a>
                        </div>-->

            <div class="panel panel-default">
                <div class="panel-heading">カテゴリー</div>

                <div class="panel-body">
                    <a class="btn btn-default" href="http://localhost/sites/webs" role="button">ALL</a>
                    <!--                    <button type="button" class="btn btn-default">ALL</button>-->
                </div>
                <div class="panel-body">
                    <!--カテゴリー1を送る-->
                    <?php echo $this->Html->link(__('PHP'), array('action' => 'index', 1),array('class' => "btn btn-primary")); ?>
                    <!--                    <a class="btn btn-primary" href="#" role="button">PHP</a>
                                        <button type="button" class="btn btn-primary">PHP</button>-->
                </div>
                <div class="panel-body">
                    <?php echo $this->Html->link(__('cakePHP'), array('action' => 'index', 2),array('class' => "btn btn-primary")); ?>
                </div>
                <div class="panel-body">
                    <?php echo $this->Html->link(__('Git'), array('action' => 'index', 3),array('class' => "btn btn-primary")); ?>
                </div>
                <div class="panel-body">
                    <?php echo $this->Html->link(__('CSS'), array('action' => 'index', 4),array('class' => "btn btn-primary")); ?>
                </div>
                <div class="panel-body">
                    <?php echo $this->Html->link(__('Bootstrap'), array('action' => 'index', 5),array('class' => "btn btn-primary")); ?>
                </div>
            </div>

        </div>
        <!--<div class="sites index col-md-4">-->
        <!--<div class="col-sm-3 col-sm-offset-1">-->
        <div class="sites index col-md-4" style="background-color : #FFAADD">
            <table cellpadding="0" cellspacing="0" class="table table-hover table-striped">


                <tbody>
                    <?php //foreach ($sites as $site): ?>
                    <?php foreach ($sites as $key => $site): 
                    if($key % 2 != 0)
                    {
                    continue;
                    }
                    ?>

                    <table border="7" bordercolor="red" style="margin:20px;border-color:#6495ed ; border-style:ridge; border-width:5px ;">
                        
                        <tr>
                            <tr>                           
                                <!--                                <img src="img/php.jpg"width="100"height="100">                          -->

                                <?php
                                $imgid = $site['Site']['id'];
                                //echo $this->Html->image("../img/{$imgid}.jpg",array('url'=>$site['Site']['url'],'target' => '_blank'));      //画像にURLのリンクを貼る
                                echo $this->Html->link(
                                 $this->Html->image("../img/{$imgid}.jpg"),
                                $site['Site']['url'],
                                 array('escape' => false,'target' => '_blank')
                                );
                                ?>

                                <!--                                <a href="<?php $site['Site']['url'] ?>" target="_blank"><img src="<?php echo $file2 ?>"></a><br>-->
                            </tr>

                            <tr>
                                <td><?php echo h($site['Site']['review']); ?>&nbsp;</td>
                            </tr>

                            <!--                        <th><a href="http://qiita.com/BUN/items/403cccad9eaa831e6fd8"></a></th>
                                                    <td><?php //echo h($site['Site']['cat_id1']); ?>&nbsp;</td>
                                                    <td><?php //echo h($site['Site']['cat_id2']); ?>&nbsp;</td>
                                                    <td><?php //echo h($site['Site']['cat_id3']); ?>&nbsp;</td>
                                                    <td><?php //echo h($site['Site']['cat_id4']); ?>&nbsp;</td>
                                                    <td><?php //echo h($site['Site']['cat_id5']); ?>&nbsp;</td>-->

                            <tr>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $site['Site']['id'])); ?>
                                    <!--<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $site['Site']['id'])); ?>-->
                                    <!--<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $site['Site']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $site['Site']['id']))); ?>-->
                                </td>
                            </tr>
                        </tr>
                    </table>
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

        <div class="col-sm-4 col-sm-offset-1" style="background-color : #FFAADD">
            <table cellpadding="0" cellspacing="0" class="table table-hover table-striped">

                <thead>
                    <tr>
                        <!--                        
                                                <th><a href="http://qiita.com/BUN/items/403cccad9eaa831e6fd8"></a></th>
                                                URL追加
                                                <th><?php //echo $this->Paginator->sort('cat_id1'); ?></th>
                                                <th><?php //echo $this->Paginator->sort('cat_id2'); ?></th>
                                                <th><?php //echo $this->Paginator->sort('cat_id3'); ?></th>
                                                <th><?php //echo $this->Paginator->sort('cat_id4'); ?></th>
                                                <th><?php //echo $this->Paginator->sort('cat_id5'); ?></th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sites as $key => $site):

                    if($key % 2 == 0)
                    {
                    continue;
                    }
                    ?>
                    <table border="7" bordercolor="red" style="margin:20px;border-color:#6495ed ; border-style:ridge; border-width:5px ;">
                        <tr>
                            <tr>                           
                                <!--                                <img src="img/php.jpg"width="100"height="100">                          -->
                                <?php
                                $id = $site['Site']['img_src'];
                                //echo $this->Html->image("../upimg/{$id}", array('alt' => '画像がありません'));
                                $imgid = $site['Site']['id'];
                                $file1 = "upimg/{$imgid}.jpg";                              //　元画像ファイル
                                $file2 = "img/{$imgid}.jpg";                                      //　画像保存先
                                $in = ImageCreateFromJPEG($file1);                          //　元画像ファイル読み込み
                                $size = GetImageSize($file1);                               //　元画像サイズ取得
                                //$width = $size[0] / 2;                                      //　生成する画像サイズ（横）
                                //$height = $size[1] / 2;                                     //　生成する画像サイズ（縦）
                                $width = 250;//$size[0] / 2;                                      //　生成する画像サイズ（横）
                                $height = 250;//$size[1] / 2;                                     //　生成する画像サイズ（縦）
                                $out = ImageCreateTrueColor($width, $height);               //　画像生成
                                ImageCopyResampled($out, $in, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);    //　サイズ変更・コピー
                                ImageJPEG($out, $file2);                                    //　画像保存
                                ImageDestroy($in);
                                ImageDestroy($out);

                                echo $this->Html->image("../img/{$imgid}.jpg",array('url'=>$site['Site']['url']));      //画像にURLのリンクを貼る
                                ?>

                                <!--                                <img src="<?php echo $file2 ?>"><br>-->

                            </tr>

                            <tr>
                                <td><?php echo h($site['Site']['review']); ?>&nbsp;</td>
                            </tr>

                            <!--                        <th><a href="http://qiita.com/BUN/items/403cccad9eaa831e6fd8"></a></th>
                                                    <td><?php //echo h($site['Site']['cat_id1']); ?>&nbsp;</td>
                                                    <td><?php //echo h($site['Site']['cat_id2']); ?>&nbsp;</td>
                                                    <td><?php //echo h($site['Site']['cat_id3']); ?>&nbsp;</td>
                                                    <td><?php //echo h($site['Site']['cat_id4']); ?>&nbsp;</td>
                                                    <td><?php //echo h($site['Site']['cat_id5']); ?>&nbsp;</td>-->

                            <tr>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $site['Site']['id'])); ?>
                                    <!--<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $site['Site']['id'])); ?>-->
                                    <!--<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $site['Site']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $site['Site']['id']))); ?>-->
                                </td>
                            </tr>
                        </tr>
                    </table>
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