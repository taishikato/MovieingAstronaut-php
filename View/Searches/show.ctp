<div class="container topWrapperMargin smallContainer">
    <div class="row">
        <?php if (!empty($result)): ?>
            <?php //var_dump($result); ?>
            <div class="item-detail-image item-padding">
                <img src="<?php echo $result['Poster']; ?>" class="img-thumbnail center-block" height="220">
            </div>
            <div class="item-padding">
                <a class="btn btn-success btn-lg center-block" href="#" role="button">Add To Your List</a>
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
                <!--
                <dl>
                    <dt>Director</dt>
                    <dd><?php echo $result['Director']; ?></dd>
                    <dt>Year</dt>
                    <dd><?php echo $result['Year']; ?></dd>
                    <dt>Actors</dt>
                    <dd><?php echo $result['Actors']; ?></dd>
                    <dt>Genre</dt>
                    <dd><?php echo $result['Genre']; ?></dd>
                </dl>
                -->
            </div>
        <?php endif; ?>
    </div>
</div>
