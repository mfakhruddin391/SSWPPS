<div>
    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->
    @if(Session::has('success'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Success!</strong> {{Session::get('success')}}
            </div>
            @endif
</div>