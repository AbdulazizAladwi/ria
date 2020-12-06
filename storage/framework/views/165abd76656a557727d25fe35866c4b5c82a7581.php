<div class="tab-pane <?php echo e($activeStage == 4 ? 'fade active show' : ''); ?>" id="four" role="tabpanel" aria-labelledby="last-tab" aria-expanded="false">






    <?php if( $currentStage == 4 ): ?>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.actions-table',['stageNumber' => 4 ,'opportunity' => $opportunity])->html();
} elseif ($_instance->childHasBeenRendered('NhZU3R7')) {
    $componentId = $_instance->getRenderedChildComponentId('NhZU3R7');
    $componentTag = $_instance->getRenderedChildComponentTagName('NhZU3R7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('NhZU3R7');
} else {
    $response = \Livewire\Livewire::mount('opportunity.actions-table',['stageNumber' => 4 ,'opportunity' => $opportunity]);
    $html = $response->html();
    $_instance->logRenderedChild('NhZU3R7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        <div class="container">

                <div style="text-align: right">

                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage])->html();
} elseif ($_instance->childHasBeenRendered('v0yCSL6')) {
    $componentId = $_instance->getRenderedChildComponentId('v0yCSL6');
    $componentTag = $_instance->getRenderedChildComponentTagName('v0yCSL6');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('v0yCSL6');
} else {
    $response = \Livewire\Livewire::mount('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage]);
    $html = $response->html();
    $_instance->logRenderedChild('v0yCSL6', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                </div>





        </div>

    <?php endif; ?>


</div>


<?php /**PATH F:\laravel-projects\ria\resources\views/dashboard/opportunities/tabs/_four.blade.php ENDPATH**/ ?>