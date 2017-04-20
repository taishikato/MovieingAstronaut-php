<div class="container topWrapperMargin smallContainer">
    <div class="row">
        <form class="form-inline" action="./tops" method="get" enctype="multipart/form-data" accept-charset="utf-8">
            <label class="sr-only" for="inlineFormInput">Search</label>
            <input type="search" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Reign Over Me" name="title">
            <input type="submit" name="">
        </form>
        <?php if (!empty($result)): ?>
            <pre>
                <?php //var_dump($result); ?>
            </pre>
            <div class="media">
                    <div class="media-left media-middle">
                        <a href="#">
                            <img src="<?php echo $result['Poster']; ?>" class="media-object" height="220">
                        </a>
                    </div>
                    <div class="media-body">
                        <a href="#">
                            <h3 class="media-heading"><?php echo $result['Title']; ?></h3>
                            <h4><?php echo $result['Year']; ?></h4>
                            <h4>Actors: <?php echo $result['Actors']; ?></h4>
                        </a>
                        <a class="btn btn-success btn-lg" href="#" role="button">Register To Your List</a>
                    </div>
            </div>
        <?php endif; ?>
    </div>
</div>
