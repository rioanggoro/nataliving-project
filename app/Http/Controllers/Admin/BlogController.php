<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    /**
     * Tampilkan semua blog
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Form tambah blog
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Simpan blog baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('blogs', 'public');
        }

        Blog::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'content' => $validated['content'],
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil ditambahkan!');
    }

    /**
     * Form edit blog
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update blog
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $updateData = [
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'content' => $validated['content'],
        ];

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($blog->thumbnail) {
                Storage::disk('public')->delete($blog->thumbnail);
            }

            $updateData['thumbnail'] = $request->file('thumbnail')->store('blogs', 'public');
        }

        $blog->update($updateData);

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil diperbarui!');
    }

    /**
     * Hapus blog
     */
    public function destroy(Blog $blog)
    {
        // Hapus thumbnail dari storage
        if ($blog->thumbnail) {
            Storage::disk('public')->delete($blog->thumbnail);
        }

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil dihapus!');
    }

    /**
     * Upload gambar dari Trix Editor
     */
    public function uploadTrixImage(Request $request)
    {
        try {
            // Debug info
            Log::info('Trix upload request received', [
                'has_file' => $request->hasFile('file'),
                'file_keys' => array_keys($request->allFiles()),
                'all_keys' => array_keys($request->all())
            ]);
            
            if (!$request->hasFile('file')) {
                Log::error('Trix upload error: No file in request');
                return response()->json(['error' => 'No file in request'], 422);
            }
            
            $file = $request->file('file');
            
            // Debug file info
            Log::info('File info', [
                'original_name' => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'error' => $file->getError()
            ]);
            
            // Cek apakah folder ada dan bisa ditulis
            $storage_path = storage_path('app/public/blogs/content');
            if (!file_exists($storage_path)) {
                mkdir($storage_path, 0755, true);
            }
            
            // Simpan file dengan nama yang unik
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('blogs/content', $filename, 'public');
            
            if (!$path) {
                Log::error('Trix upload error: Failed to store file');
                return response()->json(['error' => 'Failed to store file'], 500);
            }
            
            Log::info('Trix upload success', ['path' => $path]);
            
            return response()->json([
                'url' => asset('storage/' . $path)
            ], 200);
        } catch (\Exception $e) {
            Log::error('Trix upload error: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
