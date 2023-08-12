@props(['placeholder'=> 'select option'])
<select class="js-example-theme-single" name="state" data-placeholder="{{$placeholder}}" style="width: 100%">
    {{$slot}}
</select>
  
