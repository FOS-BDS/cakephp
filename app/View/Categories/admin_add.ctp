<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Categories - add</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php
                            echo $this->Form->create('Category',
                                array(
                                    'role'=>'form'
                                ));
                            echo $this->Session->flash('success');
                            ?>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label>Loại category</label>
                                <select class="form-control" name="category">
                                    <option>Tin tức</option>
                                    <option>Bài Thuốc</option>
                                    <option>Công nghệ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Published</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="published" class="status">Public
                                    </label>
                                </div>
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