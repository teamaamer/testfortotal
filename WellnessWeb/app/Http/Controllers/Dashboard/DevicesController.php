<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeviceRequest;
use App\Models\Device;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class DevicesController extends Controller
{
    public function index()
    {
        return view('dashboard.devices.index');
    }

    public function create()
    {
        return view('dashboard.devices.create_edit');
    }

    public function edit(Device $device)
    {
        return view('dashboard.devices.create_edit')->with(compact('device'));
    }


    public function show(Device $device)
    {
        return view('dashboard.devices.show')->with(compact('device'));
    }

    public function destroy(Request $request, Device $device)
    {
        $device->delete();
        return redirect('dashboard/devices/')->with('success', $device->name . ' has been Created Successfully');
    }

    public function store(DeviceRequest $request)
    {

        $avatar = 'device1.webp';

        if ($request->hasFile('coverPreview')) {

            $destinationPath = base_path('../uploads/products');

            // Generate new name
            $avatar = hash('sha256', mt_rand()) . '.' . $request->file('avatar')->getClientOriginalExtension();

            // Move original file
            $request->file('avatar')->move($destinationPath, $avatar);

            // Resize using Intervention Image V3
            $manager = new ImageManager(new Driver());

            $imagePath = $destinationPath . '/' . $avatar;
            $image = $manager->read($imagePath);

            // Resize (fit) to 300x300 — use whatever size you want
            $image->coverDown(300, 300);

            // Save final avatar
            $image->save($imagePath);
        }


        $device = Device::create([
            'name' =>  $request->name,
            'avatar' => $avatar,
            'status' => $request->status,
            'summary' => $request->summary
        ]);

        $device->save();

        return redirect('dashboard/devices/' . $device->id)->with('success', $device->name . ' has been Created Successfully');
    }



    public function update(DeviceRequest $request, Device $device)
    {
        $device->name = $request->input('name');
        $device->summary = $request->input('summary');
        $device->status = $request->input('status');

        if ($request->hasFile('avatar')) {

            $destinationPath = base_path('../uploads/products');

            // delete old file if not default
            if ($device->avatar != "../uploads/products/device1.webp") {
                @unlink(base_path($device->avatar));
            }

            $avatar = hash('sha256', mt_rand()) . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move($destinationPath, $avatar);

            // Correct Intervention Image V3 usage
            $manager = new ImageManager(new Driver());

            $imagePath = base_path('../uploads/products/' . $avatar);
            $image = $manager->read($imagePath);

            // example of resize (coverDown = crop+fit)
            $image->coverDown(300, 300); // adjust as needed

            $image->save($imagePath);

            $device->avatar = $avatar;
        }

        $device->save();

        return redirect('dashboard/devices/' . $device->id)
            ->with('success', $device->title . ' has been updated Successfully');
    }
}
