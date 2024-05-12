<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{

    public function index()
    {
        $data = Client::get();
        return view('dashboard.pages.client.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.pages.client.create');
    }
    public function store(Request $request)
    {
        $clientData = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|string',
            'gender' => 'required',
            'note' => 'required|string',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('image/client'), $imageName);
            $clientData['img'] = $imageName;
        } else {
            $clientData['img'] = 'demo.webp';
        }

        $client = Client::create($clientData);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->phone,
            'password' => $request->password,
            'client_id' => $client->id
        ]);
        Toastr::success('Client Create Success', 'Success');
        return redirect()->back();
    }
    public function edit(Client $client)
    {
        return view('dashboard.pages.client.edit', compact('client'));
    }
    public function update(Request $request, Client $client)
    {
        $clientData = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|string',
            'gender' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('img')) {
            // Check if the previous image name is not 'demo.webp'
            if ($client->img != 'demo.webp') {
                $previousImage = public_path('image/client') . '/' . $client->img;
                if (File::exists($previousImage)) {
                    File::delete($previousImage);
                }
            }
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('image/client'), $imageName);
            $clientData['img'] = $imageName;
        } else {
            $imageName = $client->img;
        }

        $client->update($clientData);
        Toastr::success('Client updated successfully.', 'Success');
        return redirect(url('dashboard/client'));
    }

    public function destroy($id)
    {
        $data = Client::findOrFail($id);
        // Delete image file if it exists
        if ($data->img) {
            if ($data->img != 'demo.webp') {
                $imagePath = public_path('image/client') . '/' . $data->img;
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        }
        $data->delete();
        Toastr::warning('Client Delete Success', 'Success');
        return redirect()->back();
    }
    public function details($id)
    {
        $data = Client::findOrFail($id);
        return view('dashboard.pages.client.details', compact('data'));
    }
}
