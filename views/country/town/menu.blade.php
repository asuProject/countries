

<li class="has-submenu"><a href="#" id="current"><span>{{__('cities')}}</span></a>
    <ul class="left-submenu">
        <li class="back"><a href="#">{{__('Back')}}</a></li>

        {{--@can('options_add')--}}
        <li><a href="{{route('country.town.create')}}" id="current"> <span>{{__('Add city')}}</span></a></li>
        {{--@endcan--}}

{{--        @can('options_view')--}}
        <li><a href="{{route('country.town.index')}}" id="current"> <span>{{__('View cities)}}</span></a></li>
        {{--@endcan--}}

    </ul>
</li>

