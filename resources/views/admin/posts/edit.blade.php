@extends('admin.layout')

@push('plugincss')
<link href="/sheruadmin/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
<link href="/sheruadmin/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
<link href="/sheruadmin/libs/summernote/summernote-bs4.css" rel="stylesheet" />
@endpush

@section('header')
    <nav aria-label="breadcrumb" class="float-right mt-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio <i data-feather="home" class="icon-xs"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts <i data-feather="eye" class="icon-xs"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear <i data-feather="edit-2" class="icon-xs"></i></li>
        </ol>
    </nav>
    <h4 class="mb-1 mt-0">Posts</h4>
@endsection

@section('content')
<form method="POST" action="{{ route('admin.posts.update', $post) }}" class="needs-validation" novalidate>
	@csrf()
	@method('PUT')

	<div class="row">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-body">
					<h4 class="mb-3 header-title mt-0">Crear publicación</h4>
					<div class="form-group">
                        <label for="tituloPublic">Título de la publicación</label>
                        <input name="title"
                        type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        id="tituloPublic"
                        aria-describedby="titleHelp"
                        placeholder="ingrese el título de la publicación"
                        value="{{ old('title', $post->title) }}">
                        @error('title') <div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="contenidoPublic">Contenido de la publicación</label>
                        <textarea name="body"
                        rows="10"
                        class="form-control @error('body') is-invalid @enderror"
                        id="contenidoPublic"
                        placeholder="ingrese el contenido completo de la publicación">{{ old('body', $post->body) }}</textarea>
                        @error('body') <div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="form-group">
		                <label for="extractoPublic">Extracto de la publicación</label>
		                <textarea name="excerpt"
		                class="form-control @error('excerpt') is-invalid @enderror"
		                id="extractoPublic"
		                placeholder="ingrese un pequeño extracto de la publicación">{{ old('excerpt', $post->excerpt) }}</textarea>
		                @error('excerpt') <div class="invalid-feedback"> {{ $message }}</div>@enderror
		            </div>
		            <div class="form-group">
                        <label>Fecha de publicación</label>
                        <input name="published_at"
                        type="text"
                        id="basic-datepicker"
                        class="form-control"
                        value="{{ old('published_at', $post->published_at) }}">
                    </div>
                    <div class="form-group">
                        <label>Categoarías</label>
                        <select name="category"
                        class="form-control @error('category') is-invalid @enderror">
                        	<option value="">-- Seleccione --</option>
                        	@foreach($categories as $category)
                        	<option value="{{ $category->id }}"
                        		{{ old('category', $post->category_id) == $category->id ? 'selected' : ''}}>
                        		{{ $category->name }}</option>
                        	@endforeach
                        </select>
                        @error('category') <div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Tags</label>
                        <select name="tags[]"
                        class="form-control wide select2 @error('tags') is-invalid @enderror"
                        multiple
                        data-placeholder="Seleccione etiquetas">
                            @foreach($tags as $tag)
                            <option value="{{ $tag->id }}"
                            	{{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags') <div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                    	<button type="submit" class="btn btn-info btn-block">Guardar publicación</button>
                    </div>
		        </div>
		    </div>
		</div>
	</div>
</form>
@endsection

@push('pluginjs')
<script src="/sheruadmin/libs/select2/select2.min.js"></script>
<script src="/sheruadmin/libs/flatpickr/flatpickr.min.js"></script>
<script src="/sheruadmin/libs/summernote/summernote-bs4.min.js"></script>
<script>
	$("#basic-datepicker").flatpickr({
		enableTime: !0,
		dateFormat: "Y-m-d",
	}),
	$("#contenidoPublic").summernote({
		height: 250,
		minHeight: null,
		maxHeight: null,
		focus: !1
	});
	$('.select2').select2();
</script>
@endpush