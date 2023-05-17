<?php

namespace App\Http\Controllers;
use App\Models\Device;
use App\Models\historiques;


use Illuminate\Http\Request;

class DevicesController extends Controller
{
    public function index()
    {
        if(session()->has('email'))
        {
            $devices = Device::whereuser_id(session('id'))->get();
            return view('add',compact('devices'));
        }
        else
        {
            return view('login');
        }
    }
    public function added(request $request)
    {
        $validatedData = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'number' => [
            'required',
            'numeric',
            ],
        
        ],);
      
        $device = new Device();
        $device->user_id = session('id');
        $device->name = $validatedData['nom'];
        $device->type = $validatedData['type'];
        $device->SerieNumber = $validatedData['number'];
        $device->save();
        return redirect('added');
        
       

    }
    public function modify(request $request)
    {
        $validatedData = $request->validate([
            'action' => ['string', 'max:10'],
            'id' => [
            'required',
            'numeric',
            ],
        
         ],);
        $historique = new historiques();
        $historique->device_id = $validatedData['id'];
        if($validatedData['action'] == 'Éteindre')
        {
            Device::whereid($validatedData['id'])->update(['state' => 0]);
            $historique->state = 0 ;

            $historique->save();

        }
        elseif($validatedData['action'] == 'Allumer')
        {
            Device::whereid($validatedData['id'])->update(['state'=> 1]);
            $historique->state = 1;
            $historique->save();

        }
        elseif($validatedData['action'] == 'Supprimer')
        {
            Device::whereid($validatedData['id'])->delete();

        }
        return redirect()->back();

    }
}
