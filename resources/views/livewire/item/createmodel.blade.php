<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Colored with scrolling</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="card">
                <div class="card-body">
                <form class="was-validated"   method="post">
                    @csrf
                    <div class="row mb-n3">
                        <div class="col-md-12 mb-3">
                            <label for="validationInvalidInput" class="form-label text-end">اسم القسم</label>
                            <input type="text" wire:model="names" class="form-control is-invalid" id="validationInvalidInput" value="" required>
                            @error('names') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            @if($formstatus)
                            <button type="submit" wire:click.prevent='addCategory' class="btn btn-outline-theme btn-lg w-100">إضافة الصنف</button>
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