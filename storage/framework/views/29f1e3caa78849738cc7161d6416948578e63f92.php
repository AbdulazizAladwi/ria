<div class="tab-pane <?php echo e($activeStage == 5 ? 'fade active show' : ''); ?>" id="five" role="tabpanel" aria-labelledby="five-tab" aria-expanded="false">



        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('opportunity.terms-table',['opportunity' => $opportunity])->html();
} elseif ($_instance->childHasBeenRendered('ZVbET61')) {
    $componentId = $_instance->getRenderedChildComponentId('ZVbET61');
    $componentTag = $_instance->getRenderedChildComponentTagName('ZVbET61');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ZVbET61');
} else {
    $response = \Livewire\Livewire::mount('opportunity.terms-table',['opportunity' => $opportunity]);
    $html = $response->html();
    $_instance->logRenderedChild('ZVbET61', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>




</div>


<?php /**PATH C:\xampp\htdocs\Roqay\ria\resources\views/dashboard/opportunities/tabs/_five.blade.php ENDPATH**/ ?>