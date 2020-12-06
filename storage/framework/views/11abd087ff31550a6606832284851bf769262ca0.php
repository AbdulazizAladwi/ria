<div class="tab-pane <?php echo e($activeStage == 4 ? 'fade active show' : ''); ?>" id="four" role="tabpanel" aria-labelledby="last-tab" aria-expanded="false">






    <?php if( $currentStage == 4 ): ?>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.actions-table',['stageNumber' => 4 ,'opportunity' => $opportunity])->html();
} elseif ($_instance->childHasBeenRendered('XrY4lRD')) {
    $componentId = $_instance->getRenderedChildComponentId('XrY4lRD');
    $componentTag = $_instance->getRenderedChildComponentTagName('XrY4lRD');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('XrY4lRD');
} else {
    $response = \Livewire\Livewire::mount('opportunity.actions-table',['stageNumber' => 4 ,'opportunity' => $opportunity]);
    $html = $response->html();
    $_instance->logRenderedChild('XrY4lRD', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        <div class="container">

                <div style="text-align: right">

                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage])->html();
} elseif ($_instance->childHasBeenRendered('dUGmQCg')) {
    $componentId = $_instance->getRenderedChildComponentId('dUGmQCg');
    $componentTag = $_instance->getRenderedChildComponentTagName('dUGmQCg');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('dUGmQCg');
} else {
    $response = \Livewire\Livewire::mount('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage]);
    $html = $response->html();
    $_instance->logRenderedChild('dUGmQCg', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                </div>





        </div>

    <?php endif; ?>


</div>


<?php /**PATH /media/Ahmed-Ibrahim/84D6EDAFD6EDA1A2/laravel projects/ria/resources/views/dashboard/opportunities/tabs/_four.blade.php ENDPATH**/ ?>
