<div class="row" style="background-color : #38BDFA">
    <!--タイトル-->
    <div class="sites index col-md-12" style="background-color : #31ACE5">     
        <div class="jumbotron" style="background-color : #83D7FD">
            <CENTER>
                <font size="7" color="#555555">SitesReport!</font>
                <br>
                    <font size="3" color="#555555">エンジニア向け技術サイト紹介</font>
            </CENTER>

        </div>

        <!--  <h2><?php echo __('SitesReport'); ?></h2>-->

        <div class="sites index col-md-2" style="background-color : #3E8FB5">

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

        <!--左側-->

        <div class="sites index col-md-3" style="background-color : #EAF8FF">
            <table cellpadding="0" cellspacing="0" class="table table-hover table-striped">
                <tbody>
                    <?php //foreach ($sites as $site): ?>
                    <?php foreach ($sites as $key => $site): 
                    if($key % 3 == 1 || $key % 3 == 2)
                    {
                    continue;
                    }
                    ?>
                    <!--<table border="7" bordercolor="red" style="margin:20px;border-color:#6495ed ; border-style:ridge; border-width:5px ;">-->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <!--<img src="img/php.jpg"width="100"height="100">-->

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
                            <br>


                                <?php echo h($site['Site']['review']); ?>&nbsp;
                                <br>

                                    <?php echo $this->Html->link("詳細", array('action' => 'view', $site['Site']['id'])); ?>
                                    <br>
                                        <font size="2" color="#555555">カテゴリー</font>
                                        <?php
                                        for($i = 1; $i <= 5; $i++)
                                        {
                                        if($site['Site']["cat_id{$i}"] == 1)
                                        {
                                        echo "PHP ";
                                        }
                                        elseif($site['Site']["cat_id{$i}"] == 2)
                                        {
                                        echo "cakePHP ";
                                        }
                                        elseif($site['Site']["cat_id{$i}"] == 3)
                                        {
                                        echo "Git ";
                                        }
                                        elseif($site['Site']["cat_id{$i}"] == 4)
                                        {
                                        echo "CSS ";
                                        }
                                        elseif($site['Site']["cat_id{$i}"] == 5)
                                        {
                                        echo "Bootstrap ";
                                        }
                                        }   
                                        ?>
                                        </div>
                                        </div>
                                        <!--</table>-->
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

                                        <!--中央-->

                                        <div class="sites index col-md-3" style="background-color : #EAF8FF">
                                            <table cellpadding="0" cellspacing="0" class="table table-hover table-striped">

                                                <!--                        
                                                                        <th><a href="http://qiita.com/BUN/items/403cccad9eaa831e6fd8"></a></th>
                                                                        URL追加
                                                                        <th><?php //echo $this->Paginator->sort('cat_id1'); ?></th>
                                                                        <th><?php //echo $this->Paginator->sort('cat_id2'); ?></th>
                                                                        <th><?php //echo $this->Paginator->sort('cat_id3'); ?></th>
                                                                        <th><?php //echo $this->Paginator->sort('cat_id4'); ?></th>
                                                                        <th><?php //echo $this->Paginator->sort('cat_id5'); ?></th>-->

                                                <tbody>
                                                    <?php foreach ($sites as $key => $site):

                                                    if($key % 3 == 0 || $key % 3 == 2)
                                                    {
                                                    continue;
                                                    }
                                                    ?>
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">                      
                                                            <!--                                <img src="img/php.jpg"width="100"height="100">                          -->
                                                            <!--                                <?php
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
                                                                                            ?>-->

                                                            <?php
                                                            $imgid = $site['Site']['id'];
                                                            //echo $this->Html->image("../img/{$imgid}.jpg",array('url'=>$site['Site']['url'],'target' => '_blank'));      //画像にURLのリンクを貼る
                                                            echo $this->Html->link(
                                                            $this->Html->image("../img/{$imgid}.jpg"),
                                                            $site['Site']['url'],
                                                            array('escape' => false,'target' => '_blank')            
                                                            );
                                                            ?>

                                                            <br>
                                                                <!--                                <img src="<?php echo $file2 ?>"><br>-->

                                                                <?php echo h($site['Site']['review']); ?>&nbsp;

                                                                <!--                        <th><a href="http://qiita.com/BUN/items/403cccad9eaa831e6fd8"></a></th>
                                                                                        <td><?php //echo h($site['Site']['cat_id1']); ?>&nbsp;</td>
                                                                                        <td><?php //echo h($site['Site']['cat_id2']); ?>&nbsp;</td>
                                                                                        <td><?php //echo h($site['Site']['cat_id3']); ?>&nbsp;</td>
                                                                                        <td><?php //echo h($site['Site']['cat_id4']); ?>&nbsp;</td>
                                                                                        <td><?php //echo h($site['Site']['cat_id5']); ?>&nbsp;</td>-->

                                                                <br>

                                                                    <?php echo $this->Html->link("詳細", array('action' => 'view', $site['Site']['id'])); ?>
                                                                    <!--<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $site['Site']['id'])); ?>-->
                                                                    <!--<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $site['Site']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $site['Site']['id']))); ?>-->
                                                                    <br>
                                                                        <font size="2" color="#555555">カテゴリー</font>
                                                                        <?php
                                                                        for($i = 1; $i <= 5; $i++)
                                                                        {
                                                                        if($site['Site']["cat_id{$i}"] == 1)
                                                                        {
                                                                        echo "PHP ";
                                                                        }
                                                                        elseif($site['Site']["cat_id{$i}"] == 2)
                                                                        {
                                                                        echo "cakePHP ";
                                                                        }
                                                                        elseif($site['Site']["cat_id{$i}"] == 3)
                                                                        {
                                                                        echo "Git ";
                                                                        }
                                                                        elseif($site['Site']["cat_id{$i}"] == 4)
                                                                        {
                                                                        echo "CSS ";
                                                                        }
                                                                        elseif($site['Site']["cat_id{$i}"] == 5)
                                                                        {
                                                                        echo "Bootstrap ";
                                                                        }
                                                                        }   
                                                                        ?>

                                                                        </div>
                                                                        </div>
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


                                                                        <!--右側-->

                                                                        <div class="sites index col-md-3" style="background-color : #EAF8FF">
                                                                            <table cellpadding="0" cellspacing="0" class="table table-hover table-striped">
                                                                                <tbody>
                                                                                    <?php //foreach ($sites as $site): ?>
                                                                                    <?php foreach ($sites as $key => $site): 
                                                                                    if($key % 3 == 0 || $key % 3 == 1)
                                                                                    {
                                                                                    continue;
                                                                                    }
                                                                                    ?>
                                                                                    <!--<table border="7" bordercolor="red" style="margin:20px;border-color:#6495ed ; border-style:ridge; border-width:5px ;">-->
                                                                                    <div class="panel panel-default">
                                                                                        <div class="panel-body">
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
                                                                                            <br>


                                                                                                <?php echo h($site['Site']['review']); ?>&nbsp;
                                                                                                <br>

                                                                                                    <?php echo $this->Html->link("詳細", array('action' => 'view', $site['Site']['id'])); ?>
                                                                                                    <br>
                                                                                                        <font size="2" color="#555555">カテゴリー</font>
                                                                                                        <?php
                                                                                                        for($i = 1; $i <= 5; $i++)
                                                                                                        {
                                                                                                        if($site['Site']["cat_id{$i}"] == 1)
                                                                                                        {
                                                                                                        echo "PHP ";
                                                                                                        }
                                                                                                        elseif($site['Site']["cat_id{$i}"] == 2)
                                                                                                        {
                                                                                                        echo "cakePHP ";
                                                                                                        }
                                                                                                        elseif($site['Site']["cat_id{$i}"] == 3)
                                                                                                        {
                                                                                                        echo "Git ";
                                                                                                        }
                                                                                                        elseif($site['Site']["cat_id{$i}"] == 4)
                                                                                                        {
                                                                                                        echo "CSS ";
                                                                                                        }
                                                                                                        elseif($site['Site']["cat_id{$i}"] == 5)
                                                                                                        {
                                                                                                        echo "Bootstrap ";
                                                                                                        }
                                                                                                        }   
                                                                                                        ?>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                        <!--</table>-->
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

