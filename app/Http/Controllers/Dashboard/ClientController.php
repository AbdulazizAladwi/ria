<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Clients\StoreRequest;
use App\Http\Requests\Dashboard\Clients\UpdateRequest;
use App\Models\ClientType;
use App\Models\SisterCompany;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\ClientTypeRepositoryInterface;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        return view('dashboard.clients.index');
    }


    public function create()
    {
        $ClientTypes = ClientType::get();
        return view('dashboard.clients.create', compact('ClientTypes'));
    }





    public function show($id, ClientRepositoryInterface $clientRepo)
    {
        $client = $clientRepo->find($id);
        $client->load('sisterCompanies');
        return view('dashboard.clients.show',
            [
               'title' => __('site.title'),
               'client' => $client,
            ]);
    }

    public function edit($id, ClientRepositoryInterface $clientRepo)
    {
        $client = $clientRepo->find($id);
        return view('dashboard.clients.edit', [
            'title' => 'Edit Clients',
            'client' => $client,
        ]);
    }


    /*public function update(UpdateRequest $request, $id,  ClientRepositoryInterface $clientRepo)
    {
        $client = $clientRepo->find($id);
        $data = array_filter($request->all());
        $client->update($data);

        $client->address()->update([
            'area' => $data['area'],
            'block' => $data['block'],
            'street' => $data['street'],
            'zip_code' => $data['zip_code'],
        ]);

        if (isset($data['company_name']))
        {
            $oldSisterCompanies = SisterCompany::where('client_id', $id)->get();
            foreach ($oldSisterCompanies as $company)
            {
                $company->delete();
            }

            $dataArray = [];
            $length = count($data['company_name']);
            for($i=0; $i<$length;$i++)
            {
                $dataArray[] = [
                    'client_id'     => $client->id,
                    'name'          => $data['company_name'][$i],
                    'phone1'        =>$data['company_phone1'][$i],
                    'phone2'        => $data['company_phone2'][$i],
                    'email1'        => $data['company_email1'][$i],
                    'email2'        => $data['company_email2'][$i],
                ];
            }
            SisterCompany::insert($dataArray);
        }

        toastSuccess('updated Successfully');

        return redirect()->route('dashboard.clients.index');
    }*/



   public function destroy($id, ClientRepositoryInterface $clientRep)
    {
        $clientRep->find($id)->delete();
        toastSuccess('Deleted Successfully');
        return back();
    }


}
