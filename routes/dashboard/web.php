<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CostingController;

Route::get('locale/{locale}', [\App\Http\Controllers\Dashboard\LangController::class, 'lang']);

Route::middleware('auth')->name('dashboard.')
                        ->namespace('\App\Http\Controllers\Dashboard')
                        ->group(function(){
    # Home route

    Route::get('/',[\App\Http\Controllers\Dashboard\HomeController::class,'index'])->name('home');


    Route::resource('users', UserController::class)->except(['destroy']);

    # Contacts

    Route::get('contacts/create/{client?}',[\App\Http\Controllers\Dashboard\ContactController::class,'create'])->name('contacts.create');
    Route::post('contacts/{client?}',[\App\Http\Controllers\Dashboard\ContactController::class,'store'])->name('contacts.store');
    Route::get('contacts/show/{client?}', [\App\Http\Controllers\Dashboard\ContactController::class,'index'])->name('contacts.view');

    Route::resource('contacts',ContactController::class)->except(['create','store']);


    # Client types routes

    Route::resource('client-types', ClientTypeController::class)->only('index');


    #teams routes

    Route::resource('teams', TeamController::class)->only('index');

    # Resources routes

    Route::resource('resources', ResourceController::class)->only('index');

    # Cost-Setup
    Route::resource('costs', CostController::class)->only('index');

    # Costing
    Route::get('costing', [CostingController::class,'index'])->name('costing.index');
    Route::post('costing/{proposal}', [CostingController::class,'store'])->name('costing.store');
    Route::post('costing/edit/{proposal}', [CostingController::class,'update'])->name('costing.update');

    # Proposal_create
    Route::get('costing/create/{proposal}', [CostingController::class,'addcost'])->name('addcost');
    Route::get('costing/edit/{proposal}', [CostingController::class,'editcost'])->name('editcost');
    Route::get('proposalCosting/{proposal_id}/pdf-proposal',[\App\Http\Controllers\Dashboard\CostingController::class,'pdfProposal'])->name('pdf.proposalCosting');
    Route::get('proposalCosting/{proposal_id}/docx-proposal',[\App\Http\Controllers\Dashboard\CostingController::class,'docxProposal'])->name('docx.proposalCosting');
    Route::get('proposal/{proposal_id}/show',[\App\Http\Controllers\Dashboard\CostingController::class,'show'])->name('show');
    Route::post('Mail/{proposal_id}',[CostingController::class,'post'])->name('post');
    # Client Routes

    Route::resource('clients', ClientController::class);


    # Opportunity Routes

    Route::resource('opportunities',OpportunityController::class);


    # Invoices Routes

    Route::resource('invoices', InvoiceController::class)->only('index');

     # Requirement links

    Route::get('opportunities/{opportunity_id}/design/{requirement_id}', [\App\Http\Controllers\Dashboard\RequirementController::class, 'showDesign'])->name('designs.index');
    Route::get('opportunities/{opportunity_id}/wireframe/{requirement_id}', [\App\Http\Controllers\Dashboard\RequirementController::class, 'showWireframe'])->name('wireframe.index');

    # Requirement - proposals
    Route::get('opportunities/{opportunity_id}/proposal/{requirement_id}', [\App\Http\Controllers\Dashboard\RequirementController::class, 'showProposal'])->name('proposals.index');
    Route::get('opportunities/requirement/{requirement_id}/proposals/{proposal_id}', [\App\Http\Controllers\Dashboard\Requirement\ProposalController::class, 'show'])->name('proposals.show');
    Route::get('opportunities/requirement/{requirement_id}/proposals/{proposal_id}/edit', [\App\Http\Controllers\Dashboard\Requirement\ProposalController::class, 'edit'])->name('proposals.edit');
    Route::get('opportunities/requirement/{requirement_id}/create', [\App\Http\Controllers\Dashboard\Requirement\ProposalController::class, 'create'])->name('proposals.create');


    # Requirement - scope_of_work
    Route::get('opportunities/{opportunity_id}/scope-of-work/{requirement_id}', [\App\Http\Controllers\Dashboard\RequirementController::class, 'showScopeOfWork'])->name('scope-of-works.index');
    Route::get('opportunities/requirements/{requirement_id}/scope-of-works/{sow_id}', [\App\Http\Controllers\Dashboard\Requirement\SowController::class, 'show'])->name('scope-of-works.show');
    Route::get('opportunities/requirements/{requirement_id}/scope-of-works/{sow_id}/edit', [\App\Http\Controllers\Dashboard\Requirement\SowController::class, 'edit'])->name('scope-of-works.edit');
    Route::get('opportunities/requirements/{requirement_id}/create', [\App\Http\Controllers\Dashboard\Requirement\SowController::class, 'create'])->name('scope-of-works.create');



    # Reports Links

    Route::get('opportunity-report',[\App\Http\Controllers\Dashboard\ReportController::class,'opportunityReport'])->name('opportunity-report');

    Route::get('proposal-report',[\App\Http\Controllers\Dashboard\ReportController::class,'proposalReport'])->name('proposal-report');
    Route::get('activity-report',[\App\Http\Controllers\Dashboard\ReportController::class,'activityReport'])->name('activity-report');
    Route::get('invoice-report',[\App\Http\Controllers\Dashboard\ReportController::class,'invoiceReport'])->name('invoice-report');


    Route::get('generate-proposal-pdf/{requirement_id}/{proposal_id}', [\App\Http\Controllers\Dashboard\Requirement\ProposalController::class, 'pdf'])->name('proposals.pdf');



    # Roles and Permissions

     Route::resource('permissions', PermissionController::class);

    # Setting Routes

    Route::get('settings', [\App\Http\Controllers\Dashboard\SettingController::class, 'index'])->name('settings');
    Route::post('settings', [\App\Http\Controllers\Dashboard\SettingController::class, 'update'])->name('settings.update');

    Route::get('proposal/{proposal_id}/pdf-proposal',[\App\Http\Controllers\Dashboard\PdfController::class,'pdfProposal'])->name('pdf.proposal');
    Route::get('sow/{sow_id}/pdf-sow',[\App\Http\Controllers\Dashboard\PdfController::class,'pdfSow'])->name('pdf.sow');


    # Invoices - terms Routes
    Route::get('invoices/{opportunity_id}/payment-terms', [\App\Http\Controllers\Dashboard\PaymentTermController::class, 'index'])->name('invoice.payment-terms');

    Route::get('invoices/{term_id}', [\App\Http\Controllers\Dashboard\InvoiceController::class, 'paymentInvoices'])->name('invoice.payment-invoices');
    Route::get('invoices/{term_id}/create', [\App\Http\Controllers\Dashboard\InvoiceController::class, 'create'])->name('invoice.payment-invoices.create');
    Route::get('invoices/edit/{invoice_id}', [\App\Http\Controllers\Dashboard\InvoiceController::class, 'edit'])->name('invoice.payment-invoices.edit');

    #invoice and receipt printings
    Route::get('invoices/print/{invoice}', [\App\Http\Controllers\Dashboard\PdfController::class, 'pdfInvoice'])->name('pdf.invoice');
    Route::get('invoices/print/{invoice}/docs', [\App\Http\Controllers\Dashboard\DocxController::class, 'docxInvoice'])->name('docx.invoice');
    Route::get('receipts/print/{receipt?}', [\App\Http\Controllers\Dashboard\PdfController::class, 'pdfReceipt'])->name('pdf.receipt');



    Route::get('proposal/{proposal_id}/docx-proposal',[\App\Http\Controllers\Dashboard\DocxController::class,'docxProposal'])->name('docx.proposal');

});

