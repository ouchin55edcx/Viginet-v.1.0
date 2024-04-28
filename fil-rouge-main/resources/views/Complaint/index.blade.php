
@extends('layouts.navbar')

@section('content')


     {{-- hero section  --}}

    <section class="bg-white  flex justify-between my-12  h-[50vh]"
        style="background-image: url('storage/images/learnbg.png'); background-size: cover; object-fit: cover; width: 100%;">
        <div class="py-8 m-4 md:mx-12 md:my-12">
            <h1 class="mb-4 text-4xl md:text-5xl font-extrabold text-white">Report Cyber Threats: Your Safety Matters</h1>
            <div class="flex items-center gap-2 bg-[#05192D] max-w-sm p-1 rounded">
                <img src="storage/images/compaint.png" alt="" class="w-6 h-6">
                <h2 class="text-white">Over 700 problems solved</h2>
            </div>
            <p class="mb-8 mt-4 text-lg font-normal text-white">Search hundreds of walkthroughs and challenges by
                security category or difficulty.</p>
        </div>
        <div class="hidden md:flex items-center justify-end mx-12">
            <img src="storage/images/none.svg.png" alt="">
        </div>
    </section>

    {{-- comlaint form  --}}
     @guest()
         <div
             class="flex justify-center items-center md:mx-[9.5rem] mx-2 my-2 font-medium py-1 px-2 h-16 rounded-md text-black bg-[#dee6fb]">
             <div slot="avatar">
                 <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" class="feather feather-info w-5 h-5 mx-2">
                     <circle cx="12" cy="12" r="10"></circle>
                     <line x1="12" y1="16" x2="12" y2="12"></line>
                     <line x1="12" y1="8" x2="12.01" y2="8"></line>
                 </svg>
             </div>
             <div class="text-xl font-normal  max-w-full flex-initial">
                 <div class="py-2">
                     <div class="text-sm font-base">Anonymouse complainte, if you dont want start machines and  <a
                             class="text-blue-500" href="{{route('login.index')}}"> login</a></div>
                 </div>
             </div>
             <div class="flex flex-auto flex-row-reverse">
                 <div>
                     <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"
                          class="feather feather-x cursor-pointer hover:text-yellow-400 rounded-full w-5 h-5 ml-2">
                         <line x1="18" y1="6" x2="6" y2="18"></line>
                         <line x1="6" y1="6" x2="18" y2="18"></line>
                     </svg>
                 </div>
             </div>
         </div>

     @endguest

    <section class="mx-2 md:mx-8">
        <div class=" ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white">
                        <form method="POST" action="{{ route('complaint.store') }}" class="border-2 border-black-300 p-4 m-4 rounded-lg" enctype="multipart/form-data">
                            @csrf
                            <h1 class="text-center font-bold text-3xl p-8">Complaint Submission Form</h1>

                            <div class="mb-4 p-8">
                                <label class="text-xl text-gray-600">Type of attack... <span class="text-red-500">*</span></label><br>
                                <select name="attack" class="border-2 border-gray-400 p-2 bg-[#E9ECEF] rounded-lg w-full" required>
                                    <option value="" selected disabled>Select attack type...</option>
                                    @foreach(['TypeA', 'TypeB', 'TypeC'] as $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                            </div>

                            <div class="mb-4 p-8">
                                <label class="text-xl text-gray-600">Description of the Problem... <span class="text-red-500">*</span></label><br>
                                <textarea name="description" class="border-2 border-gray-300 p-2 bg-[#E9ECEF] rounded-lg w-full"></textarea>
                            </div>

                            <div class="mb-4 p-8">
                                <label class="text-xl text-gray-600">Proof... <span class="text-red-500">*</span></label><br>
                                <input type="file" class="border-2 border-gray-300 p-2 bg-[#E9ECEF] rounded-lg w-full" multiple name="image[]" id="title" value="" required placeholder="Preuves..">
                            </div>
                            @guest()
                            <div class="mb-4 p-8">
                                <label class="text-xl text-gray-600">callback...<span class="text-red-500">*</span></label><br>
                                <input type="text" class="border-2 border-gray-300 p-2 bg-[#E9ECEF] rounded-lg w-full" name="callback" id="title" value="" required placeholder="Phone number...">
                            </div>
                            @endguest
                            <div class="flex p-8">
                                <button type="submit" class="py-2 px-4 max-w-md flex justify-center items-center bg-white text-[#79BF00] border-2 border-[#79BF00] rounded-lg w-full">
                                    Submit complaint..
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- contact  --}}
    <section class="mx-2 md:mx-8">
        <div>
            <div class="m-4">
                <h1 class="p-4 text-4xl font-bold text-black md:ml-24">
                    Contact
                </h1>
                <p class="px-4 text-lg text-gray-700 md:ml-24">
                    If you have any idea for a website, whether it's for fun or work, contact me! I'll create it for free!
                </p>
                <p class="px-4 text-sm text-gray-500 md:ml-24">
                    For emergencies, please contact:
                </p>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white">
                        <div class="border-2 border-black p-4 m-4 rounded-lg">
                            <h1 class="text-center font-bold text-xl p-4 text-[#A20606]">Emergency Contact</h1>

                            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:gap-8">
                                <!-- Contact Item 1: Email -->
                                <div class="border-2 border-[#ECBB0A] rounded-xl bg-[#223654] shadow-lg">
                                    <div class="p-4">
                                        <img src="storage/images/Email-Logo.png" alt="Email Icon" class="w-16 h-12 mx-auto mb-4">
                                        <p class="text-white font-bold text-2xl text-center mb-4">Viginet@gmail.com</p>
                                        <button class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded w-full">
                                            Copy
                                        </button>
                                    </div>
                                </div>

                                <!-- Contact Item 2: Phone Number -->
                                <div class="border-2 border-[#ECBB0A] rounded-xl bg-[#223654] shadow-lg">
                                    <div class="p-4">
                                        <img src="storage/images/Vector (1).png" alt="Phone Icon" class="w-12 h-12 mx-auto mb-4">
                                        <p class="text-white font-bold text-2xl text-center mb-4">+212 63635960</p>
                                        <button class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded w-full">
                                            Copy
                                        </button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    document.getElementById('meetingBtn').addEventListener('click', function() {
    document.getElementById('meetingModal').classList.remove('hidden');
});

document.getElementById('confirmMeeting').addEventListener('click', function() {
    // Handle the confirmation logic here (e.g., send an email with the meeting link)
    alert('Meeting confirmed! A link has been sent to your email.');
    document.getElementById('meetingModal').classList.add('hidden');
});

document.getElementById('cancelMeeting').addEventListener('click', function() {
    document.getElementById('meetingModal').classList.add('hidden');
});

// copies

document.getElementById('copyEmailBtn').addEventListener('click', function() {
    const emailAddress = 'Viginet@gmail.com';
    navigator.clipboard.writeText(emailAddress)
        .then(() => {
            alert('Email address copied to clipboard!');
        })
        .catch((error) => {
            console.error('Failed to copy email address:', error);
        });
});

document.getElementById('copyPhoneBtn').addEventListener('click', function() {
    const phoneNumber = '+212 63635960';
    navigator.clipboard.writeText(phoneNumber)
        .then(() => {
            alert('Phone number copied to clipboard!');
        })
        .catch((error) => {
            console.error('Failed to copy phone number:', error);
        });
});
</script>
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
