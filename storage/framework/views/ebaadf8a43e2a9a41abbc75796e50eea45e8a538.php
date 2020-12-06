<div class="tab-pane <?php echo e($activeStage == 5 ? 'fade active show' : ''); ?>" id="five" role="tabpanel" aria-labelledby="five-tab" aria-expanded="false">



        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.terms-table',['opportunity' => $opportunity])->html();
} elseif ($_instance->childHasBeenRendered('nJzjLlg')) {
    $componentId = $_instance->getRenderedChildComponentId('nJzjLlg');
    $componentTag = $_instance->getRenderedChildComponentTagName('nJzjLlg');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('nJzjLlg');
} else {
    $response = \Livewire\Livewire::mount('opportunity.terms-table',['opportunity' => $opportunity]);
    $html = $response->html();
    $_instance->logRenderedChild('nJzjLlg', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>




</div>


<?php /**PATH F:\laravel-projects\ria\resources\views/dashboard/opportunities/tabs/_five.blade.php ENDPATH**/ ?>
