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
                    Users - edit
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php
                            echo $this->Form->create('User',
                                array(
                                    'role'=>'form'
                                ));
                                echo $this->Session->flash('success');
                                echo $this->Form->input('id');
                                echo $this->Form->input('username', array('class'=>'form-control'));
                                echo $this->Form->input('name', array('type'=>'text','class'=>'form-control'));
                                echo $this->Form->input('email', array('type'=>'text','class'=>'form-control'));
                                echo $this->Form->submit('Thêm',array('class'=>'btn btn-default btn-lg btn-success'));
                            echo $this->Form->end();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    <script>
        $(document).ready(function(){
        });
    </script>