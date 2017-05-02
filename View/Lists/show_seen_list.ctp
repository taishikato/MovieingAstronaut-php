<div class="container topWrapperMargin smallContainer">
    <div class="row">
        <?php if (empty($movieData)): ?>
            <div class="textAlign">
                Movie not found!
            </div>
        <?php else: ?>
            <?php foreach ($movieData as $movie): ?>
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="./show/<?php echo $movie['imdbID']; ?>">
                            <img src="<?php echo $movie['Poster']; ?>" class="media-object" height="220">
                        </a>
                    </div>
                    <div class="media-body">
                        <a href="./show/<?php echo $movie['imdbID']; ?>">
                            <h3 class="media-heading"><?php echo $movie['Title']; ?></h3>
                            <h4><?php echo $movie['Year']; ?></h4>
                            <h4>Actors: <?php echo $movie['Actors']; ?></h4>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
