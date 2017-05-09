<div class="row">
    <?php if (!empty($result)): ?>
        <div class="item-detail-image item-padding textAlign">
            <img src="<?php echo $result['Poster']; ?>" class="img-thumbnail center-block" height="220">
        </div>
        <div class="item-padding textAlign">
            <?php echo $this->Form->create('SeenList', array(
                'type' => 'post',
                'url' => array('controller' => 'lists', 'action' => 'add'),
                )
            ); ?>
            <?php echo $this->Form->hidden('title', array('value' => $result['Title'])); ?>
            <?php echo $this->Form->hidden('imdb_id', array('value' => $result['imdbID'])); ?>

            <?php
            $doneUrl = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
            echo $this->Form->hidden('done', array('value' => $doneUrl));
            ?>
            <?php if ($isLoggedIn === true) {
                if (!empty($resitered)) {
                    $lavel = 'Added';
                    echo $lavel;
                } else {
                    $lavel = 'Add To Your List';
                    echo $this->Form->end(array(
                        'label' => $lavel,
                        'div'   => false,
                        'class' => 'btn btn-secondary'
                    ));
                }
            }
            ?>
        </div>
        <div class="item-padding">
            <?php echo $result['Plot']; ?>
        </div>
        <div class="item-padding">
            <div>
                <span class="item-detail-category-item">Director:</span> <?php echo $result['Director']; ?>
            </div>
            <div>
                <span class="item-detail-category-item">Year:</span> <?php echo $result['Year']; ?>
            </div>
            <div>
                <span class="item-detail-category-item">Actors:</span> <?php echo $result['Actors']; ?>
            </div>
            <div>
                <span class="item-detail-category-item">Genre:</span> <?php echo $result['Genre']; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
