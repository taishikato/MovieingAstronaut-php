<div class="container topWrapperMargin smallContainer">
    <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="row">
            <div class="col-xs-12">
            <?php foreach ($likeQuotes as $likeQuote): ?>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <blockquote class="blockquote">
                        <p><?php echo h($likeQuote['Quote']['content']); ?></p>
                        <footer>
                            <cite tilte="">by <?php echo h($likeQuote['Quote']['speaker']); ?> in
                            <?php
                            echo $this->Html->link(
                                h($likeQuote['Quote']['title']),
                                array(
                                    'controller' => 'quotes',
                                    'action'     => 'm',
                                    $likeQuote['Quote']['movie_id'],
                                    'full_base'  => true
                                ),
                                array('escape' => false, 'class' => 'lineLink', 'role' => 'button', 'aria-pressed' => 'true')
                            ); ?>
                            </cite>
                        </footer>
                    </blockquote>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
