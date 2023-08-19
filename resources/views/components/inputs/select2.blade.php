@props(['placeholder'=> 'select option','id','model'])

<select  id="{{$id}}" name="state" data-placeholder="{{$placeholder}}" style="width: 100%">
    {{$slot}}
</select>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#{{$id}}').select2().on('change',function(e){
            var data = $('#{{$id}}').select2("val");
            @this.set('{{$model}}',data)
        });
    });
</script>
@endpush




