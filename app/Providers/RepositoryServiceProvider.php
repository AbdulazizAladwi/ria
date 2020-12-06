<?php

namespace App\Providers;

use App\Repositories\Eloquent\ActionRepository;
use App\Repositories\Eloquent\AddressRepository;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\ClientRepository;
use App\Repositories\Eloquent\ClientTypeRepository;
use App\Repositories\Eloquent\ContactRepository;
use App\Repositories\Eloquent\InvoiceRepository;
use App\Repositories\Eloquent\OpportunityRepository;
use App\Repositories\Eloquent\PaymentTermRepository;
use App\Repositories\Eloquent\PermissionRepository;
use App\Repositories\Eloquent\ResourceRepository;
use App\Repositories\Eloquent\TeamRepository;
use App\Repositories\Eloquent\proposalRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Interfaces\ActionsRepositoryInterface;
use App\Repositories\Interfaces\AddressRepositoryInterface;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\ClientTypeRepositoryInterface;
use App\Repositories\Interfaces\ContactRepositoryInterface;
use App\Repositories\Interfaces\InvoicesRepositoryInterface;
use App\Repositories\Interfaces\OpportunityRepositoryInterface;
use App\Repositories\Interfaces\PaymentTermRepositoryInterface;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Repositories\Interfaces\ProposalRepositoryInterface;
use App\Repositories\Interfaces\ResourceRepositoryInterface;
use App\Repositories\Interfaces\TeamRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class,BaseRepository::class);
        $this->app->bind(ClientTypeRepositoryInterface::class,ClientTypeRepository::class);
        $this->app->bind(ResourceRepositoryInterface::class,ResourceRepository::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(OpportunityRepositoryInterface::class, OpportunityRepository::class);
        $this->app->bind(TeamRepositoryInterface::class, TeamRepository::class);
        $this->app->bind(AddressRepositoryInterface::class, AddressRepository::class);
        $this->app->bind(ActionsRepositoryInterface::class, ActionRepository::class);
        $this->app->bind(ProposalRepositoryInterface::class, proposalRepository::class);
        $this->app->bind(PaymentTermRepositoryInterface::class,PaymentTermRepository::class);
        $this->app->bind(InvoicesRepositoryInterface::class,InvoiceRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class,PermissionRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
