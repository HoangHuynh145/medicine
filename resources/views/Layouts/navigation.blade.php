<div class="container mx-auto px-1">
    <div class="h-20">
        <ul class="flex gap-4 h-full w-full items-center my-auto">
            <li class="mr-14">
                <a href="/">
                    <img src="{{ asset('assets/imgs/Logo.svg') }}" class="mx-auto" />
                </a>
            </li>
            <li>
                <a href="/" class="@if(Route::is('homePage')) text-[#24bee0] @endif">
                    Home
                </a>
            </li>
            <li>
                <a href="/prescriptions/create" class="@if(Route::is('prescriptions.create')) text-[#24bee0] @endif">
                    Presscription
                </a>
            </li>
            <li>
                <a href="/patients" class="@if(Route::is('patients.index')) text-[#24bee0] @endif">
                    Create Patient
                </a>
            </li>
            <li>
                <a href="/doctors" class="@if(Route::is('doctors.index')) text-[#24bee0] @endif">
                    Create Doctor
                </a>
            </li>
            <li>
                <a href="/medications" class="@if(Route::is('medications.index')) text-[#24bee0] @endif">
                    Create Medication
                </a>
            </li>
        </ul>
    </div>
</div>