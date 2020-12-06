<div class="tab-pane <?php echo e($activeStage == 5 ? 'fade active show' : ''); ?>" id="five" role="tabpanel" aria-labelledby="five-tab" aria-expanded="false">



        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.terms-table',['opportunity' => $opportunity])->html();
} elseif ($_instance->childHasBeenRendered('DQ2krz6')) {
    $componentId = $_instance->getRenderedChildComponentId('DQ2krz6');
    $componentTag = $_instance->getRenderedChildComponentTagName('DQ2krz6');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('DQ2krz6');
} else {
    $response = \Livewire\Livewire::mount('opportunity.terms-table',['opportunity' => $opportunity]);
    $html = $response->html();
    $_instance->logRenderedChild('DQ2krz6', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>




</div>


<?php /**PATH /media/Ahmed-Ibrahim/84D6EDAFD6EDA1A2/laravel projects/ria/resources/views/dashboard/opportunities/tabs/_five.blade.php ENDPATH**/ ?>
