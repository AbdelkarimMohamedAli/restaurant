<div id="stripedRows" class="mb-5">
    @section('title')
    الطاولات
    @endsection
    @if (session()->has('message'))
        <div class="alert alert-primary ">
            {{ session('message') }}
        </div>
    @endif
    <div class="card mt-5">
        <div class="card-body d-flex justify-content-between align-conteny-coen">
            <!-- modal-cover -->
            <h5 class="card-title">الطاولات</h5>
            <button type="button" class="btn btn-outline-theme me-2" wire:click='createToggle' data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true">إضافة خامه جديده</button>

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
                                <x-inputs.input label="اسم الطاوله" id="inv1" model='names' placeholder="please Enter" type="text" value="{{$names}}">
                                    @error('names') <span class="error text-danger">{{ $message }}</span> @enderror
                                </x-inputs.input>
                                
                                <x-inputs.input label="عدد الكراسي" id="inv2" model='chairs' placeholder="please Enter" type="text" value="{{$chairs}}">
                                    @error('chairs') <span class="error text-danger">{{ $message }}</span> @enderror
                                </x-inputs.input>
                                
                                {{-- <x-inputs.select label="حالة الطاوله" id="inv3" model='status' placeholder="choose .." value="{{$status}}">
                                    <option  value="0"  disabled >Choose...</option>
                                    <option value="1" >Not Active</option>
                                    <option value="2" >Active</option>
                                </x-inputs.select> --}}
                                <div class="col-md-12 mb-3">
                                    <label for="dd1" class="form-label">حالة الطاوله</label>
                                    <select class="form-select is-invalid" id="dd1" wire:model='status' required>
                                        <option   selected disabled >Choose...</option>
                                        <option value="0" >Not Active</option>
                                        <option value="1" >Active</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    @if($formstatus)
                                    <button type="button" wire:click.prevent='addTable' class="btn btn-outline-theme btn-lg w-100">إضافة الخامه</button>
                                    @else
                                    <button type="button" wire:click.prevent='updateTable({{$table_id}})' class="btn btn-outline-theme btn-lg w-100">تعديل الخامه</button>
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
                            <th scope="col">اسم الطاوله</th>
                            <th scope="col">عدد الكراسي</th>
                            <th scope="col">الحاله</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach ($tables as $table)
                        <tr>
                            <th scope="row">{{$table->id}}</th>
                            <td>{{$table->name}}</td>
                            <td>{{$table->chairs}}</td>
                            <td>{{$table->status?"Acive":"Not Active"}}</td>
                            <td>
                                <button class="btn btn-primary me-1" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" wire:click='select({{$table->id}})'>تعديل</button>
                                <button class="btn btn-danger me-1" wire:click='select2({{$table->id}})'>Delete</button>
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
                {{$tables->links()}}
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
                            <button type="button" class="btn btn-danger btn-block btn-lg" wire:click='deleteTable({{$table_id}})' data-bs-dismiss="modal">Delete</button>
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
