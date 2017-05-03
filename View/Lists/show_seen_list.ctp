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
                        <?php echo $this->Html->link(
                            $this->Html->image($movie['Poster'], array('class' => 'media-object', 'height' => 220)),
                            array(
                                'controller' => 'searches',
                                'action'     => 'show',
                                $movie['imdbID'],
                                'full_base'  => true
                            ),
                            array('escape' => false)
                        ); ?>
                    </div>
                    <div class="media-body">
                        <?php
                        $linkCont = <<< eof
                            <h3 class="media-heading">{$movie['Title']}</h3>
                            <h4>{$movie['Year']}</h4>
                            <h4>Actors: {$movie['Actors']}</h4>
eof;
                        echo $this->Html->link(
                            $linkCont,
                            array(
                                'controller' => 'searches',
                                'action'     => 'show',
                                $movie['imdbID'],
                                'full_base'  => true
                            ),
                            array('escape' => false)
                        ); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
