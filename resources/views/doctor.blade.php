<x-app-layout>
    <div class=" h-80">
        <img src="{{asset('assets/imgs/createDoctor.png')}}" alt="" class="w-full h-full object-cover object-center" />
    </div>
    <div class="mt-6">
        <div class="bg-[#BEBEBE]">
            <div class="container mx-auto">
                <div class="py-3 ">
                    <h3 class="text-cus-black font-semibold">Tạo mới bác sĩ</h3>
                </div>
            </div>
        </div>
        <form action="{{ route('doctors.store') }}" class="container mx-auto" method="POST" >
            @csrf
            <div class="py-2.5 mt-4 px-8 bg-[#88DBFF] mb-6">
                <h3 class="text-[#00256C] font-semibold text-lg">Thông tin bác sĩ</h3>
            </div>
            <div class="mt-3 flex items-center justify-between gap-10">
                <div class="w-full">
                    <x-Label value="Họ và tên" />
                    <x-PrimaryInput name="fullName" />
                </div>
            </div>
            <div class="flex items-center justify-between mt-10">
                <div></div>
                <button class="h-11 font-semibold px-3 text-white rounded-xl bg-sky-400 ">Xác nhận</button>
            </div>
        </form>
    </div>

</x-app-layout>


<script>
    $(".doctor-select").select2({
        // allowClear: true,
        width: '100%',
    });
</script>