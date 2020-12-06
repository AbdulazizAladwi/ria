<?php


namespace App\Repositories\Interfaces;


interface OpportunityRepositoryInterface
{
    public function wonCounts();
    public function holdCounts();
    public function lostCounts();
    public function canceledCount();
    public function opportunitiesCount();
    public function search($name, $stage, $status);
    public function stages();
    public function getStatus();
    public function statusByStage($stageNumber);
    public function getStatusByStage($stage_id);
    public function opportunityReport($from,$to,$stage,$status,$client);
    public function wonOpportunities($search);
    //public function invoiceReport($from,$to,$clientId);


}
