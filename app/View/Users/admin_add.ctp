<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users - add</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Form Elements
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php
                            echo $this->Form->create('Users',
                                array(
                                    'role'=>'form'
                                ));
                            ?>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select class="form-control" name="category">
                                    <option>Tin tức</option>
                                    <option>Bài Thuốc</option>
                                    <option>Công nghệ</option>
                                </select>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-btn">
                                    <?php
                                    echo $this->Form->submit('Thêm',array('class'=>'btn btn-default btn-lg'))
                                    ?>
                                </span>
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