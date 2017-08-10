<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Users - add
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php
                            echo $this->Form->create('User',
                                array(
                                    'role'=>'form'
                                ));
                            ?>
                            <div class="form-group">
                                <?php
                                    echo $this->Form->input('username', array('class'=>'form-control'));
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                    echo $this->Form->input('password', array('type'=>'text','class'=>'form-control'));
                                ?>
                            </div>
                            <div class="form-group">
                                    <?php
                                    echo $this->Form->submit('Thêm',array('class'=>'btn btn-default btn-lg btn-success'))
                                    ?>
                            </div>
                            <?php
                            echo $this->Form->end();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>

    <script>
        $(document).ready(function(){
        });
    </script>