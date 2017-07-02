<div class="jumbotron jumbotron-fluid" style="background: url(<?php echo $quoteMovieData[0]['poster']; ?>) no-repeat center; background-size: cover; margin-top: 55px;">
  <div class="container">
    <h2>
        <?php echo $this->Html->link(
            h($quoteMovieData[0]['content']),
            array(
                'controller' => 'quotes',
                'action'     => 'd',
                $quoteMovieData[0]['id'],
                'full_base'  => true
            ),
            array('escape' => false, 'class' => 'whiteLink')
        ); ?>
    </h2>
    <p class="lead">by <?php echo h($quoteMovieData[0]['speaker']); ?> in
        <?php
        echo $this->Html->link(
            h($quoteMovieData[0]['title']),
            array(
                'controller' => 'quotes',
                'action'     => 'm',
                $quoteMovieData[0]['movie_id'],
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
                'placeholder' => 'Yes Man',
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

    <h3>Recent Posts</h3>
    <?php foreach($quoteMovieData as $quoteMovie): ?>
        <div class="card card-inverse recentPost" style="background-image: url(<?php echo $quoteMovie['poster']; ?>); border-color: #333;">
            <div class="card-block">
                <h3 class="card-title">
                    <?php
                    echo $this->Html->link(
                        h($quoteMovie['content']),
                        array(
                            'controller' => 'quotes',
                            'action'     => 'd',
                            $quoteMovie['id'],
                            'full_base'  => true
                        ),
                        array('escape' => false, 'class' => 'whiteLink')
                    ); ?>
                </h3>
                <p class="card-text">by <?php echo h($quoteMovie['speaker']); ?> in
                <?php
                echo $this->Html->link(
                    h($quoteMovie['title']),
                    array(
                        'controller' => 'quotes',
                        'action'     => 'm',
                        $quoteMovie['movie_id'],
                        'full_base'  => true
                    ),
                    array('escape' => false, 'class' => 'whiteLink', 'role' => 'button', 'aria-pressed' => 'true')
                ); ?>
                </p>
                <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
            </div>
        </div>
    <?php endforeach; ?>
</div>
