   <footer class="md:px-32 px-6 text-gray-500 text-sm   pt-14">
       <div
           class="grid md:grid-cols-4 grid-cols-1 items-center justify-center gap-8 pb-6 md:gap-8 border-slate-200 border-b">
           <div class="md:col-span-2">
               <img src="{{ asset('image/logo/logo.png') }}"
                   class="md:h-11 h-10 animate__animated animate__pulse animate__infinite animate__slow" alt="">
               <p class="max-w-160 mt-3">
                   SIXT provides a wide range of premium vehicles, from convertibles to SUVs, across over 2,000
                   locations in more than 105 countries. They emphasize transparent pricing with no hidden costs and
                   offer flexible options like pay-later and car subscriptions

               </p>

               <div class="flex items-center gap-3 mt-6">
                   <a href="https://www.facebook.com/"><i class="ri-facebook-fill text-xl"></i></a>
                   <a href="https://www.instagram.com/"><i class="ri-instagram-line text-xl"></i></a>
                   <a href="https://x.com/"><i class="ri-twitter-line text-xl"></i></a>
                   <a href="https://accounts.google.com/"><i class="ri-mail-line text-xl"></i></a>
               </div>
           </div>



           <div>
               <h2 class="text-base font-medium uppercase text-gray-800">Quick Links</h2>
               <ul class="text-sm flex flex-col gap-1.5 mt-3">
                   <li><a href="{{ route('home') }}">Home</a></li>
                   <li><a href="{{ route('AboutUs') }}">About Us</a></li>
                   <li><a href="{{ route('cars') }}">Browse Cars</a></li>
                   <li><a href="{{ route('TermsOfService') }}">Terms of Service</a></li>
                   <li><a href="{{ route('PrivacyPolicy') }}">Privacy Policy</a></li>
               </ul>

           </div>


           <div>
               <h2 class="text-base font-medium uppercase text-gray-800">Contact</h2>
               <ul class="text-sm flex flex-col gap-1.5 mt-3">
                   <li> 1234 Luxury Drive</li>
                   <li>San Francisco,CA 94107</li>
                   <li>+1 2345678</li>
                   <li>info@example.com</li>
               </ul>

           </div>

       </div>

       <div class="flex flex-col md:flex-row gap-2 items-center justify-between py-4">
           <p>© {{ date('Y') }} CarRental. All Right Reserved!</p>
           <ul class="flex items-center gap-4">
               <li><a href="{{ route('PrivacyPolicy') }}">Privacy</a></li>
               <li>|</li>
               <li><a href="{{ route('TermsOfService') }}">Terms</a></li>
               <li>|</li>
               <li><a href="#">Cookies</a></li>
           </ul>
       </div>

   </footer>
