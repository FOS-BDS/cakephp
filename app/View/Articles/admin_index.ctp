<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Articles - add</h1>
        <div class="col-lg-12">
            <?php
                echo $this->Form->create('Article',array('class' => 'form-inline','inputDefaults' => array(
                    'div' => false,
                  )));
                echo $this->Form->input('title',array('class'=>'form-control'));
                echo $this->Form->input('category_id', array('options' => $categorys, 'empty' => 'Chọn một category có articles','class'=>'form-control'));
                echo $this->Form->end();
            ?>
        </div>
    </div>
</div>
<div class="row">
<div class="table table-responsive table-condensed table-hover">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Slug</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($articles as $article){ ?>
            <tr>
                <td><?php echo $article['Article']['id']; ?></td>
                <td><?php echo $article['Article']['title']; ?></td>
                <td><?php echo $article['Article']['slug']; ?></td>
                <td>
                    <?php
                    echo $this->Html->link(
                        'edit',
                        array('controller' => 'articles', 'action' => 'edit','admin'=>true,$article['Article']['id']),
                        array('class'=>'btn btn-default btn-sm')
                    );
                    echo $this->Html->link(
                        'Delete',
                        array('controller' => 'articles', 'action' => 'delete','admin'=>true,$article['Article']['id']),
                        array('confirm' => 'Are you sure delete this article'.$article['Article']['id'],'class'=>'btn btn-danger btn-sm')
                    );
                    ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
</div>