<div class="table-responsive-sm">
    <table class="table table-striped" id="users-table">
        <thead>
        <th>Nazwa</th>
        <th>Kategoria</th>
        <th>Stan Magazynu</th>
        <th>Aktywny</th>
        <th colspan="3">Akcje</th>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }} </td>
                <td>{{ $product->category->name ?? ' - ' }}  </td>
                <td>{{ number_format($product->stock, 2) }}  </td>
                <td>{!! App\Helpers\Helper::renderAnswer($product->is_active) !!}</td>
                <td>
                    <div class='btn-group'>
                        <a href="{{ route('products.edit', [$product->id]) }}" class='btn btn-sm btn-default mr-1'>
                            <i class="fas fa-pen"></i>
                        </a>

{{--                        @if ( Auth::user()->hasRole(['Admin','Super Admin']) )--}}
                            <button type="button" data-destroy-url="{{ route('products.destroy', [$product->id]) }}" class="btn btn-sm text-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-whatever="{{$product->name}}">
                                <i class="fas fa-trash"></i>
                            </button>
{{--                        @endif--}}
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $products->appends(['filters' => $filters])->links('common-components/pagination') }}

</div>
@include('common-components.delete-popup', ['name' => 'Produkt'])
