<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-violet-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-violet-800 border-b border-gray-200 text-slate-100">
                    You're logged in! {{ Auth::user()->name }}
                </div>
            </div>
        </div>
        
    </div>


<div class="sm:px-140 py-3 bg-gray-200">
        
        <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <span class="animate-ping absolute inline-flex h-6 w-6 rounded-full bg-gray-400 opacity-25"></span>
        <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
        <b>Thông báo chung :</b>
        @foreach ($announcements as $index => $announcement)
        {{-- {{ $announcement->created_at }}// --}}
        {{ $announcement->announ }}

        @if(is_string($announcement->file))
        <a href="{{Storage::url(''.$announcement->file)}}" download>
            
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                <span>Download</span>
              </button>
        </a>
        @endif
        <br>
        @endforeach    
    </div>        
    </div>
</div>


    <div class="grid grid-cols-2 gap-2 lg:px-32">
<div>
<div class="py-6">
    

    <div class="max-w-7xl mx-auto sm:px-6 ">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-5 bg-white border-b border-gray-200">
               Họ và Tên : {{ Auth::user()->name }}
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 ">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-5 bg-white border-b border-gray-200">
               Email : {{ Auth::user()->email }}
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 ">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-5 bg-white border-b border-gray-200">
               Giới tính : {{ Auth::user()->gender }}
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 ">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-5 bg-white border-b border-gray-200">
               Số điện thoại : {{ Auth::user()->phone_number }}
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 ">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-5 bg-white border-b border-gray-200">
               Địa chỉ : {{ Auth::user()->address }}
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 ">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-5 bg-white border-b border-gray-200">
               Ngày sinh : {{ Auth::user()->birth_date }}
            </div>
        </div>
    </div>

</div>
</div>
{{-- change-password --}}
<div>
    <div class="py-6 lg:px-6">
        
    <form action="{{ route('update-password')}}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
        @csrf
            @if (session('status'))
                            <div class="text-green-500" role="alert">
                                {{ session('status') }}
                            </div>
                        @elseif (session('error'))
                            <div class="text-red-500" role="alert">
                                {{ session('error') }}
                            </div>
            @endif
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2"  for="oldPasswwordInput">
              Old Password
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('old_password') is-invalid @enderror" name="old_password" type="password" id="oldPasswwordInput" placeholder="Old Password">
            @error('old_password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
          </div>

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="newPasswwordInput">
            New Password
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('new_password') is-invalid @enderror" name="new_password" type="password"  id="newPasswwordInput" placeholder="New Password">
            @error('new_password')
                    <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="confirmNewPasswwordInput">
            Password confirm 
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="new_password_confirmation" type="password" id="confirmNewPasswwordInput" placeholder="Confirm New Password">
          
        </div>

        <div class="flex items-center justify-between">
          <button class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
            Submit
          </button>
        </div>

      </form>
    </div>
</div>
</div>




<div class="py-0">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-green-600 p-5 bg-white border-b border-gray-200">
               Tổng công tháng : {{ Auth::user()->attendence_record }}
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="text-green-700 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-5 bg-white border-b border-gray-200">
               Thời điểm chấm công gần nhất : {{ Auth::user()->attendence_time }}
            </div>
        </div>
    </div>


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-5 bg-white border-b border-gray-200">
               Ngày bắt đầu  làm việc : {{ Auth::user()->date_hired }}
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-5 bg-white border-b border-gray-200">
               Tiền lương cơ bản : {{ Auth::user()->basic_salary }}
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-5 bg-white border-b border-gray-200">
               Trợ cấp : {{ Auth::user()->subsidy }}
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-5 bg-white border-b border-gray-200">
               Tiền lương tháng này : {{ Auth::user()->salary }}
            </div>
        </div>
        
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-5 bg-white border-b border-gray-200">
               Tiền lương tháng trước : {{ Auth::user()->salary_last_month }}
            </div>
        </div>
    </div>
</div>
   

    
    {{-- <table class="table">
 
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                
             </tr>
         </thead>
 
        @foreach ($users as $index => $user)
            <tbody>
            <tr>
                <th scope="row">{{$index}}</th>
                
                <td>{{$user->name}}</td>
                
                
            </tr>  
            </tbody>
        @endforeach
     
        <div style="color: aqua">{{ Auth::user()->name }}</div>
    </table> --}}







    <div class="py-6"></div>

    {{-- trasublai leave message : Cjperry1? --}}
       


        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
                <h2 class="mb-4 text-4xl tracking-tight text-center text-gray-900 dark:text-white">Thắc Mắc Liên Hệ</h2>
                <form
                    action="https://formspree.io/f/xvoyvewn"
                    method="POST"
                    class="space-y-6"
                >
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                        <input value="{{ Auth::user()->email }}"  name="email" type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tin nhắn</label>
                        <textarea name="message" id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Để lại thắc mắc...."></textarea>
                    </div>
                    <button type="submit" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Gửi</button>
                    
                </form>

                <div class="py-3"></div>
                <a href="https://www.messenger.com/t/100012930888450/">
                <button type="button" class=" text-center inline-flex items-center text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2  ">
                    
                    <img class="mr-2 -ml-1 w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fab" src="{{ asset('assets\images\mess.webp') }}" alt="">
                    Liên hệ qua Messenger
                  </button>
                </a>
                
                <a href="https://zalo.me/g/iqofrt205">
                    <button type="button" class=" text-center inline-flex items-center text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2  ">
                        
                        <img class="mr-2 -ml-1 w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fab" src="{{ asset('assets\images\zalo.png') }}" alt="">
                        Liên hệ qua Zalo
                      </button>
                    </a>  
            </div>
          </section>





    <div class="py-6"></div>
{{-- footer --}}

<footer class="p-4 bg-white rounded-lg shadow md:px-6 md:py-8 dark:bg-gray-900">
    <div class="sm:flex sm:items-center sm:justify-between">
        <a href="#" class="flex items-center mb-4 sm:mb-0">
            <img width="100px" height="50px" src="{{ asset('assets\images\sophic_logo.png') }}" alt="">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Sophic AutoMation VN</span>
        </a>
        <ul class="flex flex-wrap items-center mb-6 text-sm text-gray-500 sm:mb-0 dark:text-gray-400">
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6 ">Licensing</a>
            </li>
            <li>
                <a href="#" class="hover:underline">Contact</a>
            </li>
        </ul>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
    <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="#" class="hover:underline">Sophic AutoMation VN™</a>. All Rights Reserved.
    </span>
</footer>

    
</x-app-layout>
