<div>
    @section('title')
        الاصناف
    @endsection
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card mt-5">
        <div class="card-body d-flex justify-content-between align-conteny-coen">
            <!-- modal-cover -->
            <h5 class="card-title">الاصناف</h5>
            <button type="button" class="btn btn-outline-theme " data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" wire:click='createform' aria-controls="offcanvasScrolling">إضافة صنف جديد</button>

        </div>
        <div class="card-arrow">
            <div class="card-arrow-top-left"></div>
            <div class="card-arrow-top-right"></div>
            <div class="card-arrow-bottom-left"></div>
            <div class="card-arrow-bottom-right"></div>
        </div>
        
    </div>
    <div class="offcanvas offcanvas-end {{$toggleModel}}"  data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel" style="min-width:450px">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Colored with scrolling</h5>
            <button type="button" class="btn-close text-reset" wire:click='closeform' data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="card">
                <div class="card-body">
                <form class="was-validated"   method="post">
                    @csrf
                    <div class="row mb-n3">
                        <div class="col-md-12 mb-3">
                            <label for="validationInvalidInput" class="form-label float-end">اسم الصنف</label>
                            <input type="text" wire:model="names" class="form-control is-invalid" id="validationInvalidInput" value="" required>
                            @error('names') <span class="error text-danger float-end">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationInvalidInput" class="form-label float-end">الوصف</label>
                            <input type="text" wire:model="discreption" class="form-control is-invalid" id="validationInvalidInput" value="" required>
                            @error('discreption') <span class="error text-danger float-end">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationInvalidInput" class="form-label float-end">السعر</label>
                            <input type="text" wire:model="" class="form-control is-invalid" id="validationInvalidInput" value="" required>
                            @error('discreption') <span class="error text-danger float-end">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            @if($formstatus)
                            <button type="submit" wire:click.prevent='addItem' class="btn btn-outline-theme btn-lg w-100">إضافة الصنف</button>
                            @else
                            <button type="submit" wire:click.prevent='updateCategory()' class="btn btn-outline-theme btn-lg w-100">تعديل الصنف</button>
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
    {{-- item table --}}
    <div class="card">
        <div class="card-body">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اسم الصنف</th>
                        <th scope="col">القسم</th>
                        <th scope="col">السعر</th>
                        <th scope="col">الخصم</th>
                        <th scope="col">طبيعة الخصم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td scope="col">{{$item->id}}</td>
                        <td scope="col">{{$item->name}}</td>
                        <td scope="col">{{$item->category->name}}</td>
                        <td scope="col">{{$item->price}}</td>
                        <td scope="col">{{$item->discount}}</td>
                        <td scope="col">{{$item->discount_type}}</td>
                        
                        <td>
                            <button class="btn btn-primary me-1" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" wire:click='select({{$item->id}})'>تعديل</button>
                            <button class="btn btn-danger me-1" wire:click='select2({{$item->id}})'>Delete</button>
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
            {{$items->links()}}
        </div>
    </div>
</div>
