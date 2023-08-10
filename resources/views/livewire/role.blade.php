<div id="stripedRows" class="mb-5">
    @section('title')
        المستخدمين
    @endsection
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card mt-5">
        <div class="card-body d-flex justify-content-between align-conteny-coen">
            <!-- modal-cover -->
            <h5 class="card-title">المسنخدمين</h5>
            <button type="button" class="btn btn-outline-theme me-2" wire:click='createToggle' data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true">إضافة مستخدم جديد</button>

        </div>
        <div class="card-arrow">
            <div class="card-arrow-top-left"></div>
            <div class="card-arrow-top-right"></div>
            <div class="card-arrow-bottom-left"></div>
            <div class="card-arrow-bottom-right"></div>
        </div>
        <div class="hljs-container">
            <pre><code class="xml" data-url="assets/data/ui-modal-notification/code-3.json"></code></pre>
            <div id="collapseTwo" class="accordion-collapse collapse {{$creatform?'show':''}}" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="card">
                        <div class="card-body">
                        <form class="was-validated"   method="post">
                            @csrf
                            <div class="row mb-n3">
                                <div class="col-md-12 mb-3">
                                    <label for="validationInvalidInput" class="form-label text-end">اسم المسئول</label>
                                    <input type="text" wire:model="name" class="form-control is-invalid" id="validationInvalidInput" value="" required>
                                    @error('role') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    @if($formstatus)
                                    <button type="submit" wire:click.prevent='store' class="btn btn-outline-theme btn-lg w-100">إضافة المسئول</button>
                                    @else
                                    <button type="submit" wire:click.prevent='update({{$role_id}})' class="btn btn-outline-theme btn-lg w-100">تعديل المسئول</button>
                                    @endif
                                
                                </div>
                            </div>
                        </form>
                        </div>
                        <div class="card-arrow">
                            <div class="card-arrow-top-left"></div>
                            <div class="card-arrow-top-right"></div>
                            <div class="card-arrow-bottom-left"></div>
                            <div class="card-arrow-bottom-right"></div>
                        </div>
                        <div class="hljs-container">
                            <pre><code class="xml" data-url="assets/data/form-elements/code-14.json"></code></pre>
                        </div>
                </div>
                
                </div>
            </div>                 
        </div>
    </div>
    <div id="datatable" class="mb-5">
        <div class="card">
            <!-- BEGIN Materials Table -->
            <div class="card-body">
                <table id="datatableDefault" class="table text-nowrap w-100">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <th scope="row">{{$role->id}}</th>
                            <td>{{$role->name}}</td>
                            <td>
                                <button class="btn btn-primary me-1" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" wire:click='edit({{$role->id}})'>تعديل</button>
                                <button class="btn btn-danger me-1" wire:click='delete({{$role->id}})'>Delete</button>
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            <div class="card-arrow">
                <div class="card-arrow-top-left"></div>
                <div class="card-arrow-top-right"></div>
                <div class="card-arrow-bottom-left"></div>
                <div class="card-arrow-bottom-right"></div>
            </div>
            
            <div class="hljs-container">
                <pre><code class="xml" data-url="assets/data/table-elements/code-3.json"></code></pre>
                {{$roles->links()}}
            </div>
            
        </div>
    </div>
    {{-- نافذة الحذف --}}
    <div class="modal fade " id="form"  aria-modal="true" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">هل انت متاكد نم عمليةالحذف</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-danger btn-block btn-lg" wire:click='deleteRole({{$role_id}})' data-bs-dismiss="modal">Delete</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-outline-theme btn-block btn-lg" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
