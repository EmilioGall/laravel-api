@extends('layouts.admin')

@section('content')
   <div class="container">

      <div class="row justify-content-center">

         <div class="col-md-8 mt-4">

            <div class="card">

               {{-- Header --}}
               <div class="card-header d-flex justify-content-between align-items-end">

                  {{-- Project Table Title --}}
                  <div class="col-9 fw-bold fs-3 text-primary">

                     <h1 class="fw-1 fs-1 text-primary">Modify Project:</h1>

                     <h2>"{{ $project['title'] }}"</h2>

                  </div>

                  {{-- Button to Projects Table --}}
                  <div class="col-3 h-50 d-flex justify-content-end">

                     <a type="button"
                        class="btn btn-outline-primary h-75 w-100 d-flex align-items-center justify-content-center"
                        href="{{ route('admin.projects.index') }}">

                        <i class="fa-solid fa-angles-left"></i> Go to Projects Table

                     </a>

                  </div>

               </div>

               {{-- Form Section --}}
               <section class="card-body">

                  <form class="border rounded p-3 my-4"
                     action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST">
                     @csrf
                     @method('PUT')

                     <div class="row g-3">

                        {{-- Title Input --}}
                        <div class="col-12">

                           <label for="title" class="form-label fw-bold">Project Title</label>
                           <input type="text"
                              class="form-control
                              @error('title')
                              is-invalid
                              @enderror"
                              id="title"
                              name="title"
                              value="{{ old('title', $project['title']) }}">

                           @error('title')
                              <div class="alert alert-danger mt-1">
                                 {{ $message }}
                              </div>
                           @enderror

                        </div>

                        {{-- Select Type --}}
                        <div class="col-12">

                           <select class="form-select"
                              aria-label="Select Type"
                              id="type_id"
                              name="type_id">

                              <option @selected(old('type_id') == null) value="">
                                 Choose a type...
                              </option>

                              @foreach ($typesCollection as $type)
                                 <option @selected(old('type_id', $project->type_id) == $type->id) value="{{ $type->id }}">
                                    {{ $type->name }}
                                 </option>
                              @endforeach

                           </select>

                        </div>

                        {{-- Technologies Checkboxes --}}
                        <div class="col-12 mb-2 d-flex flex-column">

                           <label for="technologies" class="form-label fw-bold">Project Technologies</label>

                           <div class="btn-group" role="group" id="technologies">
                              @foreach ($technologiesCollection as $tech)
                                 @if (old('technologies') == null)
                                    <input name="technologies[]"
                                       type="checkbox"
                                       class="btn-check"
                                       value="{{ $tech->id }}"
                                       id="tech#{{ $tech->id }}"
                                       autocomplete="off"
                                       @checked($project->technologies->contains($tech->id))>

                                    <label for="tech#{{ $tech->id }}" class="btn btn-outline-primary">
                                       {{ $tech->name }}
                                    </label>
                                 @else
                                    <input name="technologies[]"
                                       type="checkbox"
                                       class="btn-check"
                                       value="{{ $tech->id }}"
                                       id="tech#{{ $tech->id }}"
                                       autocomplete="off"
                                       @checked(in_array($tech->id, old('technologies', [])))>

                                    <label for="tech#{{ $tech->id }}" class="btn btn-outline-primary">
                                       {{ $tech->name }}
                                    </label>
                                 @endif
                              @endforeach
                           </div>

                        </div>

                        {{-- Description Input --}}
                        <div class="col-12">

                           <label for="description" class="form-label">Description</label>
                           <textarea
                              class="form-control
                              @error('description')
                              is-invalid
                              @enderror"
                              id="description"
                              name="description"
                              rows="5"
                              placeholder="Insert here a description...">{{ old('description', $project->description) }}</textarea>

                           @error('description')
                              <div id="title-empty-error" class="invalid-feedback">
                                 {{ $message }}
                              </div>
                           @enderror

                        </div>

                     </div>

                     <hr class="my-4">

                     {{-- Submit Button --}}
                     <div class="col-4">

                        <button class="w-100 btn btn-primary btn-lg mb-4" type="submit">Update</button>

                     </div>

                  </form>

               </section>

            </div>

         </div>

      </div>

   </div>
@endsection
