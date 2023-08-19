@props(['placeholder','id','model','label','value'])
<div class="col-md-12 mb-3">
    <label for="{{$id}}" class="form-label">{{$label}}</label>
    <select class="form-select is-invalid" id="{{$id}}" vlaue="{{$value}}"  placeholder="{{$placeholder}}" required>
        {{$slot}}
    </select>
    
</div>
@push('scripts')
<script>

    $(document).ready(function() {
        $('#{{$id}}').on('change',function(e){
            var data = $('#{{$id}}').("val");
            @this.set('{{$model}}',data);
        });
    });
</script>
@endpush