<div class="tab-pane <?php echo e($activeStage == 1 ? 'fade active show' : ''); ?> p-3" id="one" role="tabpanel" aria-labelledby="home-tab" aria-expanded="true">



    <?php if( $currentStage == 1 ): ?>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.actions-table',['stageNumber' => $currentStage ,'opportunity' => $opportunity])->html();
} elseif ($_instance->childHasBeenRendered('2BV7T0y')) {
    $componentId = $_instance->getRenderedChildComponentId('2BV7T0y');
    $componentTag = $_instance->getRenderedChildComponentTagName('2BV7T0y');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('2BV7T0y');
} else {
    $response = \Livewire\Livewire::mount('opportunity.actions-table',['stageNumber' => $currentStage ,'opportunity' => $opportunity]);
    $html = $response->html();
    $_instance->logRenderedChild('2BV7T0y', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <div class="container">



            <?php if( $opportunity->stage == 1 ): ?>
                <div style="text-align: right">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage])->html();
} elseif ($_instance->childHasBeenRendered('1Qeg933')) {
    $componentId = $_instance->getRenderedChildComponentId('1Qeg933');
    $componentTag = $_instance->getRenderedChildComponentTagName('1Qeg933');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('1Qeg933');
} else {
    $response = \Livewire\Livewire::mount('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage]);
    $html = $response->html();
    $_instance->logRenderedChild('1Qeg933', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>

            <?php endif; ?>



        </div>
    <?php endif; ?>

</div>






<?php /**PATH /media/Ahmed-Ibrahim/84D6EDAFD6EDA1A2/laravel projects/ria/resources/views/dashboard/opportunities/tabs/_one.blade.php ENDPATH**/ ?>
