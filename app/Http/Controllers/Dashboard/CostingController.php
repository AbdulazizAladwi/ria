<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProposalRepositoryInterface;
use App\Models\Proposal;
use App\Models\TotalCost;
use App\Models\Setting;
use Mail;
use App\Mail\ProposalMail;
use PDF;
use PhpOffice\PhpWord\TemplateProcessor;

class CostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.costing.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addcost(Proposal $proposal)
    {
        return view('dashboard.costing.create',compact('proposal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $proposal_id)
    {
        /*$messages = [
            'margin.required'=> 'Please Input margin',
            'discount.required'=> 'Please Input Discount'
        ];*/
       $this->validate($request,[
           'margin'=>'nullable|numeric|min:0|max:100',
           'discount'=>'nullable|numeric|min:0|max:100'
       ]);
        $cost = new TotalCost();
        $cost->proposal_id = $proposal_id; 
        $cost->margin = $request->input('margin');
        $cost->discount = $request->input('discount');
        $cost->totalprice = $request->input('total');
        $cost->save();
        // session()->flash('message', 'Data Added Successfully.');
        toastr()->success('Data Added successfully!');
        return redirect (route('dashboard.costing.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($proposal_id, ProposalRepositoryInterface $proposalRepository)
    {
        $proposal =  $proposalRepository->find($proposal_id);
        $opportunity = $proposal->requirement->opportunity;
        $cost = TotalCost::find($proposal_id);
        $data = [
            'proposal'      => $proposal,
            'opportunity'   => $opportunity,
            'cost'          => $cost,
        ];
        return view('dashboard.costing.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editcost(Proposal $proposal)
    {
        return view('dashboard.costing.edit',compact('proposal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cost = TotalCost::where('proposal_id',$id)->first(); //find($id);
        $cost->margin = $request->input('margin');
        $cost->discount = $request->input('discount');
        $cost->totalprice = $request->input('total');
        $cost->save();
        // session()->flash('message', 'Data Updated Successfully.');
        toastr()->success('Data Updated successfully!');
        return redirect(route('dashboard.costing.index')); //with('msg','Edit');
    }
    //==================PDFProposal=====================
    public function pdfProposal($proposal_id, ProposalRepositoryInterface $proposalRepository)
    {
        $proposal =  $proposalRepository->find($proposal_id);
        $opportunity = $proposal->requirement->opportunity;
        $cost = TotalCost::find($proposal_id);
        $days = Setting::all()->first();
        //dd($days);
        $data = [
            'proposal'      => $proposal,
            'opportunity'   => $opportunity,
            'cost'          => $cost,
        ];
        /*$pdf = PDF::loadView('dashboard.costing.pdf.proposalCosting', $data );
        return $pdf->stream('document.pdf');*/
        return view('dashboard.costing.pdf.proposalCosting', $data );
    }
    //====================Share======================
    public function post(Request $request , ProposalRepositoryInterface $proposalRepository){
        //dd($request->all());
        /*$messages = [
            'email.required'=> 'Please Input Mail'
        ];*/
        $this->validate($request,[
            'email' => 'required|email'
        ]);
        $proposal_id = $request->proposal_id;
        $proposal =  $proposalRepository->find($proposal_id);
        $opportunity = $proposal->requirement->opportunity;
        $cost = TotalCost::find($proposal_id);
        $days = Setting::all()->first();
        //dd($days);
        $data = [
            'proposal'      => $proposal,
            'opportunity'   => $opportunity,
            'cost'          => $cost,
        ];
        $pdf = PDF::loadView('dashboard.costing.share', $data )->save(public_path().'/pdf/Proposal_'.$proposal_id.'.pdf'); 
        $myEmail = $request->input('email');
    	Mail::to($myEmail)->send(new ProposalMail('/pdf/Proposal_'.$proposal_id.'.pdf'));
        //dd("Mail Send Successfully");
        //session()->flash('message', 'Mail Send Successfully.');
        toastr()->success('Mail Send successfully!');
        return redirect(route('dashboard.costing.index'));
    }
    /*public function docxProposal($proposal_id, ProposalRepositoryInterface $proposalRepository)
    {
        $proposal =  $proposalRepository->find($proposal_id);
        $cost = TotalCost::find($proposal_id);
        $days = Setting::all()->first();
        $template = new TemplateProcessor(public_path().'/docx/Proposal_'.$proposal_id.'.docx');
        $filename = $row->number . '.docx';
        $template->setValue('number', $row->number);
        $template->setValue('date', $row->created_at);
        $template->setValue('amount', $row->amount);
        $template->setValue('companyName', $row->client->name);
        $template->setValue('streetName', $row->client->address()->street ?? '-');
        $template->setValue('zipCode', $row->client->address()->zip_code ?? '-');
        $template->setValue('companyPhone', $row->client->phone1 ?? '-');



        $template->saveAs($filename);
        return response()->download($filename);
    }*/





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
