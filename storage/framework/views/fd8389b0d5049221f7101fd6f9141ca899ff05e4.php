<div class="tab-pane <?php echo e($activeStage == 1 ? 'fade active show' : ''); ?> p-3" id="one" role="tabpanel" aria-labelledby="home-tab" aria-expanded="true">



    <?php if( $currentStage == 1 ): ?>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.actions-table',['stageNumber' => $currentStage ,'opportunity' => $opportunity])->html();
} elseif ($_instance->childHasBeenRendered('BjwXuYj')) {
    $componentId = $_instance->getRenderedChildComponentId('BjwXuYj');
    $componentTag = $_instance->getRenderedChildComponentTagName('BjwXuYj');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('BjwXuYj');
} else {
    $response = \Livewire\Livewire::mount('opportunity.actions-table',['stageNumber' => $currentStage ,'opportunity' => $opportunity]);
    $html = $response->html();
    $_instance->logRenderedChild('BjwXuYj', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <div class="container">



            <?php if( $opportunity->stage == 1 ): ?>
                <div style="text-align: right">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage])->html();
} elseif ($_instance->childHasBeenRendered('g0myGe5')) {
    $componentId = $_instance->getRenderedChildComponentId('g0myGe5');
    $componentTag = $_instance->getRenderedChildComponentTagName('g0myGe5');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('g0myGe5');
} else {
    $response = \Livewire\Livewire::mount('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage]);
    $html = $response->html();
    $_instance->logRenderedChild('g0myGe5', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>

            <?php endif; ?>



        </div>
    <?php endif; ?>

</div>






<?php /**PATH F:\laravel-projects\ria\resources\views/dashboard/opportunities/tabs/_one.blade.php ENDPATH**/ ?>