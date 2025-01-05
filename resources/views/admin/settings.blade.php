<x-admin>
    @auth
        <!-- Direction of Tabs -->
        <section class="fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
            <p class="text-sm">
                <i class="fas fa-home text-gray-800"></i>
                <a a href="/home">Dashboard</a> / Settings
            </p>
        </section>

        <!-- Scrollable Box below the Direction Tabs -->
        <div class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
            <div class="p-4 text-center text-gray-500">
                <!--No content -->

                
            
            </div>
        </div>

                
    @endauth

</x-admin>



