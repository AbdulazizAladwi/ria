<div class="tab-pane <?php echo e($activeStage == 3 ? 'fade active show' : ''); ?>" id="three" role="tabpanel" aria-labelledby="contact-tab" aria-expanded="false">



            <?php if( $currentStage == 3 ): ?>

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.requirements.table',['stageNumber' => $currentStage , 'opportunity' => $opportunity])->html();
} elseif ($_instance->childHasBeenRendered('fOlchhn')) {
    $componentId = $_instance->getRenderedChildComponentId('fOlchhn');
    $componentTag = $_instance->getRenderedChildComponentTagName('fOlchhn');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('fOlchhn');
} else {
    $response = \Livewire\Livewire::mount('opportunity.requirements.table',['stageNumber' => $currentStage , 'opportunity' => $opportunity]);
    $html = $response->html();
    $_instance->logRenderedChild('fOlchhn', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                <div class="container">



                    <?php if( $opportunity->stage == 3  ): ?>
                        <div style="text-align: right">
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage])->html();
} elseif ($_instance->childHasBeenRendered('RPBsW8U')) {
    $componentId = $_instance->getRenderedChildComponentId('RPBsW8U');
    $componentTag = $_instance->getRenderedChildComponentTagName('RPBsW8U');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('RPBsW8U');
} else {
    $response = \Livewire\Livewire::mount('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage]);
    $html = $response->html();
    $_instance->logRenderedChild('RPBsW8U', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        </div>


                    <?php endif; ?>



                </div>
            <?php endif; ?>



</div>
<?php /**PATH /media/Ahmed-Ibrahim/84D6EDAFD6EDA1A2/laravel projects/ria/resources/views/dashboard/opportunities/tabs/_three.blade.php ENDPATH**/ ?>
