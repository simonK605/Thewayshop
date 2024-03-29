<div class="admin__section_content">
    <form class="admin__form" action="{{ route('headerCategory.store') }}" method="POST">
        @csrf
        <div class="form__flex">
            <input class="admin__inp admin__inp_header form-control" type="text" name="nameEn" placeholder="Name En">
        </div>
        <div class="form__flex">
            <input class="admin__inp admin__inp_header form-control" type="text" name="nameRu" placeholder="NameRu">
        </div>
        <div class="form__flex">
            <span>Parent Id</span>
            <select name="parentId" class="admin__select">
                <option value="">no</option>
                @foreach ($headerData as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button class="btn custom-btn admin__form_btn" name="submit">Add Header Category</button>
        </div>
    </form>
</div>
