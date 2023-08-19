<div>
    @section('title')
        الاصناف
    @endsection
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-error">
            {{ session('error') }}
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
    <div class="offcanvas offcanvas-end {{$toggleModel}}"  data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel" style="width:750px; max-width:750px">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title float-end" id="offcanvasScrollingLabel">إضافة صنف جديد</h5>
            <button type="button" class="btn-close text-reset" wire:click='closeform' data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="card">
                <div class="card-body">
                <form class="was-validated"   method="post">
                    @csrf
                    <div class="row mb-n3">
                        <div class="col-md-6 mb-3">
                            <label for="validationInvalidInput" class="form-label float-end">اسم الصنف</label>
                            <input type="text" wire:model="names" class="form-control is-invalid" id="validationInvalidInput" value="" required>
                            @error('names') <span class="error text-danger float-end">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationInvalidInput" class="form-label float-end">الوصف</label>
                            <input type="text" wire:model="discreption" class="form-control is-invalid" id="validationInvalidInput" value="" required>
                            @error('discreption') <span class="error text-danger float-end">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationInvalidInput" class="form-label float-end">السعر</label>
                            <input type="text" wire:model="price" class="form-control is-invalid" id="validationInvalidInput" value="" required>
                            @error('price') <span class="error text-danger float-end">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationSelectInvalid" class="form-label">اختر القسم</label>
                            <select class="form-select is-invalid" id="validationSelectInvalid" wire:model="category" required>
                                <option selected disabled value="0">Choose...</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>    
                                @endforeach
                            </select>
                            @error('category') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationInvalidInput" class="form-label float-end">الخصم</label>
                            <input type="text" wire:model="discount" class="form-control is-invalid" id="validationInvalidInput" value="" required>
                            @error('discount') <span class="error text-danger float-end">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationInvalidInput" class="form-label float-end">نوع الخصم</label>
                            <input type="text" wire:model="discountType" class="form-control is-invalid" id="validationInvalidInput" value="" required>
                            @error('discountType') <span class="error text-danger float-end">{{ $message }}</span> @enderror
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
                    <pre><code class="xml" data-url="assets/data/table-elements/code-3.json"></code></pre>
                    <div class="card-header d-flex align-items-center justify-content-between  ">
                        Variant
                        
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="col-12 mt-3">
                            <ul id="tag-size" class="tagit form-control ui-widget ui-widget-content ui-corner-all">
                                @if(is_array($variants))
                                @foreach ($variants as $key=>$options)
                                    <li class="tagit-choice ui-widget-content ui-state-default ui-corner-all tagit-choice-editable"><span class="tagit-label">{{$options['name']}}</span>
                                        <a class="tagit-close" wire:click='removeVarint({{$key}})'><span class="text-icon">×</span><span class="ui-icon ui-icon-close"></span></a>
                                    </li> 
                                @endforeach
                                @endif
                                <li class="tagit-new w-100">
                                    <input type="text" class="ui-widget-content ui-autocomplete-input" wire:model='variant' wire:keydown.enter='addVariants'>
                                </li>
                            </ul> 
                        </div>
                        <div>
                            @if(is_array($variants))
                            @foreach ($variants as $key=>$options)
                            <div class="row my-3">
                                <div class="col-4"><input type="text" class="form-control" value="{{$options['name']}}" placeholder="please Enter Varinat" readonly></div>
                                <div class="col-8 row">
                                    <div class="col-5"><input type="text" class="form-control" wire:model='option' placeholder="please Enter Option"></div>
                                    <div class="col-5"><input type="text" class="form-control" wire:model='optionPrice' placeholder="please Enter Price"></div>
                                    <div class="col-2">
                                        <a href="#" class="btn btn-outline-theme d-block" wire:click='addoptions({{$key}})'>
                                            <i class="fas fa-lg fa-fw me-2 fa-plus" ></i></a>
                                    </div>
                                    @foreach ($options['array'] as $key2=>$itams)
                                    <div class="col-5">{{$itams['name']}}</div>
                                    <div class="col-4">{{$itams['price']}}</div>
                                    <div class="col-1">
                                        <a class="text-white pointer" wire:click='stillshow({{$key}},{{$key2}})'>
                                         <i class="bi bi-grid-3x3-gap nav-icon"></i>
                                        </a>
                                    </div>
                                    <div class="col-2">
                                        <a href="#" class="btn  d-block" wire:click='removeoptions({{$key}},{{$key2}})'>
                                        <i class="far fa-lg fa-fw me-2 fa-window-close" ></i></a>
                                    </div>

                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="card-header d-flex align-items-center ">
                        الاضافات
                    </div>
                    
                    <div class="row mb-3 gx-3">
                        <div class="col-12">
                            <ul id="tag-size" class="tagit form-control ui-widget ui-widget-content ui-corner-all">
                                
                                @foreach ($addons_s as $key=>$addon)
                                    <li class="tagit-choice ui-widget-content ui-state-default ui-corner-all tagit-choice-editable"><span class="tagit-label">{{$addon['name']}}</span>
                                        <a class="tagit-close" wire:click='removeAddons({{$key}})'><span class="text-icon">×</span><span class="ui-icon ui-icon-close"></span></a>
                                    </li> 
                                @endforeach
                               
                                <li class="tagit-new w-100">
                                    <input type="text" class="ui-widget-content ui-autocomplete-input" wire:model='search' wire:click='addonSelectO'>
                                </li>
                            </ul>
                            <div class="z-100 w-100 addon-select-{{$addonselect?'o':'c'}}">
                                <div class="card bg-gray-900 w-100">
                                    <div class="card-header fw-bold small">
                                        <button class="btn btn-outline-theme float-end " wire:click='addonSelectC'>close</button>
                                    </div>
                                    <div class="card-body" style="max-height: 300px; overflow:auto">
                                        <div class="list-group">
                                        @foreach ($addons as $addon)
                                            <a href="#" class="list-group-item list-group-item-action" wire:click='addAdons({{$addon['id']}})'>
                                                {{$addon['name']}}
                                            </a>
                                        @endforeach
                                        </div>
                                    </div>
                                    <div class="card-arrow">
                                        <div class="card-arrow-top-left"></div>
                                        <div class="card-arrow-top-right"></div>
                                        <div class="card-arrow-bottom-left"></div>
                                        <div class="card-arrow-bottom-right"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-header d-flex align-items-center ">
                        الخامات
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="col-12">
                            <ul id="tag-size" class="tagit form-control ui-widget ui-widget-content ui-corner-all">
                                @if(is_array($matrial_s))
                                @foreach ($matrial_s as $key=>$matrial)
                                    <li class="tagit-choice ui-widget-content ui-state-default ui-corner-all tagit-choice-editable"><span class="tagit-label">{{$matrial['name']}}</span>
                                        <a class="tagit-close" wire:click='removeMatrial({{$key}})'><span class="text-icon">×</span><span class="ui-icon ui-icon-close"></span></a>
                                    </li> 
                                @endforeach
                                @endif
                                <li class="tagit-new w-100">
                                    <input type="text" class="ui-widget-content ui-autocomplete-input" wire:model='Msearch' wire:click='matrialSelectO'>
                                </li>
                            </ul>
                            <div class="z-100 w-100 addon-select-{{$matrialSelect?'o':'c'}}">
                                <div class="card bg-gray-900 w-100 " >
                                    <div class="card-header fw-bold small">
                                        <button class="btn btn-outline-theme float-end " wire:click='matrialSelectC'>close</button>
                                    </div>
                                    <div class="card-body" style="max-height: 300px; overflow:auto">
                                        <div class="list-group">
                                        @foreach ($matrials as $matrial)
                                            <a href="#" class="list-group-item list-group-item-action" wire:click='addMatrial({{$matrial['id']}})'>
                                                {{$matrial['name']}}
                                            </a>
                                        @endforeach
                                        </div>
                                    </div>
                                    <div class="card-arrow">
                                        <div class="card-arrow-top-left"></div>
                                        <div class="card-arrow-top-right"></div>
                                        <div class="card-arrow-bottom-left"></div>
                                        <div class="card-arrow-bottom-right"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hljs-container">
                    <pre><code class="xml" data-url="assets/data/table-elements/code-3.json"></code></pre>
                    <div class=" mb-3 d-flex align-items-center justify-content-between">
                        <div>
                        <input type="file" wire:model="image" class="form-control " wire:change='stauts'>
                        </div>
                        <div>
                            @if ($image)
                                @if ($isImage)
                                    <img src="{{$image->temporaryUrl()}}" alt="" style="width:150px; height:150px" />
                                @else
                                    <img src="uploads/image_uploads/{{$image}}" alt="" width="100" height="100" />
                                @endif
                             
                            @endif
                        </div>
                    </div>
                    
                </div>
                <div class="hljs-container">
                    <pre><code class="xml" data-url="assets/data/table-elements/code-3.json"></code></pre>
                    <div class="col-md-12 mb-3">
                        @if($formstatus)
                        <button type="submit" wire:click.prevent='addItems' class="btn btn-outline-theme btn-lg w-100 ">إضافة الصنف</button>
                        @else
                        <button type="submit" wire:click.prevent='updateItem({{$item_id}})' class="btn btn-outline-theme btn-lg w-100">تعديل الصنف</button>
                        @endif
                    </div>
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
                        <th scope="col">الصورة</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $key=>$item)
                    <tr>
                        <td scope="col">{{$key+1}}</td>
                        <td scope="col">{{$item->name}}</td>
                        <td scope="col">{{$item->category->name}}</td>
                        <td scope="col">{{$item->price}}</td>
                        <td scope="col">{{$item->discount}}</td>
                        <td scope="col">{{$item->discount_type}}</td>
                        <td>
                            <img src="/uploads/image_uploads/{{$item->img}}" alt="{{$item->name}}" width="100"
                            height="100"/>                        
                        </td>
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
                            <button type="button" class="btn btn-danger btn-block btn-lg" wire:click='deleteItem({{$item_id}})' data-bs-dismiss="modal">Delete</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-outline-theme btn-block btn-lg" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    {{-- نافذة اضافة الخامات option --}}
   
    <div class="offcanvas offcanvas-start {{$matrials_form}}" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="form2" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasScrollingLabel">تحديد الخامة {{empty($variants)?'':$variants[$variant_id]['name']}}=>{{empty($variants[$variant_id]['array'])?'':$variants[$variant_id]['array'][$option_id]['name']}}</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" wire:click="close_opm"></button>
        </div>
        <div class="offcanvas-body">
            <div class="row" >
                <div class="col-6" wire:ignore>
                    <x-inputs.select2 model='opm_id' id='slecting' placeholder="اختر الخامه">
                        <option value="0" >اختر الخامه</option>
                        @foreach ($matrials as $matrial)
                        <option value="{{$matrial['id']}}">{{$matrial['name']}}</option>
                        @endforeach
                    </x-inputs.select2>
                </div>
                <div class="col-6">
                    <input type="text"wire:model='opm_qty' class="form-control" wire:keydown.enter='addOPM' placeholder="choose">
                </div>
                <div class="col-6" >
                    <div id="collapseTwos" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="" >
                        <div class="accordion-body">
                            <div class="list-group" >
                                @foreach ($matrials as $matrial)
                                    <a href="#" class="list-group-item list-group-item-action" wire:click='addoptionMatrial({{$matrial['id']}})'>
                                        {{$matrial['name']}}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
            <h1>matrial</h1>
            <div class="row">
                @if ($option_matrials)    
                    @foreach ($option_matrials as $key=>$opm)
                        <div class="col-4">{{$opm['name']}}</div>
                        <div class="col-3">{{$opm['unit']}}</div>
                        <div class="col-3">{{$opm['qty']}}</div>
                        <div class="col-2" style="cursor: pointer" wire:click='deleteOPM({{$key}})'>x</div>
                    @endforeach
                @endif
                <div class="col-12 my-3">
                    <button class="btn btn-outline-theme w-100" wire:click='saveOPM()'>حفظ الخامات</button>
                </div>
            </div>

            </div>
            
        </div>
    </div>
    <script>
        window.addEventListener('canc-offcanvas',event=>{
		    $(event.detail.modalId).offcanvas(event.detail.actionModal);
	    });
        
        
    </script>
</div>