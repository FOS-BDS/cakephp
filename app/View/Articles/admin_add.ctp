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
                                    <label>Text Input</label>
                                    <input type="textarea" class="form-control" cols="80" id="editor1" name="editor1" rows="10">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                            </form>
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
</script>