<div class="container topWrapperMargin smallContainer">
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
                <?php echo $this->Form->hidden('user_id', array('value' => null)); ?>
                <?php echo $this->Form->end(array(
                    "label" => 'Add To Your List',
                    'div'   => false,
                    'class' => 'btn btn-secondary'
                )); ?>
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
</div>
