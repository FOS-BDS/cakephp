<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Categories - index</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row"
<?php
echo $this->Session->flash('success');
?>
<div class="table table-responsive table-condensed table-hover">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($categories as $category){ ?>
            <tr>
                <td><?php echo $category['Category']['id']; ?></td>
                <td><?php echo $category['Category']['title']; ?></td>
                <td><?php echo $category['Category']['slug']; ?></td>
                <td><?php echo $category['Category']['description']; ?></td>
                <td>
                    <?php
                    echo $this->Html->link(
                        'edit',
                        array('controller' => 'categories', 'action' => 'edit','admin'=>true,$category['Category']['id']),
                        array('class'=>'btn btn-default btn-sm')
                    );
                    echo $this->Html->link(
                        'Delete',
                        array('controller' => 'categories', 'action' => 'delete','admin'=>true,$category['Category']['id']),
                        array('confirm' => 'Are you sure delete this category'.$category['Category']['id'],'class'=>'btn btn-danger btn-sm')
                    );
                    ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>