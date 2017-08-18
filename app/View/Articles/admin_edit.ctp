    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Articles - add</h1>
        </div>
    </div>
    <div class="row">
        <div class="row">
            <div class="col-lg-6">
                <?php
                    echo $this->Form->create('Article',
                        array(
                            'role'=>'form'
                        ));
                    echo $this->Session->flash('success');
                    echo $this->Form->input('title',array('class'=>'form-control'));
                    echo $this->Form->input('category_id', array('options' => $categorys, 'empty' => 'Chọn một','class'=>'form-control'));
                    echo $this->Form->input('body',array('type'=>'textarea','class'=>'form-control','id'=>'editor1'));
                    echo $this->Form->input('status',array('label'=>'<b>Published</b>','type'=>'checkbox','class'=>'form-control'));
                    echo $this->Form->submit('Thêm',array('class'=>'btn btn-default btn-lg'));
                    echo $this->Form->end();
                ?>
            </div>
        </div>
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