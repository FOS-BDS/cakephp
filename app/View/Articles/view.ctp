<div class="jumbotron text-center">
    <h1>Yeucongnghe.top</h1>
</div>
<div class="row">
    <ul class="breadcrumb">
        <li style="margin-left: 10px;"><a href="/">Home</a></li>
        <li><a href="<?php echo $this->Form->url(array('controller'=>'categories','action'=>'index',$article['Category']['slug'])); ?>"><?php echo $article['Category']['title']; ?></a></li>
        <li><?php echo $article['Article']['title']; ?></li>
    </ul>
    <div class="row">
        <div class="content-article">
           <h2><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;<?php echo $article['Article']['title']; ?></h2>
           <p>
               <?php echo $article['Article']['body']; ?>
           </p>
        </div>
    </div>
</div>