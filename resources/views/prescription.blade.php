<x-app-layout>
    <div class=" h-80">
        <img src="{{asset('assets/imgs/createPerscription.png')}}" alt="" class="w-full h-full object-cover object-center" />
    </div>
    <div class="mt-6">
        <div class="bg-[#BEBEBE]">
            <div class="container mx-auto">
                <div class="py-3 ">
                    <h3 class="text-cus-black font-semibold">Thông tin đơn thuốc</h3>
                </div>
            </div>
        </div>
        <div class="container mx-auto">
            <div class="mt-4 mb-6">
                <x-Label value="Chọn bác sĩ kê đơn" />
                <select class="doctor-select" name='doctorID' onchange="handleSelectDoctor(event)">
                    <option value="" selected disabled></option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor['id'] }}">{{ $doctor['fullName'] }}</option>
                    @endforeach
                </select>
            </div>
            <!-- PATIENTS -->
            <div class="py-2.5 px-8 bg-[#88DBFF] mb-6">
                <h3 class="text-[#00256C] font-semibold text-lg">Thông tin bệnh nhân</h3>
            </div>
            <div class="mt-3 flex items-center justify-between gap-10">
                <div class="basis-1/2">
                    <x-Label value="Họ và tên" />
                    <select class="patients-select" onchange="handleSelectPatient(event)">
                        <option value="" selected disabled></option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient['phone'] }}">{{ $patient['fullName'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="basis-1/2">
                    <x-Label value="Điện thoại" />
                    <x-PrimaryInput name="patientsPhone" id="patientPhone" disabled />
                </div>
            </div>
            <!-- MEDICATION -->
            <div class="mt-7">
                <h3 class="text-cus-black font-semibold text-lg">Chọn thuốc</h3>
            </div>
            <div class="mt-2.5 flex items-center gap-3.5">
                <div class="basis-[25%]">
                    <x-Label value="Tên thuốc" />
                    <select class="medication-select" onchange="handleSelectMedication(event)">
                        <option value="" selected disabled></option>
                        @foreach($medications as $medication)
                            <option 
                                value="{{ $medication['id']. '#' . $medication['unit']. '#' . $medication['doseMin']. '#' . $medication['doseMax']. '#' . $medication['frequencyMax']. '#' . $medication['medicationName'] }}"
                            >
                                {{ $medication['medicationName'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="basis-[10%]">
                    <x-Label value="Đơn vị dùng" />
                    <x-PrimaryInput id="medicationUnit" disabled />
                </div>
                <div class="basis-[20%]">
                    <x-Label value="Liều lượng" />
                    <x-PrimaryInput id="singleDose" />
                </div>
                <div class="basis-[20%]">
                    <x-Label value="Tần suất"  />
                    <x-PrimaryInput id="frequency" />
                </div>
                <div class="basis-[20%]">
                    <x-Label value="Số lượng" />
                    <x-PrimaryInput id="quantity" />
                </div>

                <div class="basis-[5%] bg-green-400 rounded-xl self-end cursor-pointer hover:opacity-90" onclick="handleCheckMedication()">
                    <div class="flex items-center justify-center h-12">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                            <g fill="none">
                                <path d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z" />
                                <path fill="#fff" d="M10.5 20a1.5 1.5 0 0 0 3 0v-6.5H20a1.5 1.5 0 0 0 0-3h-6.5V4a1.5 1.5 0 0 0-3 0v6.5H4a1.5 1.5 0 0 0 0 3h6.5V20Z" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="mt-7">
                <h3 class="text-cus-black font-semibold text-lg">Đơn thuốc</h3>
            </div>
            <div class="mt-3 relative overflow-x-auto border border-slate-900">
                <table class="w-full text-sm text-left rtl:text-right">
                    <thead class="text-xs text-gray-700 uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3 border border-t-0 border-l-0 border-slate-900">
                                Tên thuốc
                            </th>
                            <th scope="col" class="px-6 py-3 border border-t-0 border-l-0 border-slate-900">
                                Liều lượng
                            </th>
                            <th scope="col" class="px-6 py-3 border border-t-0 border-l-0 border-slate-900">
                                Tần suất
                            </th>
                            <th scope="col" class="px-6 py-3 border border-t-0 border-l-0 border-slate-900">
                                Số lượng
                            </th>
                            <th scope="col" class="px-6 py-3 border border-t-0 border-l-0 border-r-0 border-slate-900">
                                Hành động
                            </th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <!-- <tr class="odd:bg-white even:bg-gray-100">
                            <th scope="row" class="px-6 py-3 font-medium whitespace-nowrap text-cus-black">
                                Hoạt huyết dưỡng não
                            </th>
                            <td class="px-6 py-3 text-center">
                                1
                            </td>
                            <td class="px-6 py-3 text-center">
                                0
                            </td>
                            <td class="px-6 py-3 text-center">
                                1
                            </td>
                            <td class="px-6 py-3 text-center">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                        <tr class="odd:bg-white even:bg-gray-50">
                            <th scope="row" class="px-6 py-3 font-medium whitespace-nowrap text-cus-black">
                                Hoạt huyết dưỡng não
                            </th>
                            <td class="px-6 py-3 text-center">
                                1
                            </td>
                            <td class="px-6 py-3 text-center">
                                0
                            </td>
                            <td class="px-6 py-3 text-center">
                                1
                            </td>
                            <td class="px-6 py-3 text-center">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Remove</a>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="flex items-center justify-between mt-10">
                <!-- <p>Tổng: <strong class="text-[#CF7D4E]">18 </strong>thuốc</p> -->
                <button class="h-11 font-semibold px-3 text-white rounded-xl bg-sky-400" onclick="handleSubmit()">Xác nhận</button>
            </div>
        </div>
    </div>

    <form 
        action="{{ route('prescriptions.store') }}" 
        method="POST" 
        id="hiddenForm" 
        class="none"
    >
        @csrf
    </form>

    <!-- SUCCESS TOAST -->
    <div 
        id="toast-success" 
        class="fixed top-40 -right-80 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" 
        role="alert"
    >
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ms-3 text-sm font-normal message">OK</div>
        <button 
            type="button" 
            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
            onclick="handleCloseToastSuccess()"
        >
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>

    <!-- FAILED TOAST -->
    <div 
        id="toast-danger" 
        class="fixed top-40 -right-80 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow"
        role="alert"
    >
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
            </svg>
            <span class="sr-only">Error icon</span>
        </div>
        <div class="ms-3 text-sm font-normal message">Item has been deleted.</div>
        <button 
            type="button" 
            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" 
            onclick="handleCloseToastFailed()"
        >
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
</x-app-layout>


<script>
    $(".doctor-select").select2({
        // allowClear: true,
        width: '100%',
    });

    $(".patients-select").select2({
        // allowClear: true,
        width: '100%',
    });

    $(".medication-select").select2({
        // allowClear: true,
        width: '100%',
    });

    const medicationSelected = {
        id: undefined,
        name: '',
        unit: '',
        doseMin: 0, 
        doseMax: 0, 
        frequencyMax: 0
    }

    const toastIds = {
        success: '',
        failed: '',
    }

    let patientsPhone = ''
    let doctorId = ''

    const handleShowToastFailed = ({messageShowToast}) => {
        const toastFailed = document.getElementById('toast-danger');
        const message = toastFailed.querySelector('.message');
        toastFailed.classList.add('animate-show-toast');
        message.innerHTML = messageShowToast
        toastIds.failed = setTimeout(() => {
            toastFailed.classList.remove('animate-show-toast')
            toastFailed.classList.add('animate-hide-toast')
        }, 3000);
    }

    const handleShowToastSuccess = ({messageShowToast}) => {
        const toastSuccess = document.getElementById('toast-success');
        const message = toastSuccess.querySelector('.message');
        toastSuccess.classList.add('animate-show-toast');
        message.innerHTML = messageShowToast
        toastIds.success = setTimeout(() => {
            toastSuccess.classList.remove('animate-show-toast')
            toastSuccess.classList.add('animate-hide-toast')
        }, 2500);
    }

    const handleCloseToastFailed = () => {
        const toastFailed = document.getElementById('toast-danger')
        toastFailed.classList.remove('animate-show-toast')
        toastFailed.classList.add('animate-hide-toast')
        clearTimeout(toastIds.failed)
    }

    const handleCloseToastSuccess = () => {
        const toastSuccess = document.getElementById('toast-success')
        toastSuccess.classList.remove('animate-show-toast')
        toastSuccess.classList.add('animate-hide-toast')
        clearTimeout(toastIds.success)
    }

    const handleAddMedication = ({medicationName, singleDose, frequency, quantity, unit }) => {
        const tbody = document.getElementById('table-body');
        const trTag = document.createElement('tr');
        trTag.id = `medication-${medicationName}`
        trTag.innerHTML = `
            <th scope="row" class="px-6 py-3 font-medium whitespace-nowrap text-cus-black">
                ${medicationName}
            </th>
            <td class="px-6 py-3 text-center">
                ${singleDose}(${unit})
            </td>
            <td class="px-6 py-3 text-center">
                ${frequency} lần/ngày
            </td>
            <td class="px-6 py-3 text-center">
                ${quantity}
            </td>
            <td class="px-6 py-3 text-center" onclick="handleDeleteMedication('medication-${medicationName}')">
                <p href="#" class=" cursor-pointer font-medium text-blue-600 dark:text-blue-500 hover:underline">Remove</p>
            </td>
        `
        tbody.appendChild(trTag)

        const hiddenForm = document.getElementById('hiddenForm')
        const newMedicationInputs = document.createElement('div')
        newMedicationInputs.id = `medication-${medicationName}-container`
        newMedicationInputs.innerHTML = `
            <input type='hidden' name='patientsPhone' value='${patientsPhone}' />
            <input type='hidden' name='doctorID' value='${doctorId}' />
            <input type='hidden' name='medicationId[]' value='${medicationSelected.id}' />
            <input type='hidden' name='singleDose[]' value='${singleDose}' />
            <input type='hidden' name='frequency[]' value='${frequency}' />
            <input type='hidden' name='quantity[]' value='${quantity}' />`
        
        hiddenForm.appendChild(newMedicationInputs)

        const medicationSelect = document.querySelector('select.medication-select')
        $(medicationSelect).val(null).trigger('change');
        document.getElementById('singleDose').value = ''
        document.getElementById('frequency').value = ''
        document.getElementById('quantity').value = ''
        document.getElementById('medicationUnit').value = ''
        
    }

    const handleSelectMedication = (e) => {
        const medicationUnitInput = document.getElementById('medicationUnit')
        const [id, unit, doseMin, doseMax, frequencyMax, medicationName] = e.target.value.split('#')
        medicationSelected.id = id
        medicationUnitInput.value = unit
        medicationSelected.doseMax = doseMax
        medicationSelected.doseMin = doseMin
        medicationSelected.frequencyMax = frequencyMax
        medicationSelected.name = medicationName
        medicationSelected.unit = unit
    }

    const handleSelectPatient = (e) => {
        const patientPhoneInput = document.getElementById('patientPhone')
        const phone = e.target.value
        patientPhoneInput.value = phone
        patientsPhone = phone
    }

    const handleSelectDoctor = (e) => {
        doctorId = e.target.value
    }

    const handleCheckMedication = () => {
        const singleDose = Number(document.getElementById('singleDose').value)
        const frequency = Number(document.getElementById('frequency').value)
        const quantity = Number(document.getElementById('quantity').value)
        const tagFound = document.getElementById(`medication-${medicationSelected.name}`)

        const state = {
            isValid: true,
            message: ''
        }
        // Đối với thuốc Paracetamol: (minDose: 10, maxDose: 100, frequencyMax: 4)

        if(tagFound) {
            state.isValid = false;
            state.message = `Thuốc ${medicationSelected.name} đã được kê.`
        }

        // Kiểm tra tần suất uống
        if(state.isValid) {
            if(frequency === 0) {
                // Dữ liệu mẫu (singleDose: Any, frequency: 0, quantity: Any)
                state.isValid = false;
                state.message = 'Tần suất uống quá thấp'
            } else if (frequency > medicationSelected.frequencyMax) {
                // =================================Test Case 1======================================
                // Dữ liệu mẫu (singleDose: Any, frequency: 5, quantity: Any)
                state.isValid = false;
                state.message = 'Tần suất uống quá cao'
            } else {
                // Dữ liệu mẫu (singleDose: Any, frequency: 4, quantity: Any)
                state.isValid = true
                state.message = ''
            }
        }

        // Kiểm tra liều đơn
        if(state.isValid) {
            if(singleDose < medicationSelected.doseMin) {
                // =================================Test Case 2======================================
                // Dữ liệu mẫu (singleDose: 9, frequency: 3, quantity: Any)
                state.isValid = false;
                state.message = 'Đơn liều quá thấp'
            } else if (singleDose > medicationSelected.doseMax) {
                // =================================Test Case 2======================================
                // Dữ liệu mẫu (singleDose: 101, frequency: 3, quantity: Any)
                state.isValid = false;
                state.message = 'Đơn liều quá cao'
            } else if ((singleDose * frequency * quantity ) > (medicationSelected.doseMax * medicationSelected.frequencyMax)) {
                // Dữ liệu mẫu (singleDose: 20, frequency: 4, quantity: 100)
                state.isValid = false;
                state.message = 'Liều dùng trong 1 đơn thuốc vượt quá giới hạn'
            } else {
                // Dữ liệu mẫu (singleDose: 20, frequency: 4, quantity: 2)
                state.isValid = true
                state.message = ''
            }
        }

        // Kiểm tra liều dùng trong ngày
        if(state.isValid) {
            const totalDailyFrequency = singleDose * frequency
            const totalDailyFrequencyMax = medicationSelected.doseMax * medicationSelected.frequencyMax // 400
            if(totalDailyFrequency > totalDailyFrequencyMax) {
                // =================================Test Case 3======================================
                // Dữ liệu mẫu (singleDose: 0, frequency: 4, quantity: 2)
                state.isValid = false;
                state.message = 'Liều dùng trong ngày quá cao'
            } else if (totalDailyFrequency < 1) {
                // =================================Test Case 3======================================
                state.isValid = false;
                state.message = 'Liều dùng trong ngày quá thấp'
            } else {
                state.isValid = true
                state.message = ''
            }
        }
        
        if(state.isValid) {
            handleAddMedication({
                medicationName: medicationSelected.name,
                singleDose,
                frequency,
                quantity,
                unit: medicationSelected.unit
            })
            handleShowToastSuccess({messageShowToast: 'Thêm thành công!'})
        } else {
            handleShowToastFailed({messageShowToast: state.message})
        }
    }

    const handleDeleteMedication = (medicationId) => {
        const medicationRemove = document.getElementById(medicationId)
        const medicationContainerRemove = document.getElementById(`${medicationId}-container`)
        medicationRemove.remove()
        medicationContainerRemove.remove()
    }

    const handleSubmit = () => {
        if(!doctorId) {
            handleShowToastFailed({messageShowToast: 'Vui lòng chọn bác sĩ kê đơn!'})
        } else if (!patientsPhone ) {
            handleShowToastFailed({messageShowToast: 'Vui lòng chọn bệnh nhân!'})
        } else {
            const hiddenForm = document.getElementById('hiddenForm')
            if(hiddenForm.childElementCount > 1) {  
                hiddenForm.submit()
            } else {
                handleShowToastFailed({messageShowToast: 'Thuốc trong đơn đang trống!'})
            }
        }

    }
</script>