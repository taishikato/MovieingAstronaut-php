<div class="container topWrapperMargin smallContainer">
    <?php echo $this->Flash->render('db_result') ?>
    <?php
    echo $this->Html->link(
        'Go Back',
        array(
            'controller' => 'quotes',
            'action'     => 'm',
            $mdbid,
            'full_base'  => true
        ),
        array('escape' => false, 'class' => 'btn btn-outline-info', 'role' => 'button', 'aria-pressed' => 'true')
    ); ?>
    <div class="row">
        <div class="card card-block normalCard">
            <?php echo $this->Form->create('Quote', array(
                'type'  => 'post',
                'url' => array('controller' => 'quotes', 'action' => 'add', $mdbid),
                'enctype' => 'multipart/form-data',
                'inputDefaults' => array(
                    'div' => 'form-group row',
                    'label' => array(
                        'class' => 'col-form-label'
                    ),
                    'class' => 'form-control'
                )
            )); ?>

            <?php echo $this->Form->input('content', array(
                'placeholder' => 'The world is a playground',
            )); ?>

            <?php echo $this->Form->input('speaker', array(
                'placeholder' => 'Allison',
                'label' => array('text' =>'By')
            )); ?>

            <?php echo $this->Form->hidden('title', array('value' => $result['Title'])); ?>

            <?php
            $options = array(
                'label' => 'Save',
                'div' => array(
                    'class' => 'form-group row'
                ),
                'class' => 'btn btn-outline-primary'
            );
            echo $this->Form->end($options);
            ?>
        </div>
    </div>
</div>
