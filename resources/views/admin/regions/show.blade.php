@extends('admin.layout.master')

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('admin.show')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form  class="show form-horizontal" >
                            <div class="row">
                                @foreach (languages() as $lang)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('site.name_' . $lang) }}</label>
                                            <div class="controls">
                                                <input type="text" name="name[{{ $lang }}]"
                                                    value="{{$region->getTranslations('name')[$lang]}}"
                                                    class="form-control"
                                                    placeholder="{{ __('site.write') . __('site.name_' . $lang) }}"
                                                    required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{ __('admin.country') }}</label>
                                        <div class="controls">
                                            <select name="country_id" class="select2 form-control" required
                                                data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                <option value>{{ __('admin.choose_the_country') }}</option>
                                                @foreach ($countries as $country)
                                                    <option
                                                        {{ $country->id == $region->country_id ? 'selected' : '' }}
                                                        value="{{ $country->id }}">{{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-center mt-3">
                                    <button type="submit"
                                        class="btn btn-primary mr-1 mb-1 submit_button">{{ __('admin.update') }}</button>
                                    <a href="{{ url()->previous() }}" type="reset"
                                        class="btn btn-outline-warning mr-1 mb-1">{{ __('admin.back') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
    <script>
        $('.show input').attr('disabled' , true)
        $('.show textarea').attr('disabled' , true)
        $('.show select').attr('disabled' , true)
    </script>
@endsection