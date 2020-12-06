<div  class="tab-pane <?php echo e($activeStage == 2 ? 'fade active show' : ''); ?> p-3" id="two" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">




        <?php if( $currentStage == 2 ): ?>

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.actions-table',['stageNumber' => $currentStage  , 'opportunity' => $opportunity])->html();
} elseif ($_instance->childHasBeenRendered('0Rwji8K')) {
    $componentId = $_instance->getRenderedChildComponentId('0Rwji8K');
    $componentTag = $_instance->getRenderedChildComponentTagName('0Rwji8K');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('0Rwji8K');
} else {
    $response = \Livewire\Livewire::mount('opportunity.actions-table',['stageNumber' => $currentStage  , 'opportunity' => $opportunity]);
    $html = $response->html();
    $_instance->logRenderedChild('0Rwji8K', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <div class="container">



            <?php if( $opportunity->stage == 2  ): ?>

                <div style="text-align: right">

                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage])->html();
} elseif ($_instance->childHasBeenRendered('0H64FiD')) {
    $componentId = $_instance->getRenderedChildComponentId('0H64FiD');
    $componentTag = $_instance->getRenderedChildComponentTagName('0H64FiD');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('0H64FiD');
} else {
    $response = \Livewire\Livewire::mount('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage]);
    $html = $response->html();
    $_instance->logRenderedChild('0H64FiD', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                </div>

            <?php endif; ?>



        </div>
        <?php endif; ?>



</div>


<?php /**PATH /media/Ahmed-Ibrahim/84D6EDAFD6EDA1A2/laravel projects/ria/resources/views/dashboard/opportunities/tabs/_two.blade.php ENDPATH**/ ?>
