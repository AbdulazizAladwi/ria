<?php

namespace App\Http\Livewire\Opportunity;

use App\Repositories\Interfaces\PaymentTermRepositoryInterface;
use Illuminate\Validation\Rule;
use Livewire\Component;

class TermsTable extends Component
{
	public $opportunity;

	public $cost;

	public $name,$amount,$percentage,$date;

	public $update = false;

	public $term;

	public $deleteId;



	protected $listeners = [

		'editRequested',
		'deleteRequested',
	];


	public function mount()
	{
		$this->cost = $this->opportunity->proposalPrice();
	}

	public function deleteRequested($id)
	{
		$this->deleteId = $id;
	}

	public function editRequested($id,PaymentTermRepositoryInterface $paymentTermRepository)
	{
		$this->update = true;
		$this->resetValidation();
		$this->term = $paymentTermRepository->find($id);
		$this->name = $this->term->name;
		$this->amount = $this->term->amount;
		$this->percentage = $this->term->percentage;
		$this->date = $this->term->date;

	}

	public function createRequested()
	{
		$this->update = false;
		$this->resetInputs();
		$this->resetValidation();
	}


	public function percentageChanged()
	{

		if ( is_null($this->percentage) || empty($this->percentage) )
		{
			$this->percentage = null;
			$this->amount = null;
			return false;
		}



		$this->amount = $this->cost * $this->percentage / 100;
	}

	public function amountChanged()
	{
		if ( is_null($this->amount) || empty($this->amount) )
		{
			$this->percentage = null;
			$this->amount = null;
			return false;

		}
		$this->percentage = $this->amount / $this->cost * 100 ;
	}


	public function addTerm(PaymentTermRepositoryInterface $paymentTermRepository)
	{


		$data = $this->validatedData();


		$data['opportunity_id'] = $this->opportunity->id;

		$paymentTermRepository->create($data);

		$this->resetInputs();

		$this->emit('termAdded');


	}


	public function updateTerm()
	{
		$data = $this->validatedData();

		$this->term->update($data);

		$this->emit('termUpdated');
	}


	public function deleteTerm(PaymentTermRepositoryInterface $paymentTermRepository)
	{
		$paymentTermRepository->delete($this->deleteId);

		$this->emit('termDeleted');
	}

	protected function resetInputs()
	{
		$this->reset(['name','amount','percentage','date']);
	}


	protected function validatedData()
	{
		$maxAmount     = $this->cost - $this->opportunity->paymentTerms()->sum('amount');
		$maxPercentage = 100 - $this->opportunity->paymentTerms()->sum('percentage');

		if ( $this->update )
		{
			$amount     = $this->opportunity->paymentTerms()->sum('amount');
			$percentage =  $this->opportunity->paymentTerms()->sum('percentage');
			$maxAmount     = $this->cost - $amount + $this->term->amount;
			$maxPercentage = 100 - $percentage + $this->term->percentage;
		}

		$rules = [

			'name'       => [
				'required',
				'max:50',
				Rule::unique('payment_terms')
				      ->where('opportunity_id',$this->opportunity->id)
				      ->whereNull('deleted_at')
			],
			'amount'     => ['nullable','numeric','min:1','max:'.$maxAmount],
			'percentage' => ['required','numeric','min:1','max:'.$maxPercentage],
			'date'       => 'required|date'
		];

		if ( $this->update )
		{
			$rules['name'] = [
				'required',
			     'max:50',
			     Rule::unique('payment_terms')
			          ->where('opportunity_id',$this->opportunity->id)
			          ->whereNull('deleted_at')
			          ->ignore($this->term->id)
			 ];
		}

		return $this->validate($rules);
	}

    public function render(PaymentTermRepositoryInterface $paymentTermRepository)
    {
        return view('livewire.opportunity.terms-table',[


        	'terms' => $paymentTermRepository->terms($this->opportunity->id),

        ]);
    }
}
