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
        <?php foreach($menus as $menu){ ?>
            <tr>
                <td><?php echo $menu['Menu']['id']; ?></td>
                <td><?php echo $menu['Menu']['title']; ?></td>
                <td><?php echo $menu['Menu']['slug']; ?></td>
                <td><?php echo $menu['Menu']['description']; ?></td>
                <td>
                    <?php
                    echo $this->Html->link(
                        'edit',
                        array('controller' => 'categories', 'action' => 'edit_menu','admin'=>true,$menu['Menu']['id']),
                        array('class'=>'btn btn-default btn-sm')
                    );
                    echo $this->Html->link(
                        'Delete',
                        array('controller' => 'categories', 'action' => 'delete_menu','admin'=>true,$menu['Menu']['id']),
                        array('confirm' => 'Are you sure delete this category'.$menu['Menu']['id'],'class'=>'btn btn-danger btn-sm')
                    );
                    ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>