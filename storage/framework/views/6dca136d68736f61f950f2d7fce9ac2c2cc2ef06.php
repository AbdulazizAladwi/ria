<div class="tab-pane <?php echo e($activeStage == 3 ? 'fade active show' : ''); ?>" id="three" role="tabpanel" aria-labelledby="contact-tab" aria-expanded="false">



            <?php if( $currentStage == 3 ): ?>

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.requirements.table',['stageNumber' => $currentStage , 'opportunity' => $opportunity])->html();
} elseif ($_instance->childHasBeenRendered('vbcBS9J')) {
    $componentId = $_instance->getRenderedChildComponentId('vbcBS9J');
    $componentTag = $_instance->getRenderedChildComponentTagName('vbcBS9J');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('vbcBS9J');
} else {
    $response = \Livewire\Livewire::mount('opportunity.requirements.table',['stageNumber' => $currentStage , 'opportunity' => $opportunity]);
    $html = $response->html();
    $_instance->logRenderedChild('vbcBS9J', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                <div class="container">



                    <?php if( $opportunity->stage == 3  ): ?>
                        <div style="text-align: right">
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage])->html();
} elseif ($_instance->childHasBeenRendered('00JaUi2')) {
    $componentId = $_instance->getRenderedChildComponentId('00JaUi2');
    $componentTag = $_instance->getRenderedChildComponentTagName('00JaUi2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('00JaUi2');
} else {
    $response = \Livewire\Livewire::mount('opportunity.stage-buttons',['opportunity' => $opportunity,'stageNumber' => $currentStage]);
    $html = $response->html();
    $_instance->logRenderedChild('00JaUi2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        </div>


                    <?php endif; ?>



                </div>
            <?php endif; ?>



</div>
<?php /**PATH F:\laravel-projects\ria\resources\views/dashboard/opportunities/tabs/_three.blade.php ENDPATH**/ ?>