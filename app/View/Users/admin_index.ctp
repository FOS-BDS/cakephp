<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Users - index</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row"
    <div class="table table-responsive table-condensed table-hover">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>FacebookID</th>
                <th>Last Login</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user){ ?>
                <tr>
                    <td><?php echo $user['User']['id']; ?></td>
                    <td><?php echo $user['User']['username']; ?></td>
                    <td><?php echo $user['User']['name']; ?></td>
                    <td><?php echo $user['User']['email']; ?></td>
                    <td><?php echo $user['User']['facebook_uid']; ?></td>
                    <td><?php echo $user['User']['last_login']; ?></td>
                    <td>
                        <?php
                        echo $this->Html->link(
                            'edit',
                            array('controller' => 'users', 'action' => 'edit','admin'=>true,$user['User']['id']),
                            array('class'=>'btn btn-default btn-sm')
                        );
                        echo $this->Html->link(
                            'Delete',
                            array('controller' => 'users', 'action' => 'delete','admin'=>true,$user['User']['id']),
                            array('confirm' => 'Are you sure delete this user'.$user['User']['id'],'class'=>'btn btn-danger btn-sm')
                        );
                        ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>