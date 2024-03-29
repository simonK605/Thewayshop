<div class="admin__section_content">
    <form class="admin__form" action="{{ route('headerCategory.update', ['headerCategory' => $item->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form__flex">
            <input class="admin__inp admin__inp_header form-control" type="text" value='{{ $nameEn }}' name="nameEn" placeholder="Name En">
        </div>
        <div class="form__flex">
            <input class="admin__inp admin__inp_header form-control" type="text" value='{{ $nameRu }}' name="nameRu" placeholder="Name Ru">
        </div>
        <div class="form__flex">
            <span>Parent Id</span>
            <select name="parentId" class="admin__select">
                <option value="">no</option>
                @foreach ($headerData as $item)
                    @if ($item->id == $parentId)
                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form__flex">
            <input class="admin__inp admin__inp_header form-control" type="hidden" value='{{ $id }}' name="id">
        </div>
        <div>
            <button class="btn custom-btn admin__form_btn" name="submit">Update Header Category</button>
        </div>
    </form>
</div>

{{-- errors --}}
@if ($errors->any())
    @foreach ($errors->all() as $e)
        <p class="error">{{ $e }}</p>
    @endforeach
@endif