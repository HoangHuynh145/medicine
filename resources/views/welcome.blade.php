<x-app-layout>
    <div class="">
        <img src="{{asset('assets/imgs/topHeader.png')}}" alt="" class="w-full" />
    </div>
    @include('partials.Notification')
    <div class="container mx-auto">
        <ul class="mt-20 space-y-4">
            @foreach($prescriptions as $prescription)
                <li class="group relative w-full bg-[#E5661E]/5 p-5 rounded-xl">
                    <div>
                        <h3 class="text-xl font-semibold mb-2">Thông tin đơn thuốc</h3>
                        <ul>
                            <li class="text-base">
                                <span class="text-slate-900 mr-1 font-medium">Người kê đơn: </span>
                                <span class="text-[#CF7D4E]">{{ $prescription['doctor'] }}</span>
                            </li>
                            <li class="text-base">
                                <span class="text-slate-900 mr-1 font-medium">Bệnh nhân: </span>
                                <span class="text-[#CF7D4E]">{{ $prescription['patientName'] }} - {{ $prescription['patientPhone'] }} </span>
                            </li>
                            <li class="text-base">
                                <span class="text-slate-900 mr-1 font-medium">Thời gian kê đơn: </span>
                                <span class="text-[#24BEE0]">{{ $prescription['createdAt']->format('d/m/Y') }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-3.5">
                        <h3 class="text-xl font-semibold mb-2">Chi tiết đơn thuốc</h3>
                        <div class="relative overflow-x-hidden">
                            <table class="w-full text-sm text-left rtl:text-right text-cus-black/70">
                                <thead class="text-xs ttext-cus-black uppercase bg-transparent mb-3">
                                    <tr>
                                        <th scope="col" class="px-6 py-2">
                                            Tên thuốc
                                        </th>
                                        <th scope="col" class="px-6 py-2">
                                            Số lượng
                                        </th>
                                        <th scope="col" class="px-6 py-2">
                                            Cách dùng
                                        </th>
                                        <!-- <th scope="col" class="px-6 py-2">
                                            Ghi chú
                                        </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($prescription['medications'] as $medication)
                                        <tr class="bg-transparent">
                                            <th scope="row" class="px-6 py-1 font-medium text-cus-black/70">
                                                {{ $medication['medicationName'] }}
                                            </th>
                                            <td class="px-6 py-1">
                                                {{ $medication['quantity'] }}
                                            </td>
                                            <td class="px-6 py-1">
                                                Ngày {{ $medication['frequency'] }} lần.
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="mt-4 flex justify-center">
        <div class="demo-inline-spacing">
            <!-- Outline rounded Pagination -->
            <nav aria-label="Page navigation">
                {{ $prescriptionsPagging->render('partials.paging') }}
            </nav>
            <!--/ Outline rounded Pagination -->
        </div>
    </div>
</x-app-layout>