<div class="jumbotron jumbotron-fluid" style="background: url(<?php echo $result['Poster']; ?>) no-repeat center; background-size: cover; margin-top: 55px;">
  <div class="container">
    <h1 class="display-3"><?php echo h($result['Title']); ?></h1>
    <small class="lead"><?php echo h($result['Year']); ?></small>
    <p class="lead">Actors: <?php echo h($result['Actors']); ?></p>
    <p><?php echo h($result['Plot']); ?></p>
  </div>
</div>
<div class="container">
    <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="row">
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
        </div>
    </div>
    <h3>Comments</h3>
    <?php echo $this->Flash->render('db_result') ?>
    <?php echo $this->Form->create('Comment', array(
        'type'  => 'post',
        'url' => array('controller' => 'comments', 'action' => 'add', h($quote['Quote']['id'])),
        'inputDefaults' => array(
            'div' => 'form-group',
            'label' => false,
            'class' => 'form-control'
        )));
    ?>
    <div class="col-sm-12">
        <?php echo $this->Form->input('content', array(
            'type' => 'textarea',
            'rows'  => 2
        )); ?>
        <?php
        $options = array(
            'label' => 'Comment',
            'div' => array(
                'class' => 'form-group'
            ),
            'class' => 'btn btn-secondary'
        );
        echo $this->Form->end($options);
        ?>
        <div class="card">
        <?php foreach($commentData as $comment): ?>
                <div class="card-block commentBlock">
                    <p><?php echo h($comment['Comment']['content']); ?></p>
                    <footer>@<?php echo h($comment['User']['username']); ?> <?php echo $comment['Comment']['created']; ?></footer>
                </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
