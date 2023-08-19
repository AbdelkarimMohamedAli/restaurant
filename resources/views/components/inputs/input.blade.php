@props(['placeholder','id','model','type','label','value'])

<div class="col-md-12 mb-3">
    <label for="{{$id}}" class="form-label text-end">{{$label}}</label>
    <input type="{{$type}}" class="form-control " id="{{$id}}" placeholder="{{$placeholder}}" value="{{$value}}" required>
    {{$slot}}
</div>

@push('scripts')
<script>
 $('#{{$id}}').on('change',function(e) {
        var data = $('#{{$id}}').val();
        @this.set('{{$model}}',data)
 });
</script>
@endpush