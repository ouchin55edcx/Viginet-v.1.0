<?php

    namespace App\Http\Controllers\Complaint;

    use App\Http\Controllers\Controller;
    use App\Models\Complaint;
    use App\Models\Image;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class ComplaintController extends Controller
    {
        public function index()
        {
            return view('complaint.index');
        }


        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'attack' => 'required|in:TypeA,TypeB,TypeC',
                'description' => 'required|string',
                'is_anonymous' => 'nullable|boolean',
                'callback' => 'nullable|string',
                'image.*' => 'required|image|max:2048', // Max 2MB image file size for each file

            ]);


            $complaint = new Complaint();
            $complaint->attack = $validatedData['attack'];
            $complaint->description = $validatedData['description'];
//            $complaint->is_nonymous = $validatedData['is_anonymous'] ?? false;
            $complaint->callback = $validatedData['callback'] ?? null;

            if (Auth::check()) {
                $complaint->user_id = Auth::user()->id;
                $complaint->is_nonymous = 0;
            }else{
                $complaint->is_nonymous = 1;
            }

            // Save the complaint to the database
            $complaint->save();

            // Handle file uploads
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $file) {
                    $imagePath = $this->storeImage($file);
                    // Create a new Image record linked to the complaint
                    Image::create([
                        'path' => $imagePath,
                        'imageable_id' => $complaint->id,
                        'imageable_type' => Complaint::class,
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Complaint submitted successfully!');
        }

        private function storeImage($image)
        {
            $directory = 'images';
            return $image->store($directory, 'public');
        }


    }
