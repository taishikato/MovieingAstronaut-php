<div class="row">
    <?php if ($result['Response'] === 'False'): ?>
        <div class="textAlign">
            Movie not found!
        </div>
    <?php else: ?>
        <div class="media">
            <div class="media-left media-middle">
                <a href="./show/<?php echo $result['imdbID']; ?>">
                    <img src="<?php echo $result['Poster']; ?>" class="media-object" height="220">
                </a>
            </div>
            <div class="media-body">
                <a href="./show/<?php echo $result['imdbID']; ?>">
                    <h3 class="media-heading"><?php echo $result['Title']; ?></h3>
                    <h4><?php echo $result['Year']; ?></h4>
                    <h4>Actors: <?php echo $result['Actors']; ?></h4>
                </a>
            </div>
        </div>
    <?php endif; ?>
</div>
