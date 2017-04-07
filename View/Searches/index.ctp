<div class="container topWrapperMargin smallContainer">
    <div class="row">
        <?php echo $this->Form->create(false,
            array(
                'type' => 'get',
                'url' => array('controller' => 'searches', 'action' => 'index')
            )
        ); ?>
        <?php echo $this->Form->input("title"); ?>
        <?php echo $this->Form->end(array("label" => "Start")); ?>

        <?php if (!empty($result)): ?>
            <pre>
                <?php var_dump($result); ?>
            </pre>
            <div class="media">
                <div class="media-left media-middle">
                    <a href="./searches/show/<?php echo $result['imdbID']; ?>">
                        <img src="<?php echo $result['Poster']; ?>" class="media-object" height="220">
                    </a>
                </div>
                <div class="media-body">
                    <a href="./searches/show/<?php echo $result['imdbID']; ?>">
                        <h3 class="media-heading"><?php echo $result['Title']; ?></h3>
                        <h4><?php echo $result['Year']; ?></h4>
                        <h4>Actors: <?php echo $result['Actors']; ?></h4>
                    </a>
                    <a class="btn btn-success btn-lg" href="#" role="button">Add To Your List</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
