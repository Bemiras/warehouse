<div class="table-responsive-sm">
    <table class="table table-striped" id="users-table">
        <thead>
        <th>{{__('Category Name')}}</th>
        <th>{{__('Superior Category')}}</th>
        <th>{{__('Is Active')}}</th>
        <th colspan="3">{{__('Action')}}</th>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }} </td>
                <td>{{ $category->category->name ?? ' - ' }}  </td>
                <td>{!! App\Helpers\Helper::renderAnswer($category->is_active) !!}</td>
                <td>
                    <div class='btn-group'>
                        <a href="{{ route('categories.edit', [$category->id]) }}" class='btn btn-sm btn-default mr-1'>
                            <i class="fas fa-pen"></i>
                        </a>

{{--                        @if ( Auth::user()->hasRole(['Admin','Super Admin']) )--}}
                            <button type="button" data-destroy-url="{{ route('categories.destroy', [$category->id]) }}" class="btn btn-sm text-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-whatever="{{$category->name}}">
                                <i class="fas fa-trash"></i>
                            </button>
{{--                        @endif--}}
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $categories->appends(['filters' => $filters])->links('common-components/pagination') }}

</div>
{{--@include('common-components.delete-popup', ['name' => __('Category')])--}}

@include('common-components.delete-popup')
