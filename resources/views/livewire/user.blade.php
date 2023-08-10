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
                                    <label for="validationInvalidInput" class="form-label text-end">اسم المستخدم</label>
                                    <input type="text" wire:model="names" class="form-control is-invalid" id="validationInvalidInput" value="" required>
                                    @error('names') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationInvalidInput" class="form-label text-end">البريد الالكتروني</label>
                                    <input type="email" wire:model="email" class="form-control is-invalid" id="validationInvalidInput" value="" required>
                                    @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationInvalidInput" class="form-label text-end"> الباسورد</label>
                                    <input type="password" wire:model="password" class="form-control is-invalid" id="validationInvalidInput" value="" required>
                                    @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationInvalidInput" class="form-label text-end"> الصورة</label>
                                    <!-- <input type="password" wire:model="password" class="form-control is-invalid" id="validationInvalidInput" value="" required> -->
                                    <input type="file" wire:model="image"  class="custom-file" required>
                                    @if($image)
                                    <img src="{{ asset('storage/'.$image) }}" width="50" height="50">
                                    @endif
                                    @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    @if($formstatus)
                                    <button type="submit" wire:click.prevent='store' class="btn btn-outline-theme btn-lg w-100">إضافة مستخدم</button>
                                    @else
                                    <button type="submit" wire:click.prevent='update({{$user_id}})' class="btn btn-outline-theme btn-lg w-100">تعديل المستخدم</button>
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


        <!--  Start view Roles -->

            <div class="hljs-container">
                <pre><code class="xml" data-url="assets/data/ui-modal-notification/code-3.json"></code></pre>
                <div id="collapseTwo" class="accordion-collapse collapse {{$RoleForm?'show':''}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                            <div>User Name : {{$user_name}}</div>
                            <div>USer Email : {{$user_email}}</div>
                            @if(!empty($user_roles))

                            <div class="mt-6 p-2">
                                <h2 class="text-2xl font-semibold">Roles</h2>
                                <div class="mt-4 p-2">
                                    <ul id="tag-size" class="tagit form-control ui-widget ui-widget-content ui-corner-all">
                                        @foreach($user_roles as $id => $name)                                                            
                                            <li class="tagit-choice ui-widget-content ui-state-default ui-corner-all tagit-choice-editable">
                                                <span class="tagit-label">{{$name}}</span>
                                                <a class="tagit-close" wire:click='removeRole({{$id}})'>
                                                    <span class="text-icon">×</span>
                                                    <span class="ui-icon ui-icon-close"></span>
                                                </a>
                                            </li>
                                           
                                        @endforeach
                                    </ul>
                                   
                                </div>
                            </div>
                            @endif
                            <hr>
                            <div class="col-md-12 mb-3 mt-3">
                                <form class="was-validated"   method="post">
                                    @csrf
                                    <label for="validationSelectInvalid" class="form-label">اخترالدور</label>
                                    <select class="form-select is-invalid" id="validationSelectInvalid" wire:model="role_id" required>
                                        <option selected  value="">Choose...</option>
                                        @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>    
                                        @endforeach
                                    </select>
                                    @error('role_id') <span class="error text-danger">{{ $message }}</span> @enderror
                                    
                                    <div class="col-md-12 mb-3 mt-3">
                                    <button type="submit" wire:click.prevent='assignRole({{$user_id}})' class="btn btn-outline-theme btn-lg w-100">إضافة دور</button>
                                </div>
                                </form>
                            </div>
                            <hr>
                            @if(!empty($user_permissions))
    
                            <div class="mt-6 p-2">
                                <h2 class="text-2xl font-semibold">Permissions</h2>
                                <div class="mt-4 p-2">
                                    <ul id="tag-size" class="tagit form-control ui-widget ui-widget-content ui-corner-all">
                                        @foreach($user_permissions as $id => $name)                                                            
                                            <li class="tagit-choice ui-widget-content ui-state-default ui-corner-all tagit-choice-editable">
                                                <span class="tagit-label">{{$name}}</span>
                                                <a class="tagit-close" wire:click='removePermission({{$id}})'>
                                                    <span class="text-icon">×</span>
                                                    <span class="ui-icon ui-icon-close"></span>
                                                </a>
                                            </li>
                                           
                                        @endforeach
                                    </ul>
                                   
                                </div>
                            </div>
                            @endif

                            <hr>
                            <div class="col-md-12 mb-3 mt-3">
                                <form class="was-validated"   method="post">
                                    @csrf
                                    <label for="validationSelectInvalid" class="form-label">اختر الصلاحية</label>
                                    <select class="form-select is-invalid" id="validationSelectInvalid" wire:model="permission_id" required>
                                        <option selected  value="">Choose...</option>
                                        @foreach ($permissions as $permission)
                                        <option value="{{$permission->id}}">{{$permission->name}}</option>    
                                        @endforeach
                                    </select>
                                    @error('permission_id') <span class="error text-danger">{{ $message }}</span> @enderror
                                    
                                    <div class="col-md-12 mb-3 mt-3">
                                    <button type="submit" wire:click.prevent='givePermission({{$user_id}})' class="btn btn-outline-theme btn-lg w-100">إضافة صلاحية</button>
                                </div>
                                </form>
                            </div>

                            <form class="was-validated"   method="post">
                                @csrf
                                
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

        <!--  End view permissions -->



    </div>
    <div id="datatable" class="mb-5">
        <div class="card">
            <!-- BEGIN Materials Table -->
            <div class="card-body">
                <table id="datatableDefault" class="table text-nowrap w-100">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>Image</th>
                            <th scope="col">اسم السمتخدم</th>
                            <th scope="col">الايميل</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td><img src="{{ asset('storage/'.$user->image) }}" alt="{{ $user->title }}" width="100"></td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <button class="btn btn-primary me-1" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" wire:click='edit({{$user->id}})'>تعديل</button>
                                <button class="btn btn-danger me-1" wire:click='delete({{$user->id}})'>Delete</button>
                                @role('admin')<button class="btn btn-danger me-1" wire:click='show({{$user->id}})'>Role</button>@endrole
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
                {{$users->links()}}
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
                            <button type="button" class="btn btn-danger btn-block btn-lg" wire:click='deleteUser({{$user_id}})' data-bs-dismiss="modal">Delete</button>
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
