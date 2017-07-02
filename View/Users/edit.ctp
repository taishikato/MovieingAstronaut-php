<div class="container topWrapperMargin smallContainer">
    <?php echo $this->Flash->render('edit_result') ?>
    <div class="col-xs-12"">
    <?php echo $this->Form->create('User', array(
        'type'  => 'post',
        'url' => array('controller' => 'users', 'action' => 'edit'),
        'enctype' => 'multipart/form-data',
        'inputDefaults' => array(
            'div' => 'form-group row',
            'label' => array(
                'class' => 'col-form-label'
            ),
            'class' => 'form-control'
        )
    )); ?>

    <?php echo $this->Form->input('username', array(
        'label' => array('text' =>'User Name')
    )); ?>

    <?php
    $options = array(
        'label' => 'Save',
        'div' => array(
            'class' => 'form-group row'
        ),
        'class' => 'btn btn-success'
    );
    echo $this->Form->end($options);
    ?>
    </div>
</div>
