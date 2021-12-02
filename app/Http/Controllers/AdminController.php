<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Roles;
use App\Plans;
use App\Images;

class AdminController extends Controller
{
    private $pages;

    private $data;

    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('roles:ROLE_ADMIN');
        // $this->middleware('administrator', ['only' => ['adminFunction', 'otherAdminFunction','bothCanAccess']]);

        switch($request->pages) {
            case md5('admin.plans'):
                $this->pages = 'admin.plans';
                $this->data = Plans::with('images')->get();
            break;
            case md5('admin.editPlans'):
                $this->pages = 'admin.editPlans';
            break;
            default:
                $this->pages = 'admin.dashboard';
            break;
        }
    }

    public function index()
    {
        return view('admin.admin', [
            'pages' => $this->pages,
            'data' => $this->data,
        ]);
    }

    public function editPlans(Request $request, $id)
    {
        $result = Plans::findOrFail($id); //not found pages

        return view('admin.admin', [
            'pages' => $this->pages,
            'data' => $result,
        ]);
    }

    public function storePlans(Request $request)
    {
        $imagesId = null;

        // Validate the inputs
        $request->validate([
            // 'name' => 'required',
        ]);

        // ensure the request has a file before we attempt anything else.
        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            //store in storage/app/public/product $request->file->store('product', 'public');
            //store in storage/app/public $request->file->store('public');
            $request->file->store('public');

            // Store the record, using the new file hashname which will be it's new filename identity.
            $images = new Images([
                "file_path" => $request->file->hashName()
            ]);
            $images->save(); // Finally, save the record.
            $imagesId = $images->id;
        }

        $plans = Plans::find($request->id);

        if ($imagesId) {
            $plans->images_id = $imagesId;
        }

        $plans->plans = $request->plans;
        $plans->price = $request->price;
        $plans->description = $request->description;
        $plans->save();

        return redirect()->route('admin.home', 'pages='.md5('admin.plans'));
    }
}
