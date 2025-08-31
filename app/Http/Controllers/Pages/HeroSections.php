<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sections\HeroSectionDescriptions;
use App\Models\Sections\HeroSectionImagePath;
use App\Models\Sections\HeroSectionTitles;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class HeroSections extends Controller
{
    public function index()
    {
        try {
            $heroSection = [
                'imagePath' => HeroSectionImagePath::pluck('image_path')->first() ?? null,
                'titles' => HeroSectionTitles::select('id', 'title')->get() ?? [],
                'descriptions' => HeroSectionDescriptions::select('id', 'description')->get() ?? [],
            ];

            return Inertia::render('heroSection/hero-section', [
                'heroSection' => $heroSection,
            ]);
        } catch (\Exception $e) {
            return Inertia::render('heroSection/hero-section', [
                'heroSection' => [],
                'error' => 'Something went wrong while loading hero section.',
            ]);
        }
    }


    public function store(Request $request)
    {
        try {
            // عنوان جديد
            if ($request->filled('title')) {
                $request->validate([
                    'title' => ['required', 'string', 'max:255'],
                ]);

                HeroSectionTitles::create([
                    'title' => trim($request->input('title')),
                ]);
            }

            // وصف جديد
            if ($request->filled('description')) {
                $request->validate([
                    'description' => ['required', 'string'],
                ]);
                HeroSectionDescriptions::create([
                    'description' => trim($request->input('description')),
                ]);
            }

            return back()->with('success', 'Data saved successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e; // أخطاء التحقق تُعاد تلقائياً إلى Inertia
        } catch (\Throwable $e) {
            // \Log::error('HeroSection@store', ['msg' => $e->getMessage()]);
            return back()->with('error', 'Something went wrong while saving.');
        }
    }



    public function destroy(Request $request, $id)
    {

        // dd($request->all());
        if ($request->type === 'title') {
            $title = HeroSectionTitles::findOrFail($id);
            $title->delete();
            return redirect()->back()->with('success', 'Title deleted successfully.');
        }

        if ($request->type === 'description') {
            $description = HeroSectionDescriptions::findOrFail($id);
            $description->delete();
            return redirect()->back()->with('success', 'description deleted successfully.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->filled('newTitle')) {
                $request->validate(['newTitle' => ['required', 'string', 'max:255']]);

                $title         = HeroSectionTitles::findOrFail($id);
                $title->title  = trim($request->input('newTitle'));
                $title->save();

                return back()->with('success', 'Title updated successfully.');
            }

            if ($request->filled('newDescription')) {
                $request->validate(['newDescription' => ['required', 'string']]);

                $description         = HeroSectionDescriptions::findOrFail($id);
                $description->description  = trim($request->input('newDescription'));
                $description->save();

                return back()->with('success', 'Description updated successfully.');
            }

            if ($request->hasFile('imagePath')) {
                $request->validate([
                    'imagePath' => ['required', 'image', 'max:2048'],
                ]);

                $path = $request->file('imagePath')->store('hero', 'public');

                $record = HeroSectionImagePath::first();
                if ($record && $record->image_path) {
                    Storage::disk('public')->delete($record->image_path);
                }

                HeroSectionImagePath::updateOrCreate([], [
                    'image_path' => $path,
                ]);

                return back()->with('success', 'Image updated successfully.');
            }

            return back()->with('error', 'No data received.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Throwable $e) {
            return back()->with('error', 'Something went wrong, please try again.');
        }
    }
}
