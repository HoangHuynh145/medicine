<x-app-layout>
    <div class="h-80">
        <img src="{{asset('assets/imgs/createMedication.png')}}" alt="" class="w-full h-full object-cover object-center" />
    </div>
    <div class="mt-6">
        <div class="bg-[#BEBEBE]">
            <div class="container mx-auto">
                <div class="py-3 ">
                    <h3 class="text-cus-black font-semibold">Tạo mới thuốc</h3>
                </div>
            </div>
        </div>
        <form action="{{ route('medications.store') }}" class="container mx-auto" method="POST">
            @csrf
            <div class="py-2.5 mt-4 px-8 bg-[#88DBFF] mb-6">
                <h3 class="text-[#00256C] font-semibold text-lg">Thông tin thuốc</h3>
            </div>

            <div class="mt-3 flex items-center justify-between gap-10">
                <div class="basis-full">
                    <x-Label value="Tên thuốc" />
                    <x-PrimaryInput name="medicationName" placeholder="Paracetamol" />
                </div>
            </div>

            <div class="mt-3 flex items-center justify-between gap-10">
                <div class="basis-1/2">
                    <x-Label value="Đơn vị" />
                    <x-PrimaryInput name="unit" placeholder="mg" />
                </div>
                <div class="basis-1/2">
                    <x-Label value="Số lần dùng tối đa 1 ngày" />
                    <x-PrimaryInput name="frequencyMax" placeholder="4" />
                </div>
            </div>

            <div class="mt-3 flex items-center justify-between gap-10">
                <div class="basis-1/2">
                    <x-Label value="Liều lượng tối thiểu" />
                    <x-PrimaryInput name="doseMin" placeholder="10" />
                </div>
                <div class="basis-1/2">
                    <x-Label value="Liều lượng tối đa" />
                    <x-PrimaryInput name="doseMax" placeholder="100" />
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