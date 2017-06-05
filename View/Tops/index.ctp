<div class="jumbotron jumbotron-fluid" style="background: url(<?php echo $quoteMovieData['poster']; ?>) no-repeat center; background-size: cover; margin-top: 55px;">
  <div class="container">
    <h2><?php echo h($quoteMovieData['content']); ?></h2>
    <p class="lead">by <?php echo h($quoteMovieData['speaker']); ?> in
        <?php
        echo $this->Html->link(
            h($quoteMovieData['title']),
            array(
                'controller' => 'quotes',
                'action'     => 'm',
                $quoteMovieData['movie_id'],
                'full_base'  => true
            ),
            array('escape' => false, 'class' => 'whiteLink lineLink', 'role' => 'button', 'aria-pressed' => 'true')
        ); ?>
    </p>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="card card-block normalCard">
            <?php echo $this->Form->create(false,
                array(
                    'type' => 'get',
                    'url' => array('controller' => 'searches', 'action' => 'showList'),
                    'class' => 'form-inline textAlign'
                )
            ); ?>
            <?php echo $this->Form->input("title", array(
                'class' => 'form-control mb-2 mr-sm-2 mb-sm-0',
                'id'    => 'inlineFormInput',
                'placeholder' => 'Reign Over Me',
                'type' => 'search',
                'div'  => array('class' => 'mb-2'),
                'label' => false
            )); ?>
            <?php echo $this->Form->end(array(
                "label" => 'Search Movie',
                'div'   => false,
                'class' => 'btn btn-outline-primary'
            )); ?>
        </div>
    </div>
</div>
