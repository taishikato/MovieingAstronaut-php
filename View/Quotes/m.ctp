<?php echo $this->element('jumbotron'); ?>
<div class="container topWrapperMargin">
    <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="row">
            <div class="col-xs-7 quoteBox">
                <div class="col-sm-2 col-md-3 col-lg-2" style="padding-top: 10px;">
                    <?php echo $this->Html->image('alison_yes_man.jpg',
                        array(
                            'class' => 'img-circle quoteCharacterImage'
                        )
                    ); ?>
                </div>
                <div class="col-sm-10 col-md-9 col-lg-10">
                    <blockquote class="blockquote">
                        <p>The World is a Playground</p>
                        <footer>
                            <cite tilte="">by Alison at 2:01</cite>
                            <a href="#" class="lineLink">edit</a>
                        </footer>
                    </blockquote>
                </div>
            </div>
            <div class="col-xs-5 quoteRight">
            <p>Annotation</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-7 quoteBox">
                <div class="col-sm-2 col-md-3 col-lg-2" style="padding-top: 10px;">
                    <?php echo $this->Html->image('alison_yes_man.jpg',
                        array(
                            'class' => 'img-circle quoteCharacterImage'
                        )
                    ); ?>
                </div>
                <div class="col-sm-10 col-md-9 col-lg-10">
                    <blockquote class="blockquote">
                        <p>The World is a Playground</p>
                        <footer>
                            <cite tilte="">by Alison at 2:01</cite>
                            <a href="#" class="lineLink">edit</a>
                        </footer>
                    </blockquote>
                </div>
            </div>
            <div class="col-xs-5 quoteRight">
            <p>Annotation 2</p>
            </div>
        </div>
    </div>
</div>
