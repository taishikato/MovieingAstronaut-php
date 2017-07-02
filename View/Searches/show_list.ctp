<div class="container topWrapperMargin smallContainer">
    <div class="row">
        <?php if ($result['Response'] === 'True'): ?>
        <div class="card card-block normalCard">
            <div class="media">
                <div class="media-left media-middle">
                    <a href="../quotes/m/<?php echo $result['imdbID']; ?>">
                        <img src="<?php echo $result['Poster']; ?>" class="media-object" height="220">
                    </a>
                </div>
                <div class="media-body">
                    <a href="../quotes/m/<?php echo $result['imdbID']; ?>">
                        <h3 class="media-heading"><?php echo $result['Title']; ?></h3>
                        <h4><?php echo $result['Year']; ?></h4>
                        <h4>Actors: <?php echo $result['Actors']; ?></h4>
                    </a>
                </div>
            </div>
        </div>
        <?php else: ?>
            <div class="textAlign">
                Movie not found!
            </div>
        <?php endif; ?>
    </div>
</div>
