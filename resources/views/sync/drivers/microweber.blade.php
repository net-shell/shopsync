@extends('sync.edit')

@section('title', '@parent - Microweber')

@section('form')
<label>Name
  <input type="text" name="name" value="{{ $sync->name }}" required />
</label>
<label>
  Description
  <textarea name="description" rows="5" placeholder="(not required)">{{ $sync->description }}</textarea>
</label>
@stop