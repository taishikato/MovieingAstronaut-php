<div class="jumbotron jumbotron-fluid" style="background: url(<?php echo $result['Poster']; ?>) no-repeat center; background-size: cover; margin-top: 55px;">
  <div class="container">
    <h1 class="display-3"><?php echo h($result['Title']); ?></h1>
    <small class="lead"><?php echo h($result['Year']); ?></small>
    <p class="lead">Actors: <?php echo h($result['Actors']); ?></p>
    <p><?php echo h($result['Plot']); ?></p>
  </div>
</div>
<div class="container">
    <?php
    echo $this->Html->link(
        'Add Quote',
        array(
            'controller' => 'quotes',
            'action'     => 'add',
            $result['imdbID'],
            'full_base'  => true
        ),
        array('escape' => false, 'class' => 'btn btn-outline-primary', 'role' => 'button', 'aria-pressed' => 'true')
    ); ?>
</div>
<div class="container topWrapperMargin">
    <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="row">
            <div class="col-xs-12">
            <?php foreach ($quotes as $quote): ?>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <blockquote class="blockquote">
                        <p><?php echo h($quote['Quote']['content']); ?></p>
                        <footer>
                            <cite tilte="">by <?php echo h($quote['Quote']['speaker']); ?></cite>
                            <?php
                            echo $this->Html->link(
                                'like',
                                array(
                                    'controller' => 'quotes',
                                    'action'     => 'like',
                                    $quote['Quote']['id'],
                                    '?' => array(
                                        'title'    => $result['Title'],
                                        'movie_id' => $result['imdbID']
                                    ),
                                    'full_base'  => true
                                ),
                                array('escape' => false, 'class' => 'lineLink', 'role' => 'button', 'aria-pressed' => 'true')
                            ); ?>
                        </footer>
                    </blockquote>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
