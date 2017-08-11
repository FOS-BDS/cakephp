<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign In</h3>
            </div>
            <div class="panel-body">

                <?php
                    echo $this->Form->create('User',array('role'=>'form'));
                    echo $this->Session->flash('error');
                ?>
                    <fieldset>
                        <div class="form-group">
                            <?php
                                echo $this->Form->input('username', array('label'=>false,'class'=>'form-control','placeholder'=>'Username'));
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                                echo $this->Form->input('password', array('label'=>false,'class'=>'form-control','placeholder'=>'Password'));
                            ?>
                        </div>
                        <?php
                            echo $this->Form->submit('Thêm',array('class'=>'btn btn-lg btn-success btn-block'))
                        ?>
                    </fieldset>
                <?php
                    echo $this->Form->end();
                ?>
            </div>
        </div>
    </div>
</div>