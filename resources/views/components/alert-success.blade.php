@if(session('status'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <div class="d-flex">
            <div>
                @if($slot->isNotEmpty())
                    {{ $slot }}
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon icon-tabler-circle-filled"
                         width="24"
                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"
                              stroke-width="0" fill="currentColor"></path>
                    </svg>
                @endif
            </div>
            <div>
                <h4 class="alert-title">{{ session('status') }}</h4>
            </div>
        </div>
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
@endif
