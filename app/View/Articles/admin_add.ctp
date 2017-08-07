<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Articles - add</h1>
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
                            echo $this->Form->create('Article',
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
                            <div class="form-group">
                                <label>Nội dung</label>
                                <input type="textarea" class="form-control" id="editor1" name="content">
                            </div>
                            <div class="form-group">
                                <label>Checkboxes</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="status" value=0 class="status">Public
                                    </label>
                                </div>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-lg" type="submit">Thêm</button>
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
    CKEDITOR.replace( 'editor1', {
        height: 260,
        width: 700
    } );
    $(document).ready(function(){
        $('.status').change(function(){
            check = $('.status').is(':checked');
            if( check    ==   true ){
                $('.status').val(true);
            }else{
                $('.status').val(false)
            }
        });
    });
</script>