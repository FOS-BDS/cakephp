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
                            echo $this->Form->input('title',array('class'=>'form-control'));
                            echo $this->Form->input('slug',array('class'=>'form-control'));
                            echo $this->Form->input('menu_id', array('options' => $menus, 'empty' => 'Chọn một chủ đề','class'=>'form-control'));
                            echo $this->Form->input('description',array('type'=>'textarea','class'=>'form-control'));
                            echo $this->Form->input('published',array('label'=>'<b>Published</b>','type'=>'checkbox','class'=>'form-control'));
                            echo $this->Form->submit('Thêm',array('class'=>'btn btn-default btn-lg'));
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

    });
</script>