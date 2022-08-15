<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryController extends Controller
{
    // Show Gallery
    public function showGallery() {
        return view('pages.gallery', ['galleries' => Gallery::all()]);
    }

    // Show Add Image
    public function showAddImage() {
        return view('pages.add-image');
    }

    // Upload Image
    public function uploadImage(Request $request) {
        $formFields = $request->validate([
            'brand_name' => ['required'],
            'item_description' => ['required'],
            'price_per_unit' => ['required'],
            'gallery_image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($request->hasFile('gallery_image')) {
            $formFields['gallery_image'] = $request->file('gallery_image')->store('gallery_image', 'public');
        }

        // Create User
        Gallery::create($formFields);

        Alert::success('Success', 'Successfully Add New Image');
        return redirect('/gallery');
    }

    // Show Edit Gallery
    public function showEditGallery(Gallery $gallery) {
        // dd($gallery);
        return view('pages.edit-gallery', ['gallery' => $gallery]);
    }

    // Update Gallery
    public function updateGallery(Request $request, Gallery $gallery) {
        $formFields = $request->validate([
            'brand_name' => ['required'],
            'item_description' => ['required'],
            'price_per_unit' => ['required'],
            'gallery_image' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);

        $gallery->update($formFields);

        Alert::success('Success', 'Successfully Update Gallery');
        return redirect('/gallery');
    }

    // Delete Gallery
    public function deleteGallery(Gallery $gallery) {
        $gallery->delete();

        Alert::success('Success', 'Successfully Delete Gallery');
        return redirect('/gallery');
    }
}
