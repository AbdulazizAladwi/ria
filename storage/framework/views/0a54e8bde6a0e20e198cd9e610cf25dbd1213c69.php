<div  class="tab-pane <?php echo e($activeStage == 2 ? 'fade active show' : ''); ?> p-3" id="two" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">




        <?php if( $currentStage == 2 ): ?>

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.actions-table',['stageNumber' => $currentStage  , 'opportunity' => $opportunity])->html();
} elseif ($_instance->childHasBeenRendered('jQm068b')) {
    $componentId = $_instance->getRenderedChildComponentId('jQm068b');
    $componentTag = $_instance->getRenderedChildComponentTagName('jQm068b');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('jQm068b');
} else {
    $response = \Livewire\Livewire::mount('opportunity.actions-table',['stageNumber' => $currentStage  , 'opportunity' => $opportunity]);
    $html = $response->html();
    $_instance->logRenderedChild('jQm068b', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <div class="container">



            <?php if( $opportunity->stage == 2  ): ?>

                <div style="text-align: right">

                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage])->html();
} elseif ($_instance->childHasBeenRendered('sQvp84c')) {
    $componentId = $_instance->getRenderedChildComponentId('sQvp84c');
    $componentTag = $_instance->getRenderedChildComponentTagName('sQvp84c');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('sQvp84c');
} else {
    $response = \Livewire\Livewire::mount('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage]);
    $html = $response->html();
    $_instance->logRenderedChild('sQvp84c', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                </div>

            <?php endif; ?>



        </div>
        <?php endif; ?>



</div>


<?php /**PATH F:\laravel-projects\ria\resources\views/dashboard/opportunities/tabs/_two.blade.php ENDPATH**/ ?>