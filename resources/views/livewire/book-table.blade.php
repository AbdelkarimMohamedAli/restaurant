<div id="stripedRows" class="mb-5">
    @section('title')
    حجز الطاولات
    @endsection
    @if (session()->has('message'))
        <div class="alert alert-primary ">
            {{ session('message') }}
        </div>
    @endif
    <div id="datatable" class="mb-5">
        <div class="card">
            <!-- BEGIN Materials Table -->
            <div class="card-body">
                <h1 class="text-end">حجز الطاولات</h1>
            </div>
            <div class="hljs-container">
                <pre><code class="xml" data-url="assets/data/table-elements/code-3.json"></code></pre>
                <div class="row gx-4">
                    
                    @foreach ($tables as $table)
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 pointer" wire:click='opnBTabel({{$table->id}})'>
                            <div   class="pos-table-booking card">
                                <div class="card-body p-1">
                                    <div class="pos-table-booking-container p-3">
                                        <div class="pos-table-booking-header">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-1">
                                                    <div class="title"><h4>{{$table->name}}</h4></div>
                                                    <div class="no">عدد الكراسي ({{$table->chairs}})</div>
                                                
                                                </div>
                                                @if ($table->status)
                                                <div class="pe-1 text-success">
                                                    <i class="bi bi-check2-circle fa-3x"></i>
                                                </div>
                                                @else
                                                <div class="text-white text-opacity-25">
                                                    <i class="bi bi-dash-circle fa-3x"></i>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
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
                    @endforeach
                </div>
            </div>
            <div class="card-arrow">
                <div class="card-arrow-top-left"></div>
                <div class="card-arrow-top-right"></div>
                <div class="card-arrow-bottom-left"></div>
                <div class="card-arrow-bottom-right"></div>
            </div>
            <div class="hljs-container">
                <pre><code class="xml" data-url="assets/data/table-elements/code-3.json"></code></pre>
                
            </div>
        </div>
    </div>
    {{-- نافذة اضافة الخامات option --}}
   
    <div class="offcanvas offcanvas-end {{$bookTable_form}}" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="form2" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasScrollingLabel">حجوزات الطوله رقم   </h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" wire:click="close_opm"></button>
        </div>
        <div class="offcanvas-body">
            <div class="row">
                <div class="col-6">
                    <x-inputs.input type='date' label='تاريخ الحجز' id='date1' model='date' value='{{$date}}' 
                    placeholder="من فضلك اختر التاريخ"></x-inputs.input>
                </div>
                <div class="col-6">
                    <x-inputs.input type='time' label='بداية الحجز' id='date2' model='time' value='{{$time}}' 
                    placeholder="من فضلك اختر الوقت"></x-inputs.input>
                </div>
                <div class="col-6">
                    <x-inputs.input type='text' label='اسم صاحب الحجز' id='date3' model='customer' value='{{$customer}}' 
                    placeholder="اضفم اسم العميل "></x-inputs.input>
                </div>
                <div class="col-6">
                    <x-inputs.input type='time' label='نهاية الحجز' id='date2' model='time' value='{{$time}}' 
                    placeholder="من فضلك اختر الوقت"></x-inputs.input>
                </div>
                
                <div class="col-12">
                    <button class="btn btn-outline-theme w-100 mt-1">
                        ADD
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
