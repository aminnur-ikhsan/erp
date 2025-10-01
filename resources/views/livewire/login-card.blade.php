<div class="container">
    <div class="row vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center my-3">Halo Admin</h2>

                    <form wire:submit="submit">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Username" wire:model="loginUsername">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Password" wire:model="loginPassword">
                        </div>
                        <button type="submit" class="btn btn-primary shadow-sm w-100 mt-4">Submit</button>
                    </form>

                    {{-- ERROR --}}
                    @if ($errors->any())
                        <div class="my-3 alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close btn-xs" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- ERROR END --}}
                </div>
            </div>
        </div>
    </div>
</div>

